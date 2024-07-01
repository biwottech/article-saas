<?php

Route::get('SearchStories','Reader\ReaderArticleController@ReaderSearchStories')->name('ReaderSearchStories');

Route::get('Read/{article}','Reader\ReaderArticleController@ReaderReadArticle')->name('ReaderReadArticle');

Route::post('Report/{article}','Reader\ReaderArticleController@ReaderReportArticle')->name('ReaderReportArticle');

?>
