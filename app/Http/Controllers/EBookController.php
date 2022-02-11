<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\EBook;
use App\Models\Order;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class EBookController extends Controller
{
    public function detail($ebook_id)
    {
        if (Auth::user() && session()->has('account')) {
            $myRoleDesc = Role::where('role_id', Auth::user()->role_id)->with('accounts')->first()->role_desc;
            $ebook = EBook::where('ebook_id', $ebook_id)->first();
            if (!$ebook) {
                return redirect('/');
            }
            return view('ebooks.detail')->with(['ebook' => $ebook, 'myRole' => $myRoleDesc]);
        }
        return redirect('/login');
    }

    public function addToOrder($ebook_id)
    {
        if (Auth::user() && session()->has('account')) {

            $isInOrder = EBook::join('order', 'ebook.ebook_id', '=', 'order.ebook_id')
            ->where(['order.account_id' => Auth::user()->account_id])
            ->whereIn('order.ebook_id', array($ebook_id))->get();

            if (count($isInOrder) <= 0) {
                Order::create([
                    'account_id' => Auth::user()->account_id,
                    'ebook_id' => $ebook_id,
                    'order_date' => date('Y-m-d H:i:s'),
                ]);
                return redirect('/cart');
            }
            return redirect('/cart');
        }
    }
}
