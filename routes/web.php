<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
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

// Route::get('/', function () {
//     // $users = DB::table('users')->latest()->first();
//         // foreach($users as $user)
//         // {
//         //   echo "<pre>";
//         //   echo $user->id;
//         // }
//     // echo $users->id;
//     return view('users_list');

// });
Route::get('/',[usercontroller::class,'list']);
Route::get('sendreport/{id}',[usercontroller::class,'sendreport']);
//Route::view('report','report');
