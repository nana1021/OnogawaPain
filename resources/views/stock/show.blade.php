@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="">
        <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品紹介</h1>
            <div class="">
                <div class="d-flex flex-row flex-wrap">
                    <div class="col-xs-6 col-sm-4 col-md-4 ">
                        <div class="mycart_box">
                            {{$stock->name}} <br>
                            {{$stock->price}}円<br>
                            <img src="{{ asset('storage/image/' . $stock->image_path) }}" alt="" class="incart"><br>
                            {{$stock->tagline}} <br>
                            {{$stock->detail}} <br>
                            <form action="mycart" method="POST">
                                @csrf
                                <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                <table>
                                    <tr>
                                        <td><label>数量：</label></td>
                                        <td><input type="number" style="width:60px" name="quantity" class="form-control" min="0" value="0"></td><br>
                                        <td><input type="submit" value="カートに入れる"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>                  
            </div>
        </div>
    </div>
</div>
@endsection