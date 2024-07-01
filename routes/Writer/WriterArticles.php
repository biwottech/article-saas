<?php

Route::get('Articles','Writer\WriterArticleController@AllArticles')
->name('WriterArticles');

Route::get('Read/{id}','Writer\WriterArticleController@WriterReadArticle')
->name('WriterReadArticle');

Route::get('WriteArticle','Writer\WriterArticleController@WriterWriteArticle')
->name('WriterWriteArticle');

Route::post('SaveArticle','Writer\WriterArticleController@WriterSavePublish')
->name('WriterSavePublish');

Route::post('ArchiveArticle','Writer\WriterArticleController@WriterSaveArchive')
->name('WriterSaveArchive');

Route::get('EditArticle/{id}','Writer\WriterArticleController@WriterEditArticle')
->name('WriterEditArticle');

Route::post('UpdateArticle/{id}','Writer\WriterArticleController@WriterUpdateArticle')
->name('WriterUpdateArticle');

Route::post('Publish/{id}','Writer\WriterArticleController@WriterPublishArticle')
->name('WriterPublishArticle');

Route::post('Archive/{id}','Writer\WriterArticleController@WriterArchiveArticle')
->name('WriterArchiveArticle');

Route::post('DeleteArticle/{id}','Writer\WriterArticleController@WriterDeleteArticle')
->name('WriterDeleteArticle');

Route::get('RateArticle/{ratings}/{article_id}','Writer\WriterArticleController@WriterRateArticle')
->name('WriterRateArticle');

Route::post('Report/{id}','Writer\WriterArticleController@WriterReportArticle')
->name('WriterReportArticle');

?>
