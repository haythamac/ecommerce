<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('home.userpage', compact('products'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            return view('admin.home');
        }
        else if($usertype == '0')
        {
            $products = Product::paginate(3);
            return view('home.userpage', compact('products'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product-details', compact('product'));   
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;
            $cart->image = $product->image;
            $cart->product_id = $product->id;

            if($request->quantity)
            {
                $cart->quantity = $request->quantity;
            }
            else
            {
                $cart->quantity = 1;
            }

            if($product->discount_price != null)
            {
                $cart->price = $product->discount_price * $cart->quantity;
            }
            else
            {
                $cart->price = $product->price * $cart->quantity;
            }
            
            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(!Auth::id())
        {
            return redirect('login');
        }
        $id = Auth::user()->id;
        $cart = Cart::where('user_id', $id)->get();

        return view('home.show-cart', compact('cart'));
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message', 'Product successfully deleted');
    }
    
}
