<?php

/*
|--------------------------------------------------
|   Web Routes
|--------------------------------------------------
*/

Route::group(['middleware'=>'web'],function(){
	Route::get('/', function () {
		//$user = Auth::user();
		return view('welcome');
	});
	
	Auth::routes();
    //Route::get('/home', 'HomeController@index');
    Route::resource('/','FrontController');
    Route::get('blog/{slug}',[
    	'as' => 'blog.single',
    	'uses' => 'FrontController@getSingle'
    	])->where('slug','[\w\d\-\_]+');
    //->where('slug','[\w\d\-\_]')
    Route::get('/post/{id}/show','FrontController@show');
    Route::get('/post/{id}/post','FrontController@getPost');
    Route::get('/image/{id}/post','FrontController@getImage');
    Route::get('/video/{id}/show','FrontController@getVideo');
    Route::post('comment.store/{post_id}','CommentController@store');
    Route::get('cat/{cat}/show','FrontController@showCat');
    Route::get('user/{user}/show','FrontController@showUser');
    Route::post('mail/sent','FrontController@subMail');
    Route::post('savevote','FrontController@saveVote');
    Route::get('poll/{poll}/show','PollController@show');
    /*Route::get('video/{name}',function($name){
	    $fileContents = storage_path('app/'.$name);;
	    $response = Response::make($fileContents, 200);
	    $response->header('Content-Type', "video/mp4");
	    return $response;    	
    });*/
    Route::get('video/{name}',function($name){
	    //$fileContents = storage_path('app/'.$name);;
	    $response = Response::make(200);
	    $response->header('Content-Type', "video/mp4");
	    return $response;    	
    });
});
/*
|--------------------------------------------------
|   Admin Routes
|--------------------------------------------------
*/
Route::group(['middleware'=>['web','admin']],function(){
	Route::get('/admin','AdminController@index');
	Route::resource('/admin/post','PostController');
	Route::get('/post/{post}/edit','PostController@edit');
	Route::get('/menu','AdminController@getMenu');
	Route::post('/menu/create','AdminController@createMenu');
	Route::get('menu/{menu}/edit','AdminController@editMenu');
	Route::post('menu/{menu}/update','AdminController@updateMenu');
	Route::get('not/{post}/send','PostController@notif');
	Route::get('admin/post/{post}/active',[
		'uses' => 'PostController@active',
		'as'   => 'post.active'
		]);
	Route::get('admin/post/{post}/active',[
		'uses' => 'PostController@active',
		'as'   => 'post.active'
		]);
	Route::get('admin/post/{post}/delete',[
		'uses' => 'PostController@destroy',
		'as'   => 'post.delete'
		]);
	Route::get('admin/post/{post}/slider',[
		'uses' => 'PostController@slider',
		'as'   => 'post.slider'
		]);
	Route::post('admin/post/{post}/update','PostController@update');
	Route::get('admin/post/{post}/noactive',[
		'uses' => 'PostController@noActive',
		'as'   => 'post.noactive'
		]);
	Route::get('admin/post/{post}/slider',[
		'uses' => 'PostController@getSlider',
		'as'   => 'post.slider'
		]);
	Route::get('admin/post/{post}/noslider',[
		'uses' => 'PostController@noSlider',
		'as'   => 'post.noslider'
		]);
	Route::get('admin/post/{post}/notsend',[
		'uses' => 'PostController@notSend',
		'as'   => 'post.noslider'
		]);
	Route::resource('cat','CatController');
	Route::get('cat/{cat}/edit','CatController@edit');
	Route::post('cat/{cat}/update','CatController@update');
	Route::get('cat/{cat}/delete','CatController@destroy');
	Route::get('public/images/post/{$image1}',function($name){
			return public_path('images/post/'.$name); 
		});
	Route::get('public/images/post/{$image2}',function($name){
			return public_path('images/post'.$name); 
		});
	Route::get('public/images/post/{$image3}',function($name){
			return public_path('images/post'.$name); 
		});
	Route::get('public/video/{$video}',function($name){
		$fileContents = storage_path('app/video'.$name);
		$response = Response::make(200);
		return $response; 
		});
	/*Route::get('video/{$video}',function($name){
			return public_path('video'.$name); 
		});*
	Route::get('public/video/{$video}',function($name){
			return public_path('video/'.$name); 
		});*/

		Route::get('poll','PollController@index');
		Route::post('poll/store','PollController@store');
		
		Route::post('poll/{poll}/savevote','PollController@saveVote');
});
/*
|--------------------------------------------------
|   Manger Routes
|--------------------------------------------------
*/
Route::group(['middleware'=>['web','manager']],function(){
	Route::get('/manager','MediaController@getManager');
	Route::get('manager/{post}/media','MediaController@getManagerMedia');
	Route::get('manager/{photo}/media/delete','MediaController@destroyPhoto');
});

