<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;
use App\Cart;
use App\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thanks;

class StockController extends Controller
{
    public function index(Request $request)
  {
      $stocks = Stock::Paginate(6);
      return view('stock.index',compact('stocks'));
  }
  
    public function myCart(Cart $cart)
    {
       $quantity = $request->quantity;    
       $data = $cart->showCart();

       return view('stock.mycart',$data);  
    }
   
    public function addMycart(Request $request,Cart $cart)
    {
       $stock_id = $request->stock_id;
       
       $message = $cart->addCart($stock_id);
       $data = $cart->showCart();

       return view('stock.mycart',$data)->with('message',$message);
    }
   
    public function deleteCart(Request $request,Cart $cart)
    {
       $stock_id = $request->stock_id;
       $message = $cart->deleteCart($stock_id);
       $data = $cart->showCart();
       
       return view('stock.mycart',$data)->with('message',$message);
    }
    
    public function checkout(Request $request,Cart $cart)
   {
       $user = Auth::user();
       $mail_data['user']=$user->name;
       $mail_data['checkout_items']=$cart->checkoutCart();
       Mail::to($user->email)->send(new Thanks($mail_data));
       
       return view('stock.checkout');
   }
  
}
