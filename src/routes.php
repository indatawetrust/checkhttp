<?php

$route = Config::get('http::config.route');

Route::get($route == '' ? 'check_http' : $route,function(){

	$cacheResponse = false;
	$dbResponse    = false;

	$cache = new Cache;

	if(Config::get('cache.driver') == 'file'){
		$cacheResponse = 'Please set the cache settings redis as.';
	}else{

		try{

			Cache::put('test','test',1);
			$test = Cache::get('test');

			if($test == 'test')
				$cacheResponse = ':)';
				
		}catch(Exception $e){
			$cacheResponse = $e;
		}

	}

	try{

		DB::select('select 1');
		$dbResponse = ':)';

	}catch(Exception $e){
		$dbResponse = $e;
	}

	return Response::json([
		'cache' => $cacheResponse,
		'db'    => $dbResponse
	]);

});