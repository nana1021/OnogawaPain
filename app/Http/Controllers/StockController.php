<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;
use App\Cart;

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
      
      $stock->fill($form);
      $stock->save();
      
      return redirect('admin/create');
    }
    
    public function index(Request $request)
  {
      $stocks = Stock::Paginate(6);
      return view('stock.index',compact('stocks'));
  }
  
  public function myCart()
   {
       $my_carts = Cart::all();
       return view('stock.mycart',compact('my_carts'));
       
   }
   
    public function addMycart(Request $request)
   {
       $user_id = Auth::id(); 
       $stock_id=$request->stock_id;

       $cart_add_info=Cart::firstOrCreate(['stock_id' => $stock_id,'user_id' => $user_id]);

       if($cart_add_info->wasRecentlyCreated){
           $message = 'カートに追加しました';
       }
       else{
           $message = 'カートにすでに入っています';
       }

       $my_carts = Cart::where('user_id',$user_id)->get();

       return view('mycart',compact('my_carts' , 'message'));

   }
}
