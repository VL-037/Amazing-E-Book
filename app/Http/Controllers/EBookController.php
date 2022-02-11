<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EBookController extends Controller
{
    public function detail($ebook_id)
    {
        if (Auth::user() && session()->has('account')) {
            $myRoleDesc = Role::where('role_id', Auth::user()->role_id)->with('accounts')->first()->role_desc;
            $ebook = EBook::where('ebook_id', $ebook_id)->first();
            return view('ebooks.detail')->with(['ebook' => $ebook, 'myRole' => $myRoleDesc]);
        }
        return redirect('/login');
    }
}
