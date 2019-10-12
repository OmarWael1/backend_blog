<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('locale/{locale}', 'LocalizationController@changeLanguage');


Route::get('/jump/to/admin/dashboard', 'Admin\DashboardController@index')->name('dashboard');

/* user routes **/
Route::get('/jump/to/admin/users', 'Admin\UserController@index')->name('users');
Route::get('/jump/to/admin/user/add', 'Admin\UserController@create')->name('addUserView');
Route::post('/jump/to/admin/user/add', 'Admin\UserController@store')->name('addUser');
Route::get('/jump/to/admin/user/edit/{id}', 'Admin\UserController@edit')->name('editUserView');
Route::post('/jump/to/admin/user/edit/{id}', 'Admin\UserController@update')->name('editUser');

/* article routes **/
Route::get('/jump/to/admin/articles', 'Admin\ArticleController@index')->name('articles');
Route::get('/jump/to/admin/article/add', 'Admin\ArticleController@create')->name('addArticleView');
Route::post('/jump/to/admin/article/add', 'Admin\ArticleController@store')->name('addArticle');
Route::get('/jump/to/admin/article/edit/{id}', 'Admin\ArticleController@edit')->name('editArticleView');
Route::post('/jump/to/admin/article/edit/{id}', 'Admin\ArticleController@update')->name('editArticle');
Route::get('/jump/to/admin/article/{id}', 'Admin\ArticleController@show')->name('article');
Route::get('/jump/to/admin/article/delete/{id}', 'Admin\ArticleController@destroy')->name('deleteArticle');

/* stories routes */

Route::get('/jump/to/admin/stories', 'Admin\SmallStoryController@index')->name('stories');
Route::get('/jump/to/admin/story/add', 'Admin\SmallStoryController@create')->name('addStoryView');
Route::post('/jump/to/admin/story/add', 'Admin\SmallStoryController@store')->name('addStory');
Route::get('/jump/to/admin/story/edit/{id}', 'Admin\SmallStoryController@edit')->name('editStoryView');
Route::post('/jump/to/admin/story/edit/{id}', 'Admin\SmallStoryController@update')->name('editStory');
Route::get('/jump/to/admin/story/{id}', 'Admin\SmallStoryController@show')->name('story');
Route::get('/jump/to/admin/story/delete/{id}', 'Admin\SmallStoryController@destroy')->name('deleteStory');

/* researches routes */

Route::get('/jump/to/admin/researches', 'Admin\ResearchController@index')->name('researches');
Route::get('/jump/to/admin/research/add', 'Admin\ResearchController@create')->name('addResearchView');
Route::post('/jump/to/admin/research/add', 'Admin\ResearchController@store')->name('addResearch');
Route::get('/jump/to/admin/research/edit/{id}', 'Admin\ResearchController@edit')->name('editResearchView');
Route::post('/jump/to/admin/research/edit/{id}', 'Admin\ResearchController@update')->name('editResearch');
Route::get('/jump/to/admin/research/{id}', 'Admin\ResearchController@show')->name('research');
Route::get('/jump/to/admin/research/delete/{id}', 'Admin\ResearchController@destroy')->name('deleteResearch');


/* books routes */

Route::get('/jump/to/admin/books', 'Admin\BookController@index')->name('books');
Route::get('/jump/to/admin/book/add', 'Admin\BookController@create')->name('addBookView');
Route::post('/jump/to/admin/book/add', 'Admin\BookController@store')->name('addBook');
Route::get('/jump/to/admin/book/edit/{id}', 'Admin\BookController@edit')->name('editBookView');
Route::post('/jump/to/admin/book/edit/{id}', 'Admin\BookController@update')->name('editBook');
Route::get('/jump/to/admin/book/{id}', 'Admin\BookController@show')->name('book');
Route::get('/jump/to/admin/book/delete/{id}', 'Admin\BookController@destroy')->name('deleteBook');
/* videos routes */

Route::get('/jump/to/admin/videos', 'Admin\VideoController@index')->name('videos');
Route::get('/jump/to/admin/video/add', 'Admin\VideoController@create')->name('addVideoView');
Route::post('/jump/to/admin/video/add', 'Admin\VideoController@store')->name('addVideo');
Route::get('/jump/to/admin/video/edit/{id}', 'Admin\VideoController@edit')->name('editVideoView');
Route::post('/jump/to/admin/video/edit/{id}', 'Admin\VideoController@update')->name('editVideo');
Route::get('/jump/to/admin/video/{id}', 'Admin\VideoController@show')->name('video');
Route::get('/jump/to/admin/video/delete/{id}', 'Admin\VideoController@destroy')->name('deleteVideo');
/* paints routes */
Route::get('/jump/to/admin/paints', 'Admin\PaintController@index')->name('paints');
Route::get('/jump/to/admin/paint/add', 'Admin\PaintController@create')->name('addPaintView');
Route::post('/jump/to/admin/paint/add', 'Admin\PaintController@store')->name('addPaint');
Route::get('/jump/to/admin/paint/edit/{id}', 'Admin\PaintController@edit')->name('editPaintView');
Route::post('/jump/to/admin/paint/edit/{id}', 'Admin\PaintController@update')->name('editPaint');
Route::get('/jump/to/admin/paint/delete/{id}', 'Admin\PaintController@destroy')->name('deletePaint');
//Route::get('/jump/to/admin/paint/{id}', 'Admin\PaintController@show')->name('paint');



/* collections routes */

Route::get('/jump/to/admin/collections', 'Admin\CollectionController@index')->name('collections');
Route::get('/jump/to/admin/collection/add', 'Admin\CollectionController@create')->name('addCollectionView');
Route::post('/jump/to/admin/collection/add', 'Admin\CollectionController@store')->name('addCollection');
Route::get('/jump/to/admin/collection/edit/{id}', 'Admin\CollectionController@edit')->name('editCollectionView');
Route::post('/jump/to/admin/collection/edit/{id}', 'Admin\CollectionController@update')->name('editCollection');
//Route::get('/jump/to/admin/collection/{id}', 'Admin\CollectionController@show')->name('collection');

/* Reader routes*/

Route::get('/', 'Reader\HomePageController@index')->name('home');
Route::get('/about' , 'Reader\AboutPageController@index')->name('about');
Route::get('/articles' , 'Reader\ArticlePageController@indexAr')->name('readerArticles');
Route::get('/articles/fr' , 'Reader\ArticlePageController@indexFr')->name('readerFrArticles');
Route::get('/books' , 'Reader\BookAndResearchPageController@indexForBooks')->name('readerBooks');
Route::get('/researches' , 'Reader\BookAndResearchPageController@indexForResearches')->name('readerResearches');
Route::get('/stories' , 'Reader\SmallStoryPageController@index')->name('readerStories');
Route::get('/videos' , 'Reader\VideosPageController@index')->name('readerVideos');
Route::get('/paints' , 'Reader\PaintsPageController@index')->name('readerPaints');
Route::get('/collections' , 'Reader\CollectionsPageController@index')->name('readerCollections');

Route::get('/video/{id}' ,'Reader\VideosPageController@show')->name('readerVideo');
Route::get('/story/{id}' , 'Reader\SmallStoryPageController@show')->name('readerStory');
Route::get('/book/{id}' , 'Reader\BookAndResearchPageController@showBook')->name('readerBook');
Route::get('/research/{id}' , 'Reader\BookAndResearchPageController@showResearch')->name('readerResearch');
Route::get('/article/{id}' , 'Reader\ArticlePageController@show')->name('readerArticle');
Route::get('/quran/translation' , 'QuranController@index')->name('readerQuran');
Route::get('/paint/{id}' , 'Reader\PaintsPageController@show')->name('readerPaint');
Route::get('/collection/{id}' , 'Reader\CollectionsPageController@show')->name('readerCollection');
