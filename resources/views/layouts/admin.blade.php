<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', '管理ページ') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('admin/top') }}">管理ページ</a>
                    <table>
    					<tr>
    						<td>
    							<div class="btn-group mx-auto">
    								<a href="{{ url('admin/user_list') }}">ユーザー一覧　　</a>
    							</div>
    						</td>	
    						<td>	
    							<div>
    								<a href="{{ url('adminstock/create') }}">商品登録　　</a>
    							</div>
    						</td>
    						<td>	
    							<div>
    								<a href="{{ url('adminstock') }}">登録変更　　</a>
    							</div>
    						</td>
    						<td>
    							<form method="post" action="{{ url('admin/logout') }}">
    								@csrf
    								<input type="submit" value="ログアウト">
    							</form>
    						</td>
    						<td>	
							<div>
								<a href="{{ url('/top') }}">トップページ</a>
							</div>
						</td>
    					</tr>
    				</table>
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>