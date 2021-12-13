<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;

class AdminTopController extends Controller
{
    function show(){
		return view("admin.admin_top");
	}
	
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
        
        }else {
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
      return view('admin.admin_index',compact('stocks'));
    }
    
    public function edit(Request $request)
    {
      // Modelからデータを取得する
      $stock = Stock::find($request->id);
      if (empty($stock)) {
        abort(404);    
      }
      return view('admin.admin_edit', ['stock_form' => $stock]);
    }
    
    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Stock::$rules);
      // Modelからデータを取得する
      $stock = Stock::find($request->id);
      // 送信されてきたフォームデータを格納する
      $stock_form = $request->all();
      if ($request->remove == 'true') {
            $stock_form['image_path'] = null;
      } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $stock_form['image_path'] = basename($path);
      } else {
             $stock_form['image_path'] = $stock->image_path;
      }
      unset($stock_form['image']);
      unset($stock_form['remove']);
      unset($stock_form['_token']);
      // 該当するデータを上書きして保存する
      $stock->fill($stock_form)->save();
        
      return redirect('/admin/stock')->with('message','ルセットが更新されました。');
  }
  
    public function destroy($id)
    {
      // 該当するModelを取得
      $stock = Stock::find($id);
      // 削除する
      $stock->delete();
      return redirect('/admin/index')->with('message','商品情報が削除されました。');
    }
}
