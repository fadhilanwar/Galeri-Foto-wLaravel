<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Foto;
use App\Models\User;
use App\Models\LikeFoto;
use App\Models\komentar_foto;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Alert;

class FotoController extends Controller
{
    public function toNewAlbum() {
        return view('partials.newalbum')->with([
            'title' => 'Create New Album'
        ]);
    }
    public function createAlbum(Request $request) {
        // $code_id = Carbon::now()->format('YmdHis');
        $date = Carbon::now()->setTimezone('Asia/Jakarta')->format('YmdHis');

        $album = Album::create([
            'nama_album' => $request->nama_album,
            'deskripsi' =>  $request->deskripsi,
            'user_id' => auth()->user()->id,
            'tanggal_dibuat' => $date,
        ]);

        Alert::toast('New Album Created!','success');

        return redirect('/myAlbum');
    }

    public function uploadFoto(Request $request){
        $album = Album::find($request->album_id);

        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $namaFile = time() . '.' . $foto->getClientOriginalExtension();

                Foto::create([
                    'nama_foto' => $namaFile,
                    'path_foto' => 'uploads/foto/'.$namaFile,
                    'album_id' => $album->id,
                ]);
            }
        }
        Alert::toast('Photo now Uploaded!','success');

        return redirect('/fyp');
    }

    public function showAlbum($id) {
        $id = $id;

         $foto = Foto::join('album', 'album.id', '=', 'foto.album_id')
         ->where('album_id', '=', $id)
         ->select('foto.*', 'album.nama_album')
        ->get();

         $count = Foto::join('album', 'album.id', '=', 'foto.album_id')
         ->where('album_id', '=', $id)
         ->select('album.id', 'album.nama_album', 'foto.lokasi_file')
        ->count();

        $albumData = Album::find($id);

        $users = Album::join('users', 'users.id', '=', 'album.user_id')
        ->where('album.id', '=', $id)
        ->select('album.id', 'album.user_id', 'album.nama_album', 'album.deskripsi', 'users.username', 'users.nama_lengkap', 'users.foto_profile')
        ->first();

        return view('partials.showalbum')->with([
            'title' => 'Show Album',
            'foto' => $foto,
            'users' => $users,
            'albumData' => $albumData,
            'count' => $count,
            'id' => $id,
        ]);
    }

    public function updateAlbum(Request $request, $id) {

        $data = Album::find($id);
        $data->nama_album = $request->nama_album;
        $data->deskripsi = $request->deskripsi;
        $data->update();

        Alert::toast('Album Updated!','success');

        return redirect()->back();

    }

    public function deleteAlbum($id) {

        $a = DB::table('album')->where('id', '=', $id)->delete();

        $fotos = DB::table('foto')->where('album_id', '=', $id)->get();

        foreach ($fotos as $foto) {

            if ($foto->lokasi_file) {
                Storage::delete('public/'.$foto->lokasi_file);
            }

            DB::table('foto')->where('album_id', '=', $id)->delete();
            DB::table('like_foto')->where('foto_id', $foto->id)->delete();
            DB::table('komentar_foto')->where('foto_id', $foto->id)->delete();
        }

        Alert::toast('Album Deleted!','warning');

        return redirect('/myAlbum');

    }

    public function myAlbum() {

    $id = auth()->user()->id;

     #belum jalan
     $album =  DB::table('album')
        ->leftJoin('foto', 'foto.album_id', '=', 'album.id')
    //  ->join('users', 'users.id', '=', 'album.user_id')
        ->groupBy('album.id')
        ->where('album.user_id', '=', $id)
        ->select('album.id','album.nama_album', 'album.deskripsi', 'foto.lokasi_file')
        ->get();

        return view('partials.yourAlbum')->with([
            'title' => 'My Albums',
            // 'datauser' => $datauser,
            'albums' => $album,
        ]);
    }

    public function editAlbum(Request $request) {

        $id = $request->album_id;
        $date = Carbon::now();
        $judul_foto = $request->judul_foto;

        if ($judul_foto == null) {
            $judul_foto = 'Image-'. $date;
        }
        $deskripsi = $request->deskripsi;

                $file = $request->file('foto');
                $filePath = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/'. $filePath);

                Foto::create([
                    'judul_foto' => $judul_foto,
                    'deskripsi' => $request->deskripsi,
                    'tanggal_unggah' => Carbon::now(),
                    'lokasi_file' => $filePath,
                    'album_id' => $id,
                    'user_id' => Auth()->user()->id,
                ]);
            // }
            Alert::toast('Photo Now Uploaded!','success');

        return redirect()->back();

    }

    public function editImageInfo(Request $request, $id) {

        $foto = Foto::find($id);
        $foto->judul_foto = $request->judul_foto;
        $foto->deskripsi = $request->deskripsi;
        $foto->update();

        Alert::toast('Photo Information Updated!','success');

        return redirect()->back();
    }

    public function deletePhoto(Request $request, $id) {

        $dataFind = Foto::find($id);
        $a = DB::table('foto')->where('id', '=', $id)->delete();

        if ($dataFind->lokasi_file) {
            Storage::delete('public/'. $dataFind->lokasi_file);
        }
            DB::table('like_foto')->where('foto_id', $id)->delete();
            DB::table('komentar_foto')->where('foto_id', $id)->delete();

        Alert::toast('Photo Now Deleted!','warning');

        return redirect()->back();
    }

    public function imageAll(Request $request) {

        $keyword = $request->searchImage;

        $a = Foto::join('users', 'foto.user_id', '=', 'users.id')
        ->select('foto.id', 'foto.judul_foto', 'foto.deskripsi', 'foto.user_id', 'users.foto_profile', 'users.username', 'foto.lokasi_file', 'foto.tanggal_unggah')
        ->where('foto.judul_foto', 'like', '%' . $keyword . '%')
        ->get();

        return view('partials.explorer.all-image')->with([
            'title' => 'Image Explorer',
            'foto' => $a,
            'keyword' => $keyword,
        ]);
    }

    public function toPost() {

        $posts = DB::table('foto')
                        ->join('users', 'foto.user_id', '=', 'users.id')
                        ->select('foto.*', 'users.username', 'users.nama_lengkap', 'users.foto_profile')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('partials.fyp')->with([
            'title' => 'For Your Page',
            'posts' => $posts,
        ]);
    }

    public function like(Request $request) {
           
        $photoId = $request->input('photo_id');
        $userId = auth()->user()->id;
           
        $existingLike = LikeFoto::where('foto_id', $photoId)
            ->where('user_id', $userId)
            ->first();

        if ($existingLike) {
        
        $existingLike->delete();

        return response()->json(['message' => 'Seems you dont Like it Anymore?']);
        }else{

        // Simpan like ke database
        $like = new LikeFoto();
        $like->foto_id = $request->input('photo_id');
        $like->user_id = auth()->user()->id; 
        $like->tanggal_like = now();
        $like->save();

        // alert('You Liked this Posts!');

        return response()->json(['message' => 'You Liked this Posts!']);
    }

    }

    public function isi() {

        $a = Foto::join('users', 'foto.user_id', '=', 'users.id')
        ->select('foto.id', 'users.foto_profile', 'users.username', 'foto.lokasi_file', 'foto.tanggal_unggah')
        ->get();

        return view('partials.explorer.all-image')->with([
            'title' => 'Image Explorer',
            'foto' => $a,
        ]);
    }

    public function komen(Request $request) {
        $photoId = $request->input('foto_id');
        $isi_komentar = $request->input('isi_komentar');
        $user_id = auth()->user()->id;

        komentar_foto::create([
            "foto_id" => $photoId,
            "user_id" => $user_id,
            "isi_komentar" => $isi_komentar
        ]);

        return response()->json(['message' => 'You Commments on this Posts!']);

    }
    public function deleteKomen($id) {

        $komen = komentar_foto::find($id);
        $komen->delete();

        return redirect()->back();

    }

    public function usersAll(Request $request) {

        $keyword = $request->searchUsers;

        $user = DB::table('users')
                ->select('users.id','users.nama_lengkap', 'users.foto_profile', 'users.username')
                ->where('users.username', 'like', '%' . $keyword . '%')
                ->orWhere('users.nama_lengkap', 'like', '%' . $keyword . '%')
                ->get();

        return view('partials.explorer.all-users')->with([
            'title' => 'Explore Users',
            'users' => $user,
            'keyword' => $keyword,
        ]);
    }

    public function usersVisit($id) {
        $visit  = DB::table('users')
                    ->where('id', $id)
                    ->select('users.*')
                    ->get();

        return view('partials.explorer.users-visit')->with([
            'visits' => $visit,
            'title' => 'Visit'
        ]);
    }

    public function albumsAll(Request $request) {

        $keyword = $request->searchAlbums;
        #belum jalan
        $albums =  DB::table('album')
           ->leftJoin('foto', 'foto.album_id', '=', 'album.id')
       //  ->join('users', 'users.id', '=', 'album.user_id')
           ->groupBy('album.id')
           ->where('album.nama_album', 'like', '%' . $keyword . '%')
           ->select('album.id','album.nama_album', 'album.deskripsi', 'foto.lokasi_file')
           ->get();

        return view('partials.explorer.all-albums')->with([
            'title' => 'Explore Albums',
            'albums' => $albums,
            'keyword' => $keyword
         ]);
    }

    public function mlAlbum() {

        $id = auth()->user()->id;

        $a = DB::select("SELECT
                    album.id,
                    album.nama_album,
                    album.created_at,
                    count(DISTINCT like_foto.id) AS jumlah_like,
                    count(DISTINCT komentar_foto.id) AS jumlah_komen,
                    count(DISTINCT foto.id) AS jumlah_foto,
                    MIN(foto.lokasi_file) AS lokasi_file
                        FROM
                            album
                        LEFT JOIN
                            foto ON album.id = foto.album_id
                        LEFT JOIN
                            komentar_foto ON foto.id = komentar_foto.foto_id
                        LEFT JOIN
                            like_foto ON foto.id = like_foto.foto_id
                        WHERE
                            album.user_id = ". auth()->user()->id ."
                        GROUP BY
                            album.id
                        ORDER BY
                            ((COUNT(DISTINCT like_foto.id)) + (COUNT(DISTINCT komentar_foto.id))) DESC;");

        return view('partials.stats.mostliked-album')->with([
            'title' => 'Album Insight',
            'posts' => $a,
        ]);
    }
}
