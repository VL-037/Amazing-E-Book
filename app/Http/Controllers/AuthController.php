<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    

    public function signUp()
    {
        if (Auth::user() && session()->has('account')) {
            return redirect('/');
        }
        $genders = Gender::all();
        $roles = Role::all();
        return view('users.signUp')->with(['genders' => $genders, 'roles' => $roles]);
    }

    public function signUpStore(Request $req)
    {
        $credentials = $req->except(array('_token'));
        $rules = array(
            'first_name' => 'required|max:25|alpha_num',
            'middle_name' => 'nullable|max:25|alpha_num',
            'last_name' => 'required|max:25|alpha_num',
            'role_id' => 'required',
            'gender_id' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/',
            'display_picture' => 'required|image',
        );

        $validator = Validator::make($credentials, $rules);
        $errors = $validator->errors();

        if ($validator->fails()) {
            return back()->with(['errors' => $errors]);
        }

        Storage::disk('public')->put('images', $req->display_picture);
        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['display_picture_link'] = '/uploads/images/' . $req->display_picture->hashName();

        $account = Account::create([
            'role_id' => $credentials['role_id'],
            'gender_id' => $credentials['gender_id'],
            'first_name' => $credentials['first_name'],
            'middle_name' => $credentials['middle_name'],
            'last_name' => $credentials['last_name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'display_picture_link' => $credentials['display_picture_link'],
        ]);

        if (Auth::attempt([
            'email' => $req['email'],
            'password' => $req['password'],
        ])) {
            $req->session()->put('account', $account);
            return redirect()->intended('/');
        }
        return redirect('/signup');
    }

    public function login()
    {
        if (Auth::user() && session()->has('account')) {
            return redirect('/');
        }
        return view('users.login');
    }

    public function loginAuth(Request $req)
    {
        $credentials = $req->except(array('_token'));
        $rules = array(
            'email' => 'required',
            'password' => 'required',
        );

        $validator = Validator::make($credentials, $rules);
        $errors = $validator->errors();

        if ($validator->fails()) {
            return back()->with(['errors' => $errors]);
        }

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ])) {
            $account = Auth::user();
            $req->session()->put('account', $account);
            return redirect()->intended('/');
        }
        switch (App::getLocale()) {
            case 'ind':
                $errors->getMessageBag()->add('credentials', 'Alamat Surel atau Kata Sandi salah');
                break;
            default:
                $errors->getMessageBag()->add('credentials', 'Email or Password is incorrect');
                break;
        }

        return back()->with(['errors' => $errors]);
    }

    public function logout()
    {
        $session_language = session('user_locale');
        session()->flush();
        Session::put('user_locale', $session_language);
        Auth::logout();
        return view('users.logout');
    }
}
