<?php

namespace App\Http\Controllers\Admin\LandingPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Admin\Competetion;

class LandingPageController extends Controller
{
   	public function Home()
   	{
   		return view('LandingPage.index');
   	}

	public function Winners()
	{
		$results = Competetion::MostRecentResult();
		return view('LandingPage.winners.index',compact('results'));
	}

	public function Pricing()
	{
		return view('LandingPage.pricing.index');
	}

	public function Contact()
	{
		return view('LandingPage.contact.Contact');
	}

	public function About()
	{
		return view('LandingPage.about.about');
	}
}
