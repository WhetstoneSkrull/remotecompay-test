<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfDownloadController;
use App\Http\Controllers\HtmlSnippetController;
use App\Http\Controllers\UrlLinkController;
use App\Http\Controllers\ERPController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('pdfs', PdfDownloadController::class );
Route::resource('snippets', HtmlSnippetController::class);
Route::resource('url_links', UrlLinkController::class);
Route::resource('erps', ERPController::class);
