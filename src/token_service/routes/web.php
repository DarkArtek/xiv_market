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

use Companion\CompanionApi;
use Companion\Config\CompanionConfig;
Route::get('/token', function () {
    // create a new token
    $api = new CompanionApi('manual_login');
    $api->Account()->login($_ENV['USERNAME'], $_ENV['PASSWORD']);
    $api->Login()->loginCharacter($_ENV['CHARACTER_ID']);
    $character = $api->login()->getCharacter()->character;
    $api->login()->getCharacterStatus();
    return CompanionConfig::getToken()->token;
});
