<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function signUp()
    {
        $user = Auth::user();
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
            'role_id' => 'required',
            'gender_id' => 'required',
            'first_name' => 'required|max:25|alpha_num',
            'middle_name' => 'nullable|max:25|alpha_num',
            'last_name' => 'required|max:25|alpha_num',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:8|regex:/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/',
            'display_picture' => 'required|mimes:jpg,jpeg,png,bmp,tiff',
        );

        $validator = Validator::make($credentials, $rules, $messages = [
            'role_id.required' => 'The role field is required',
            'gender_id.required' => 'The gender field is required',
            'required' => 'The :attribute field is required',
            'min' => 'The :attribute length must be at least :min character(s)',
            'max' => 'The :attribute max length is :max character(s)',
            'alpha_num' => 'The :attribute value can not contain symbol',
            'password.regex' => 'Password must contain at least 1 number(s)',
            'display_picture.mimes' => 'Display picture must be an image with type: jpg, jpeg, png, bmp, tiff',
        ]);
        $errors = $validator->errors();

        if ($validator->fails()) {
            return back()->with(['errors' => $errors]);
        }

        Storage::disk('public')->put('images', $req->display_picture);
        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['display_picture_link'] = '/uploads/images/'.$req->display_picture->hashName();

        $account = new Account;
        $account->fill($credentials);
        $account->save();

        dd($account);
    }
}