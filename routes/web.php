<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
// book
 $router->group(['middleware' => 'client.credentials'], function() use ($router)
 {

    $router->get('/book',  'Book\BookController@index');
    $router->post('/book', 'Book\BookController@store');
    $router->get('/book/{book_id}', 'Book\BookController@show');
    $router->put('/book/{book_id}', 'Book\BookController@update');
    $router->delete('/book/{book_id}', 'Book\BookController@destroy');
    
    // author
    $router->get('/author', 'Author\AuthorController@index');
    $router->post('/author', 'Author\AuthorController@store');
    $router->get('/author/{author}', 'Author\AuthorController@show');
    $router->put('/author/{author}', 'Author\AuthorController@update');
    $router->delete('/author/{author}', 'Author\AuthorController@destroy');

 });
