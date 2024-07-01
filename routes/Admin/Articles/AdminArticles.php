<?php
Route::get('Articles','Admin\Articles\AdminArticleController@AdminAllArticles')
->name('AdminArticles');

Route::get('SearchArticles','Admin\Articles\AdminArticleController@AdminSearchArticles')
->name('AdminSearchArticles');


Route::get('ReadArticle/{article}','Admin\Articles\AdminArticleController@AdminReadArticle')
->name('AdminReadArticle');

Route::get('EditArticle/{article}','Admin\Articles\AdminArticleController@AdminEditArticle')
->name('AdminEditArticle');

Route::post('UpdateArticle/{article}','Admin\Articles\AdminArticleController@AdminUpdateArticle')
->name('AdminUpdateArticle');

Route::get('ArticleStatistics/{article}','Admin\Articles\AdminArticleController@AdminArticleStatistics')
->name('AdminArticleStatistics');

Route::post('PublishAnArticle/{article}','Admin\Articles\AdminArticleController@AdminPublishAnArticle')
->name('AdminPublishAnArticle');

Route::post('ArchiveAnArticle/{article}','Admin\Articles\AdminArticleController@AdminArchiveAnArticle')
->name('AdminArchiveAnArticle');

Route::post('BanAnArticle/{article}','Admin\Articles\AdminArticleController@AdminBanAnArticle')
->name('AdminBanAnArticle');

Route::post('UnBanAnArticle/{article}','Admin\Articles\AdminArticleController@AdminUnBanAnArticle')
->name('AdminUnBanAnArticle');

Route::post('DeleteArticle/{article}','Admin\Articles\AdminArticleController@AdminDeleteArticle')
->name('AdminDeleteArticle');
?>
