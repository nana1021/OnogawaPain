@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:24px 0px;">
           {{ Auth::user()->name }}さんのカート一覧</h1>
               
            <div class="container">
            <div class="row">
                <table class="table mt-5 ml-3 border-dark">
                    <thead>
                        <tr class="text-center">
                            <th class="border-bottom border-dark" style="width:25%;">写真</th>
                            <th class="border-bottom border-dark" style="width:18%;">商品名</th>
                            <th class="border-bottom border-dark" style="width:15%;">値段</th>
                            <th class="border-bottom border-dark" style="width:15%;">個数</th>
                            <th class="border-bottom border-dark" style="width:15%;">小計</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($my_carts->isNotEmpty())
                    @foreach ($my_carts as $my_cart)
                        <tr class="text-center">
                            <td class="align-middle">
                            <img src="storage/image/{{$my_cart->stock->image_path}}" alt="" class="incart">
                            </td>
                            
                            <td class="align-middle">
                                {{$my_cart->stock->name}}
                            </td>
                            
                            <td class="align-middle">
                                {{ number_format($my_cart->stock->price)}} 円
                            </td>
                            
                            <td class="align-middle">
                                数量
                                <input class="align-middle" type="number" style="width:60px" name="quantity" class="form-control" min="0" value="{{ $my_cart->quantity }}">

                                <input type="submit" value="変更">
                            </td>
                            
                            <td class="align-middle">
                                {{ number_format($my_cart->quantity * $my_cart->stock->price)}} 円
                            </td>
                            
                            <td class="border-0 align-middle">
                                <form action="/cartdelete" method="post">
                               @csrf
                                    <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">
                                    <input type="submit" class="btn btn-danger" value="削除">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                        <tr class="text-center">
                            <th class="border-bottom-0 align-middle"></th>
                            <td class="border-bottom-0 align-middle"></td>
                            <td class="border-bottom-0 align-middle"></td>
                            <td class="border-bottom-0 align-middle"></td>
                            <td class="border-bottom-0 align-middle">合計</td>
                                <td class="border-bottom-0 align-middle">
                                    {{number_format($sum)}}円
                                </td>
                        </tr>
                        @else
                            <p class="text-center">カートには何も入っておりません</p>
                        @endif
                        <tr class="text-right">
                            <!--<th class="border-0"></th>-->
                            <td class="border-0">
                                <a class="btn btn-success" href="{{ url('/stock') }}" role="button">
                                    買い物を続ける
                                </a>
                            </td>
                            <td class="border-0"></td>
                            <td class="border-0"></td>
                            <td class="border-0"></td>
                            <td class="border-0">
                                <form action="/checkout" method="POST">
                                @csrf
                                    <button type="submit" class="btn btn-danger btn-lg text-center buy-btn" >購入する</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>   
               
               
               
               
               
               
               
               
               

           <!--<div class="">-->
           <!--    <p class="text-center">{{ $message ?? '' }}</p><br>-->
               
           <!--    @if($my_carts->isNotEmpty())-->
           <!--    <div class="d-flex flex-row flex-wrap">-->
           <!--         @foreach($my_carts as $my_cart)-->
           <!--         <div class="mycart_box">-->
           <!--         {{$my_cart->stock->name}} <br>                                -->
           <!--         {{ number_format($my_cart->stock->price)}}円 <br>-->
           <!--         <img src="storage/image/{{$my_cart->stock->image_path}}" alt="" class="incart" >-->
           <!--         <br>-->
           <!--             <form action="/cartdelete" method="post">-->
           <!--                @csrf-->
           <!--                <input type="hidden" name="stock_id" value="{{ $my_cart->stock->id }}">-->
           <!--                <input type="submit" value="カートから削除する">-->
           <!--             </form>-->
           <!--         </div>-->
           <!--         @endforeach-->
           <!--         <div class="text-center p-2">-->
           <!--            合計個数：{{$count}}個<br>-->
           <!--            <p style="font-size:1.2em; font-weight:bold;">合計金額:{{number_format($sum)}}円</p>  -->
           <!--         </div>  -->
           <!--         <form action="/checkout" method="POST">-->
           <!--            @csrf-->
           <!--            <button type="submit" class="btn btn-danger btn-lg text-center buy-btn" >購入する</button>-->
           <!--         </form>-->
           <!--     @else-->
           <!--         <p class="text-center">カートにはまだ入ってません。</p>-->
           <!--     @endif-->

           <!--     <a href="stock">商品一覧へ</a>-->
           <!--    </div>-->
           <!--</div>-->
       </div>
   </div>
</div>
@endsection