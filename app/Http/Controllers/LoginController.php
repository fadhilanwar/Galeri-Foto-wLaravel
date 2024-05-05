<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Alert;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            Alert::toast('Login Success!','success');

            return redirect()->intended('/posts');
        }

        return back()->with('loginError', 'Wrong Username/Pass or Both');
    }

    public function forgotPassword() {


        return view('forgot');

    }

    public function tryCheck(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $email = $request->email;

        // $ada = User::where('email', $request->input('email'))->first();

        Alert::toast('One Account Identified!','info');


            return view('changepass')->with('email', $email);

    }

    public function cpfc(Request $request) {
        $email = $request->email;
        $pass = $request->password;


        $id = DB::table('users')
        ->select('id')
        ->where('email', '=', $email)->first();

        $idString = (string) $id->id;

        $user = User::find($idString);
        $user->password = $request->password;
        $user->save();


        Alert::success('Password Changed!','successfully');
        return redirect('/login');

    }

    public function toChangePassword() {
        return view('changepass');
    }

    public function registerForm(){

        return view('sign-up');
    }

    public function signlink(){
        return view('sign-link');
    }

    public function store(Request $request){

        $data = new User();
        $data->id = $request->id;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->nama_lengkap = 'guest'.  Carbon::now()->setTimezone('Asia/Jakarta')->format('YmdHis');
        $data->foto_profile = '';
        $data->save();

        return redirect('/signlink');
    }

    public function logout(Request $request) {
        Auth::logout();

        request()->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function changePP(Request $request) {

        if ($request->hasFile('foto_profile')) {
            if ($request->oldPic) {
                Storage::delete($request->oldPic);
            }
            $validatedData = $request->validate(['foto_profile' => 'image']);
            $validatedData['foto_profile'] = $request->file('foto_profile')->store('user-images');

            User::where('id', auth()->user()->id)
                    ->update(['foto_profile' => $validatedData['foto_profile']]);

                    Alert::toast('Profile Photo Updated!','success');

            return back()->with('Update Success', 'Gambar Profile Berhasil Diunggah');


        }
        return redirect()->back();
    }

    public function updateAccount(Request $request) {
        $id = auth()->user()->id;
        $data = User::find($id);
        // $data->id = $request->id;
        $data->username = $request->username;
        $data->email = $request->email;
        // $data->password = bcrypt($request->password);
        $data->nama_lengkap = $request->nama_lengkap;
        $data->no_tlp = $request->no_tlp;
        $data->bio = $request->bio;
        $data->update();

        Alert::toast('Account Information Updated!','success');


        return redirect('/yoursProfile');
    }

    public function updatePassword(Request $request) {
        $id = auth()->user()->id;

        $user = User::find($id);
        $user->password = $request->password;
        $user->save();

        Alert::toast('Password Changed!','success');

        return redirect()->back();
    }

}
