@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')にを埋め込む --}}
@section('title', '商品投稿ページ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class=box>
            <div class="col-md-8 mx-auto" style="width:600px;">
                <h2>商品情報登録</h2>
                <form action="{{ route('adminstock.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label class="col-md-2" for="tagline">短い説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="tagline" rows="2">{{ old('tagline') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="detail">詳細説明</label>
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
                        <label class="col-md-2" for="image">写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                     <input type="submit" class="btn btn-info" value="登録">
                </form>
            </div>
        </div>
    </div>
    </dev>
@endsection