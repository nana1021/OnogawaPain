<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;
use App\Cart;
use App\User;
use Auth;

class StockController extends Controller
{
    public function add()
    {
        return view('stock.create');
    }
    
    public function create(Request $request)
    {
      $this->validate($request, Stock::$rules);//Stock.phpのrules変数呼び出し
      $stock = new Stock;//newはModelからインスタンス（レコード）を生成するメソッド
      $form = $request->all();
       
        if (isset($form['image'])) { //issetは引数の中にデータがあるかないかを判断するメソッド
        $path = $request->file('image')->store('public/image');
        $stock->image_path = basename($path);
        
      } else {
        $stock->image_path = null;
      }
        
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      $stock->fill($form)->save();
      
      return redirect('admin/create');
    }
    
    public function index(Request $request)
  {
      $stocks = Stock::Paginate(6);
      return view('stock.index',compact('stocks'));
  }
  
  public function myCart(Cart $cart)
   {
       $my_carts = $cart->showCart();
       return view('stock.mycart',compact('my_carts'));   
   }
   
    public function addMycart(Request $request,Cart $cart)
   {
       $stock_id=$request->stock_id;
       $message = $cart->addCart($stock_id);

       //追加後の情報を取得
       $my_carts = $cart->showCart();

       return view('stock.mycart',compact('my_carts' , 'message'));

   }
  
}
