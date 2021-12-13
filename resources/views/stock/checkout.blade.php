@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           {{ Auth::user()->name }}さんご予約ありがとうございました</h1>

           <div class="card-body">
               <p>ご登録頂いたメールアドレスへご予約内容をお送りしております。</p>
               <a href="stock">商品一覧へ</a>
           </div>

           </div>
       </div>
   </div>
</div>
@endsection