<?php

namespace App\Http\Controllers\admin;

// use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;

class AdminStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stocks = Stock::Paginate(10);
        return view('admin.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Stock::$rules);//stock.phpのrules変数呼び出し
        $stock = new Stock;//newはModelからインスタンス（レコード）を生成するメソッド
        $form = $request->all();
       
        if (isset($form['image'])) { //issetは引数の中にデータがあるかないかを判断するメソッド
        $path = $request->file('image')->store('public/image');
        $stock->image_path = basename($path);   //basename パスの最後にある名前の部分を返す
        
        }else {
        $stock->image_path = null;
        }
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);
          
        $stock->fill($form)->save();
        // dd($stock);
        return redirect('adminstock/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    // public function show(Article $article)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Modelからデータを取得する
        $stock = Stock::find($id);
        if (empty($stock)) {
        abort(404);    
        }
        return view('admin.edit', ['stock_form' => $stock]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // Validationをかける
       $this->validate($request, Stock::$rules);
      // Modelからデータを取得する
       $stock = Stock::find($id);
      // 送信されてきたフォームデータを格納する
       $stock_form = $request->all();
       if ($request->remove == 'true') {
          $stock_form['image_path'] = null;
       } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $stock_form['image_path'] = basename($path);  //basename パスの最後にある名前の部分を返す
       } else {
          $stock_form['image_path'] = $stock->image_path;
       }
       unset($stock_form['image']);
       unset($stock_form['remove']);
       unset($stock_form['_token']);
      // dd($stock_form);
      // 該当するデータを上書きして保存する
       $stock->fill($stock_form)->save();
      
       return redirect('/adminstock')->with('message', $stock_form['name'].'の商品情報が更新されました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 該当するModelを取得し削除
       $stock = Stock::find($id);
       $stock->delete();
    
       return redirect('/adminstock')->with('message','『'.$stock['name'].'』'.'の商品情報が削除されました。');
    }
}
