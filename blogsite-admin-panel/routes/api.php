<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\ProductController;

use App\Http\Controllers\Api\ClientController;

use App\Http\Controllers\Api\ManagementController;


use App\Http\Controllers\Api\BlogManagementController;


Route::get('/blogs', [BlogManagementController::class, 'index']);


