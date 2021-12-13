@extends('layouts.admin')

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
                                   {{$stock->detail}} <br>
                                   <form action="mycart" method="post">
                                       @csrf
                                       <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                       <div>
                                            <a href="{{ action('admin\AdminTopController@edit', ['id' => $stock->id]) }}">
                                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="far fa-edit"></i> 編集</button></a>
                                       </div>
                                       
                                       <div class="btn-toolbar">
                                            <a><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$stock->id}}"><i class="far fa-trash-alt"></i> 削除</button></a>
            
                                  <!--Modal-->
                                       <div class="modal fade" id="exampleModal{{$stock->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <form action="{{ action('admin\AdminTopController@destroy', [ 'stock' => $stock->id ]) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">削除</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                        <div class="modal-body">
                                                            <p class="text-primary">本当に削除しますか？</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                                            <button type="submit" class="btn btn-primary">削除</button>
                                                        </div>
                                                </div>
                                            </form>
                                        </div>

                               <a class="text-center" href="admin/stock">商品一覧へ</a>
 
                           </div>
                       @endforeach                    
               </div>
               <div class="text-center" style="width: 200px;margin: 20px auto;">
               {{  $stocks->links()}} 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection