<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   
    $select = DB::table('categories')->get();
    
    return view('welcome',['categories'=>$select]);
});


Route::get('/categories', function () {
    return view('categories');
});


Route::get('/product/{catid?}', function ($catid=null) {

    if($catid==null)
    {
        $select =DB::table('products')->get();
    }else
    {
        $select =DB::table('products')->where('categorie',$catid)->get();
    }
    

    return view('product',['products'=>$select]);
});