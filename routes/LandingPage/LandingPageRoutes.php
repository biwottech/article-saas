<?php
Route::get('/','Admin\LandingPage\LandingPageController@Home')
->name('home');

Route::get('Winners','Admin\LandingPage\LandingPageController@Winners')
->name('Winners');

Route::get('Pricing','Admin\LandingPage\LandingPageController@Pricing')
->name('Pricing');

Route::get('Contact','Admin\LandingPage\LandingPageController@Contact')
->name('contact');

Route::get('About','Admin\LandingPage\LandingPageController@About')
->name('about');
