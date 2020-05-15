<?php
Route::resource('products', 'ProductController');//->middleware('auth');

/*
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
Route::put('products/{id}', 'ProductController@update')->name('products.update');
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::get('products/create', 'ProductController@create')->name('products.create');
Route::get('products/{id}','ProductController@show')->name('products.show');
Route::get('products', 'ProductController@index')->name('products.index');
Route::post('products', 'ProductController@store')->name('products.store');
*/

Route::get('/login', function(){
    return 'Login';
})->name('login');

/*
Route::middleware([])->group(function(){
    
    Route::prefix('Admin')->group(function(){

        Route::namespace('Admin')->group(function(){
            Route::name('admin.')->group(function(){
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
    
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
            
                Route::get('/produtos', 'TesteController@teste')->name('produtcs'); 
        
                Route::get('/', function(){
                    return redirect()->route('admin.financeiro');
                })->name('home');
            });   
        });
    });
       
});
*/
Route::group([
    //nesta funcao de grupos nao funciona passar o gupo nome
    'middleware'=>[],
    'prefix' => 'Admin',
    'namespace' => 'Admin'
], 
function(){    
    Route::get('/dashboard', 'TesteController@teste')->name('admin.dashboard');
    
    Route::get('/financeiro', 'TesteController@teste')->name('admin.financeiro');

    Route::get('/produtos', 'TesteController@teste')->name('admin.produtcs'); 

    Route::get('/', function(){
        return redirect()->route('admin.financeiro');
    })->name('admin.home');
});

Route::get('/redirect3', function(){
    return redirect()->route('url.name');
});

//route('/url.name');

Route::get('/name-url', function(){
    return 'Hey hey hey';
})->name('url.name');

Route::view('/view', '/welcome', ['id' => 'teste']);

Route::redirect('/redirect1', '/redirect2');
// Route::get('/redirect1', function(){
//     return redirect('/redirect2');
// });

Route::get('redirect2', function(){
    return 'Redirect 02';
});

Route::get('/produtos/{idProdutc?}', function($idProdutc = ''){
    return "Produto(s): {$idProdutc}";
});

Route::get('/categoria/{flag}/posts', function($flag){
    return "Produtos da categoria=> {$flag}";
});

Route::get('/categorias/{flag}', function($prm){
    return "Produto da categoria: {$prm}";
});

Route::match(['get','post'], '/match' ,function(){
    return 'Match';
});

Route::any('/any', function(){
    return 'Any';
});

Route::post('/registro', function() {
    return '';
});

Route::get('/empresa', function(){
    return view('site.contato');
});

Route::get('/contato', function(){
    return 'Contato';
});

Route::get('/', function () {
    return view('welcome');
});
