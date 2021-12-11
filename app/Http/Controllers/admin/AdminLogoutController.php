<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLogoutController extends Controller
{
    function logout(Request $request){
		$request->session()->forget("admin_auth");
		return redirect("admin");
	}
}
