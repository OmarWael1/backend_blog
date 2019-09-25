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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});


Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

/* user routes **/
Route::get('/admin/users', 'Admin\UserController@index')->name('users');
Route::get('/admin/user/add', 'Admin\UserController@create')->name('addUserView');
Route::post('/admin/user/add', 'Admin\UserController@store')->name('addUser');
Route::get('/admin/user/edit/{id}', 'Admin\UserController@edit')->name('editUserView');
Route::post('/admin/user/edit/{id}', 'Admin\UserController@update')->name('editUser');

/* article routes **/
Route::get('/admin/articles', 'Admin\ArticleController@index')->name('articles');
Route::get('/admin/article/add', 'Admin\ArticleController@create')->name('addArticleView');
Route::post('/admin/article/add', 'Admin\ArticleController@store')->name('addArticle');
Route::get('/admin/article/edit/{id}', 'Admin\ArticleController@edit')->name('editArticleView');
Route::post('/admin/article/edit/{id}', 'Admin\ArticleController@update')->name('editArticle');
Route::get('/admin/article/{id}', 'Admin\ArticleController@show')->name('article');


/* stories routes */

Route::get('/admin/stories', 'Admin\SmallStoryController@index')->name('stories');
Route::get('/admin/story/add', 'Admin\SmallStoryController@create')->name('addStoryView');
Route::post('/admin/story/add', 'Admin\SmallStoryController@store')->name('addStory');
Route::get('/admin/story/edit/{id}', 'Admin\SmallStoryController@edit')->name('editStoryView');
Route::post('/admin/story/edit/{id}', 'Admin\SmallStoryController@update')->name('editStory');
Route::get('/admin/story/{id}', 'Admin\SmallStoryController@show')->name('story');


/* researches routes */

Route::get('/admin/researches', 'Admin\ResearchController@index')->name('researches');
Route::get('/admin/research/add', 'Admin\ResearchController@create')->name('addResearchView');
Route::post('/admin/research/add', 'Admin\ResearchController@store')->name('addResearch');
Route::get('/admin/research/edit/{id}', 'Admin\ResearchController@edit')->name('editResearchView');
Route::post('/admin/research/edit/{id}', 'Admin\ResearchController@update')->name('editResearch');
Route::get('/admin/research/{id}', 'Admin\ResearchController@show')->name('research');



/* researches routes */

Route::get('/admin/books', 'Admin\BookController@index')->name('books');
Route::get('/admin/book/add', 'Admin\BookController@create')->name('addBookView');
Route::post('/admin/book/add', 'Admin\BookController@store')->name('addBook');
Route::get('/admin/book/edit/{id}', 'Admin\BookController@edit')->name('editBookView');
Route::post('/admin/book/edit/{id}', 'Admin\BookController@update')->name('editBook');
Route::get('/admin/book/{id}', 'Admin\BookController@show')->name('book');

/* researches routes */

Route::get('/admin/videos', 'Admin\VideoController@index')->name('videos');
Route::get('/admin/video/add', 'Admin\VideoController@create')->name('addVideoView');
Route::post('/admin/video/add', 'Admin\VideoController@store')->name('addVideo');
Route::get('/admin/video/edit/{id}', 'Admin\VideoController@edit')->name('editVideoView');
Route::post('/admin/video/edit/{id}', 'Admin\VideoController@update')->name('editVideo');
Route::get('/admin/video/{id}', 'Admin\VideoController@show')->name('video');

/* paints routes */
Route::get('/admin/paints', 'Admin\paintController@index')->name('paints');
Route::get('/admin/paint/add', 'Admin\PaintController@create')->name('addPaintView');
Route::post('/admin/paint/add', 'Admin\PaintController@store')->name('addPaint');
Route::get('/admin/paint/edit/{id}', 'Admin\PaintController@edit')->name('editPaintView');
Route::post('/admin/paint/edit/{id}', 'Admin\PaintController@update')->name('editPaint');
Route::get('/admin/paint/{id}', 'Admin\PaintController@show')->name('paint');



/* collections routes */

Route::get('/admin/collections', 'Admin\CollectionController@index')->name('collections');
Route::get('/admin/collection/add', 'Admin\CollectionController@create')->name('addCollectionView');
Route::post('/admin/collection/add', 'Admin\CollectionController@store')->name('addCollection');
Route::get('/admin/collection/edit/{id}', 'Admin\CollectionController@edit')->name('editCollectionView');
Route::post('/admin/collection/edit/{id}', 'Admin\CollectionController@update')->name('editCollection');
Route::get('/admin/collection/{id}', 'Admin\CollectionController@show')->name('collection');

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

Route::get('/video/{id}' ,'Reader\VideosPageController@show')->name('readerVideo');
Route::get('/story/{id}' , 'Reader\SmallStoryPageController@show')->name('readerStory');
Route::get('/book/{id}' , 'Reader\BookAndResearchPageController@showBook')->name('readerBook');
Route::get('/research/{id}' , 'Reader\BookAndResearchPageController@showResearch')->name('readerResearch');
Route::get('/article/{id}' , 'Reader\ArticlePageController@show')->name('readerArticle');
Route::get('/quran/translation' , function (){

    return view('reader/quran-trans');
})->name('readerQuran');