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
  
    public function show(Request $request,$id,Stock $stock)
    {
        $stock = Stock::find($id);
        return view('stock.show',['stock'=>$stock]);
    }
  
    public function myCart(Request $request,Cart $cart)
    {
        $data = $cart->showCart();
        return view('stock.mycart',$data);  
    }
   
    public function addMycart(Request $request,Cart $cart)
    {  
        
         //カートに追加の処理
        $stock_id = $request->stock_id;
        
        $ses_quantity = $request->quantity;
        
        $ses_stock_id = $request->stock_id;
        $ses_data = array();
        $ses_data = compact("ses_stock_id", "ses_quantity");
        session()->push('ses_data', $ses_data);     //配列だとputでなくpush
        // session()->put('quantity', $quantity);
        
        $message = $cart->addCart($stock_id);
        //追加後の情報を取得
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