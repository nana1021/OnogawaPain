@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           <div class="">
               <div class="d-flex flex-row flex-wrap">
           
                    @foreach($stocks as $stock)
                        <div class="col-xs-6 col-sm-4 col-md-4 ">
                            <div class="mycart_box">
                                {{$stock->name}} <br>
                                {{$stock->price}}円<br>
                                <img src="{{ asset('storage/image/' . $stock->image_path) }}" alt="" class="incart"><br>
                                {{$stock->tagline}} <br>
                                <div>
                                    <a href="{{ action('StockController@show', ['id' => $stock->id]) }}">
                                    <button type="button" class="btn btn-outline-success btn-sm"> click more</button></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                   <a class="text-center" href="/stock">一覧topへ</a>    
               </div>
                  <div class="text-center" style="width: 200px;margin: 20px auto;">
                  {{  $stocks->links()}} 
                  </div>
            </div>
       </div>
   </div>
</div>
@endsection