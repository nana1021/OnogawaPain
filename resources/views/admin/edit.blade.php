@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', '商品編集ページ')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class=box mx-auto>
            <div class="col-md-12" style="width:600px;"> 
                <h3>商品登録変更</h3>
                <form action="{{ route('adminstock.update', $stock_form->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                            <input type="text" class="form-control" name="name" value="{{ $stock_form->name }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="tagline">短い説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="detail" rows="2">{{ $stock_form->tagline }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="detail">詳細説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="detail" rows="5">{{ $stock_form->detail }}</textarea>
                        </div>
                    </div>
                    
                     <div class="form-group row">
                        <label class="col-md-2" for="price">価格</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" style="width:150px;" name="price" value="{{ $stock_form->price }}">
                        </div>
                    </div>
                  
                     <div class="form-group row">
                        <label class="col-md-2" for="image">写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-danger">
                                設定中: {{ $stock_form->image_path }}
                                <img src="{{ asset('storage/image/' . $stock_form->image_path) }}"class="rounded">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                     <input type="submit" class="btn btn-info" value="変更">
                </form>
            </div>
        </div>
    </div>
    </dev>
@endsection