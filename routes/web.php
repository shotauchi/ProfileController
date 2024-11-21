<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Laravel04-practice03
// 「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
// /XXX というアクセスしたら AAAController の bbb Action
// 
// use App\Http\Controllers\Admin\NewsController;// use 宣言で使うコントローラを指定する（重複しないように）
// Route::controller(NewsController::class)->prefix('admin')->group(function() {
//     Route::get('profile/create', 'add');// /admin/profile/create
// });

// Laravel04-practice04
// 【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。
// web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の add Action に、
// admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください
use App\Http\Controllers\Admin\NewsController;// use 宣言で使うコントローラを指定する（重複しないように）
Route::controller(NewsController::class)->prefix('admin')->group(function() {
//                                        ^^^^^^^^^^^^^^^ prefix() メソッドで、アクセス URL の接頭辞を指定する
//                ^^^^^^^^^^^^^^^^^^^^^ 使用するコントローラクラスを指定する
    // admin/profile/create にアクセスしたら ProfileController の add Action
    Route::get('profile/create', 'add');// /admin/profile/create
    //                           ^^^^^ コントローラアクション名を指定する
    //         ^^^^^^^^^^^^^^^^ アクセス URL を指定する
    
    // admin/profile/edit にアクセスしたら ProfileController の edit Action
});

// シンプルなルーティング設定
use App\Http\Controllers\UserController;// use 宣言で使うコントローラを指定する（重複しないように）
Route::get('/user', [UserController::class, 'index']);
//                                          ^^^^^^^ アクション名の指定
//                   ^^^^^^^^^^^^^^^^^^^^^ コントローラクラスの指定
//                  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ get() メソッドの第２引数で配列を使って
//                                                   コントローラクラスとアクション名を指定する
//         ^^^^^^^ アクセス URL を指定する

// カリキュラムの少し複雑なルーティング設定
// use App\Http\Controllers\Admin\NewsController;// use 宣言で使うコントローラを指定する（重複しないように）
// Route::controller(NewsController::class)->prefix('admin')->group(function() {
//     Route::get('news/create', 'add');
// });
// ↑↑↑書き換えてみる↓↓↓
// シンプルなルーティング設定
use App\Http\Controllers\Admin\NewsController;// use 宣言で使うコントローラを指定する（重複しないように）
Route::get('/admin/news/create', [NewsController::class, 'add']);
