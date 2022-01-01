<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Stock;


class Cart extends Model
{
 
 
    protected $fillable = [
       'stock_id', 'user_id',
   ];
   
   public function stock()
   {
       return $this->belongsTo('\App\Stock');
   }
   
   public function showCart()
   {
        $user_id = Auth::id();
        $data['my_carts'] = $this->where('user_id',$user_id)->get();
        $stock_id = Auth::id();
        // $ses_quantity = session()->get('quantity');
        
        $ses_data = session()->get('ses_data');
        //セッションデータのなかのそれぞれのデータを抽出
        $ses_stock_id = array_column($ses_data, 'ses_stock_id');
        $ses_quantity = array_column($ses_data, 'ses_quantity');
        dd($ses_data);
        
        $data['count']=0;   //ses_dataとは別のもの
        $data['sum']=0;
       
        foreach($data['my_carts'] as $my_cart){
          $data['count'] += $ses_quantity;
           $data['sum'] += ($my_cart->stock->price)*$ses_quantity;
        }
        
        return $data;
   }
   
   public function addCart($stock_id)
   {
       $user_id = Auth::id(); 
       $cart_add_info = Cart::firstOrCreate(['stock_id' => $stock_id,'user_id' => $user_id]);

       if($cart_add_info->wasRecentlyCreated){
           $message = 'カートに追加しました';
       }
       else{
           $message = 'カートに登録済みです';
       }

       return $message;
   }
   
   public function deleteCart($stock_id)
    {
       $user_id = Auth::id(); 
       $delete = $this->where('user_id', $user_id)->where('stock_id',$stock_id)->delete();
       
       if($delete > 0){
           $message = 'カートから一つの商品を削除しました';
       }else{
           $message = '削除に失敗しました';
       }
       return $message;
    }
    
    public function checkoutCart()
   {
       $user_id = Auth::id(); 
       $checkout_items=$this->where('user_id', $user_id)->get();
       $this->where('user_id', $user_id)->delete();

       return $checkout_items;     
   }
}
