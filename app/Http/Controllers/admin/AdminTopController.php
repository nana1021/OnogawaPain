<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;

class AdminTopController extends Controller
{
    function show(){
		return view("admin.admin_top");
	}
}
