<?php

namespace App\Http\Controllers\Writer;

use App\User;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Writer\Writer;

class WriterDashboardController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth','writer']);
    }

	public function Dashboard()
	{
		return view('Writer.Dashboard.index');
	}

	public function Settings()
	{
		return view('Writer.Dashboard.Settings.index');
	}
}
