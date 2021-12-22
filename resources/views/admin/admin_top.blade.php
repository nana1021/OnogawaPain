@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">管理側TOP</div>
		<div class="card-body">
			<div>
				<a href="{{ url('admin/user_list') }}" class="btn btn-primary">ユーザー一覧</a>
			</div>
			
			<div>
				<a href="{{ url('adminstock/create') }}" class="btn btn-primary">商品登録</a>
			</div>
			
			<div>
				<a href="{{ url('adminstock') }}" class="btn btn-primary">登録変更</a>
			</div>

			<form method="post" action="{{ url('admin/logout') }}">
				@csrf
				<input type="submit" class="btn btn-danger" value="ログアウト" />
			</form>
		</div>
	</div>
</div>
@endsection