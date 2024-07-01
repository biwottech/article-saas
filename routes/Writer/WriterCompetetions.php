<?php


Route::get('Competetions','Writer\WriterCompetetionController@Competetions')
->name('WriterCompetetions');

Route::get('JoinCompetetion/{competetion}','Writer\WriterCompetetionController@JoinCompetetion')
->name('WriterJoinCompetetion');

Route::get('Competetion/{competetion}/GuideLines','Writer\WriterCompetetionController@GuideLines')
->name('WriterCompetetionGuideLines');

Route::get('WithDrawFromCompetetion/{competetion}','Writer\WriterCompetetionController@WithDrawFromCompetetion')
->name('WriterWithDrawFromCompetetion');

Route::get('JoinedCompetetions','Writer\WriterCompetetionController@JoinedCompetetions')
->name('WriterJoinedCompetetions');

Route::get('ReadArticles','Writer\WriterCompetetionController@ReadArticles')
->name('WriterReadArticles');

Route::post('SubmitArticle/{article}/InCompetetion/{competetion}','Writer\WriterCompetetionController@SubmitArticle')
->name('WriterSubmitArticle');

Route::post('WithdrawArticle/{article}/FromCompetetion/{competetion}','Writer\WriterCompetetionController@WithDrawAnArticle')
->name('WriterWithDrawArticle');

Route::get('ViewedArticles','Writer\WriterCompetetionController@ViewedArticles')
->name('WriterViewedArticles');

Route::get('SubmittedArticles','Writer\WriterCompetetionController@SubmittedArticles')
->name('WriterSubmittedArticles');

Route::get('RatedArticles','Writer\WriterCompetetionController@RatedArticles')
->name('WriterRatedArticles');

?>
