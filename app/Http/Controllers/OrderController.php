<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use App\Models\Order;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user && session()->has('account')) {
            $ebooks = EBook::join('order', 'ebook.ebook_id', '=', 'order.ebook_id')
                ->where(['order.account_id' => $user->account_id])->get();
            $myRoleDesc = Role::where('role_id', Auth::user()->role_id)->with('accounts')->first()->role_desc;
            return view('carts.index')->with(['ebooks' => $ebooks, 'myRole' => $myRoleDesc]);
        }
    }

    public function destroyOrderById($order_id) {
        Order::destroy($order_id);
        return redirect('/cart');
    }

    public function destroyAllOrders() {
        Order::where(['account_id' => Auth::user()->account_id])->delete();
        $myRoleDesc = Role::where('role_id', Auth::user()->role_id)->with('accounts')->first()->role_desc;
        return view('carts.success')->with(['myRole' => $myRoleDesc]);
    }
}
