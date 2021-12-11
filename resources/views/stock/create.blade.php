@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '商品投稿ページ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class=box>
            <div class="col-md-8 mx-auto">
                <h1>商品</h1>
                <form action="{{ action('StockController@create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                
                    <div class="form-group row">
                        <label class="col-md-2" for="name">商品名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="detail">商品説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="detail" rows="5">{{ old('detail') }}</textarea>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2" for="price">価格</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                    </div>
                  
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="name">写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                     <input type="submit" class="btn btn-info" value="更新">
                </form>
            </div>
        </div>
    </div>
    </dev>
@endsection