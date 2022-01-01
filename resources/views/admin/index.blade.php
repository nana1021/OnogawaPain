@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
           
            @if (session('message'))
                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
            @endif
           
            <div class="container">
                <div class="row">
                    <table class="table mt-5 ml-3 border-dark">
                        <thead>
                            <tr class="text-center">
                                <th class="border-bottom border-dark" style="width:12%;">写真</th>
                                <th class="border-bottom border-dark" style="width:10%;">商品名</th>
                                <th class="border-bottom border-dark" style="width:7%;">値段</th>
                                <th class="border-bottom border-dark" style="width:12%;">タグライン</th>
                                <th class="border-bottom border-dark" style="width:15%;">説明</th>
                                <th class="border-bottom border-dark" style="width:10%;"></th>
                            </tr>
                        </thead>

                        @foreach($stocks as $stock)
                            <tr class="text-center">
                                <td class="align-middle">
                                    <img src="{{ asset('storage/image/'. $stock->image_path) }}" alt="" class="incart" style="height:60px">
                                </td>
                                <td class="align-middle">
                                    {{$stock->name}} 
                                </td>    
                                <td class="align-middle">    
                                    {{$stock->price}}円
                                </td>
                                <td class="align-middle">
                                    @php
                                    if(mb_strlen($stock->tagline, 'UTF-8')>10){
                                    	$tagline= mb_substr($stock->tagline, 0, 10, 'UTF-8');
                                    	echo $tagline.'……';
                                    }else{
                                    	echo $stock->tagline;
                                    }
                                    @endphp  
                                </td>
                                <td class="align-middle">
                                    @php
                                    if(mb_strlen($stock->detail, 'UTF-8')>15){
                                    	$detail= mb_substr($stock->detail, 0, 15, 'UTF-8');
                                    	echo $detail.'……';
                                    }else{
                                    	echo $stock->detail;
                                    }
                                    @endphp    
                                </td>   
                                <input type="hidden" name="id" value="{{ $stock->id }}">
                                
                                <div class="btn-group mx-auto">
                                    <td class="align-middle">
                                        <a href="{{ route('adminstock.edit',  $stock->id ) }}">
                                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i>編集</button></a>
                                    <!-- Button trigger modal -->
                                        <a><button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$stock->id}}"><i class="far fa-trash-alt"></i> 削除</button></a>
                                    <!--Modal-->    
                                        <div class="modal fade" id="exampleModal{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('adminstock.destroy', [ 'stock' => $stock->id ]) }}" method="POST">
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
                                                            <p class="text-primary">『{{ $stock->name }}』本当に削除しますか？</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                                            <button type="submit" class="btn btn-danger">削除</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                          <!--<a class="text-center" href="/admin/top">管理topへ</a>-->
                    </table> 
                </div>
                    <div class="text-center" style="width: 200px; margin: 20px auto;">
                     {{  $stocks->links()}} 
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection