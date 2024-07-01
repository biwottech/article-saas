<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth','admin']);
    }
    
	public function index()
	{
		return view('Admin.Dashboard.index');
	}

}
