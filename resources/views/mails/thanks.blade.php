@component('mail::message')

{{ $user }}様<br>
この度はオノガワパンでのご予約ありがとうございます。<br>

お客様がご予約した商品は<br>

@foreach ($checkout_items as $item)
・{{ $item->stock->name }}｜{{ $item->stock->price }}円
<br>
@endforeach

となります。<br>

下記の決済画面より決済を完了させてください。<br>

@component('mail::button', ['url' => ''])
決済画面へ
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent
