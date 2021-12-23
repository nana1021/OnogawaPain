@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">ユーザー一覧</div>
		<div class="card-body">

			<table class="list-group">
				<tboby>
					@foreach ($user_list as $user)
						<tr>
							<td class="list-group-item col-md-12" style="width:1000px;">
								<a href="{{ url('admin/user/' . $user->id) }}">
									{{ $user->name }}
								</a>
							</td>
							<td>
							<button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$user->id}}"><i class="far fa-trash-alt"></i> 削除</button>
			                <!--Modal-->
			                    <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			                        <div class="modal-dialog" role="document">
			                            <form action="{{ action('admin\ManageUserController@showUserDelete', ['user' => $user->id])}}">削除</a>
			                            @csrf
			                            <div class="modal-content">
			                                <div class="modal-header">
			                                <h5 class="modal-title" id="exampleModalLabel">削除</h5>
			                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                                        <span aria-hidden="true">&times;</span>
			                                    </button>
			                                </div>
			                                <div class="modal-body">
			                                    <p class="text-primary">『{{ $user->name }}』本当に削除しますか？</p>
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
						</tr>
					@endforeach
				</tboby>
			</table>	
			<div class="mt-3">
				{{ $user_list->links() }}
			</div>
			
		</div>
	</div>
</div>
@endsection​