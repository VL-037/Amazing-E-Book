<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\EBook;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function home()
    {
        if (Auth::user() && session()->has('account')) {
            $myRoleDesc = Role::where('role_id', Auth::user()->role_id)->with('accounts')->first()->role_desc;
            $ebooks = EBook::all();
            return view('users.home')->with(['ebooks' => $ebooks, 'myRole' => $myRoleDesc]);
        }
        return view('welcome');
    }

    public function signUp()
    {
        $user = Auth::user() && session()->has('account');
        if ($user) {
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
        $user = Auth::user();
        if ($user) {
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

    public function profile()
    {
        $user = Auth::user();
        if ($user) {
            $genders = Gender::all();
            $myRoleDesc = Role::where('role_id', Auth::user()->role_id)->with('accounts')->first()->role_desc;
            return view('users.profile')->with(['user' => $user, 'genders' => $genders, 'myRole' => $myRoleDesc]);
        }
        return redirect('/');
    }

    public function updateProfile(Request $req)
    {
        $credentials = $req->except(array('_token'));
        $rules = array(
            'gender_id' => 'required',
            'first_name' => 'required|max:25|alpha_num',
            'middle_name' => 'nullable|max:25|alpha_num',
            'last_name' => 'required|max:25|alpha_num',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:8|regex:/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/',
            'display_picture' => 'required|image',
        );

        $validator = Validator::make($credentials, $rules, $messages = [
            'role_id.required' => 'The role field is required',
            'gender_id.required' => 'The gender field is required',
            'required' => 'The :attribute field is required',
            'min' => 'The :attribute length must be at least :min character(s)',
            'max' => 'The :attribute max length is :max character(s)',
            'alpha_num' => 'The :attribute value can not contain symbol',
            'password.regex' => 'Password must contain at least 1 number(s)',
            'image' => 'The :attribute file must be an image',
        ]);
        $errors = $validator->errors();

        if ($validator->fails()) {
            return back()->with(['errors' => $errors]);
        }

        Storage::disk('public')->put('images', $req->display_picture);
        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['display_picture_link'] = '/uploads/images/' . $req->display_picture->hashName();

        Account::where('account_id', Auth::user()->account_id)->update([
            'gender_id' => $credentials['gender_id'],
            'first_name' => $credentials['first_name'],
            'middle_name' => $credentials['middle_name'],
            'last_name' => $credentials['last_name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'display_picture_link' => $credentials['display_picture_link'],
            'modified_at' => date('Y-m-d H:i:s'),
            'modified_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name
        ]);
        $myRoleDesc = Role::where('role_id', Auth::user()->role_id)->with('accounts')->first()->role_desc;
        return view('users.saved')->with(['myRole' => $myRoleDesc]);
    }

    public function index()
    {
        if (Auth::user() && session()->has('account')) {
            $accounts = Account::with('role')->get();
            $myRoleDesc = Role::where('role_id', Auth::user()->role_id)->first()->role_desc;
            return view('users.admins.index')->with(['accounts' => $accounts, 'myRole' => $myRoleDesc]);
        }
        return redirect('/');
    }

    public function updateAccountPage($account_id)
    {
        if (Auth::user() && session()->has('account')) {
            $account = Account::where('account_id', $account_id)->first();
            $roles = Role::all();
            $myRoleDesc = Role::where('role_id', Auth::user()->role_id)->first()->role_desc;
            return view('users.admins.update')->with(['account' => $account, 'roles' => $roles, 'myRole' => $myRoleDesc]);
        }
        return redirect('/');
    }

    public function updateAccount(Request $req)
    {
        $credentials = $req->except(array('_token'));
        Account::where('account_id', $req->account_id)->update([
            'role_id' => $credentials['role_id'],
            'modified_at' => date('Y-m-d H:i:s'),
            'modified_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name
        ]);
        return redirect('/admins/accounts');
    }

    public function destroyAccountById($account_id)
    {
        Account::destroy($account_id);
        return back();
    }

    public function setLanguage(Request $req)
    {
        Session::put(['user_locale' => $req->language]);
        App::setLocale(session('user_locale'));
        return redirect()->back();
    }
}
