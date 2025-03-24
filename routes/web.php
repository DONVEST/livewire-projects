<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filter', function () {
    return view('filter');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/todo', function () {
    return view('todo_list');
});

Route::get('/modal', function () {
    return view('modal');
});