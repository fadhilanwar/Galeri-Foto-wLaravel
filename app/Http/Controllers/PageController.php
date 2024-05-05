<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Album;
use App\Models\Foto;
use Illuminate\Support\Facades\DB;
use Alert;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datauser  = DB::table('users')->where('id', '=', auth()->user()->id)->get();

        return view('dashboard')->with([
            'title' => 'Dashboard',
            'datauser' => $datauser,
        ]);
    }

    public function myAlbum() {
        $id = auth()->user()->id;

        $albums = Album::all();

     $foto = DB::table('album')
                    ->join('foto', 'foto.album_id', '=', 'album.id')
                    ->groupBy('album.id')
                    ->select('album.*', 'foto.*')->get();

        return view('partials.yourAlbum')->with([
            'title' => 'My Albums',
            // 'datauser' => $datauser,
            'albums' => $albums,
            'thumbnail' => $foto,#belum jalan
        ]);
    }

    public function toCreate(Request $request) {

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/signlink')->with('success', 'Registrasi Berhasil !');
    }

    public function loginRequest(Request $request) {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
         return redirect()->intended('/dashboard')->with('success', 'Login Berhasil');
        }

        return back()->with('error', 'Email atau Password tidak terdaftar !');
    }

    public function out(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function toYoursAccount() {
        $datauser  = DB::table('users')->where('id', '=', auth()->user()->id)->get();

        return view('partials.profile')->with([
            'datauser' => $datauser,
            'title' => 'Edit Profile',
        ]);
    }

    public function toYoursProfile() {
        $datauser  = DB::table('users')->where('id', '=', auth()->user()->id)->get();

        return view('partials.myProfile')->with([
            'datauser' => $datauser,
            'title' => 'My Profile'
        ]);
    }
    public function toYoursProfileAlbum() {
        $datauser  = DB::table('users')->where('id', '=', auth()->user()->id)->get();

        return view('partials.myProfileAlbum')->with([
            'datauser' => $datauser,
            'title' => 'My Profile / Album'
        ]);
    }
    public function toYoursProfilePopular() {
        $datauser  = DB::table('users')->where('id', '=', auth()->user()->id)->get();

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

        return view('partials.myProfilePopular')->with([
            'datauser' => $datauser,
            'title' => 'My Profile / Popular',
            'posts' => $a,
        ]);
    }

    public function seepost($idpt) {

        $idphoto = $idpt;

        $posts = DB::table('foto')
                        ->join('users', 'foto.user_id', '=', 'users.id')
                        ->select('foto.*', 'users.username', 'users.nama_lengkap', 'users.foto_profile')
                        ->orderBy('created_at', 'desc')
                        ->get();

        $seeposts = DB::table('foto')
                        ->join('users', 'foto.user_id', '=', 'users.id')
                        ->select('foto.*', 'users.username', 'users.nama_lengkap', 'users.foto_profile')
                        ->where('foto.id', $idphoto)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('partials.see-post')->with([
            'title' => 'See Post',
            'posts' => $posts,
            'seeposts' => $seeposts,
        ]);
    }
}
