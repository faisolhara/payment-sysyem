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
Route::group(['middleware' => ['menu', 'web']], function () {
    
    Route::get('coba', function() {
            var_dump(Gate::allows('access', ['Master\MasterUser', 'view']));
        exit();
            return view('errors.403');

        });
    Route::get('test-user', function(\Doctrine\ORM\EntityManagerInterface $em) {
        $user = new \App\Entities\Master\User('Faisol', 'sfaisolandi@gmail.com');
        $user->setPassword(bcrypt('123456'));        
        // $user->setUsername('faisol');
        $em->persist($user);
        $em->flush();
    });

    Route::get('/', function () {
        if(empty(\Auth::user())){
            return redirect('login');
        }
        return redirect('dashboard');
    });

    Route::get('/dashboard', 'HomeController@index');


    Route::get('login', ['as' => 'login', function() {
        if(!empty(\Auth::user())){
            return redirect('dashboard');
        }
        return view('login');
    }]);
    
    Route::post('login', function(\Illuminate\Http\Request $request) {
        // dd($request->all());
        if(\Auth::attempt([
            'username' => $request->get('username'),
            'password' => $request->get('password')
        ])) {
            return redirect('dashboard');
        }
            return redirect('login')->withErrors(['errorMessage' => 'Wrong username or password!']);
    });

    Route::get('logout', function() {
        \Auth::logout();
        return redirect('login');
    });

    Route::group(['middleware' => ['auth']], function () {
            return redirect('/login');
    });

    // Master
    Route::group(['prefix' => 'master'], function() {
        Route::group(['prefix' => 'master-user'], function() {
            Route::any('', 'Master\MasterUserController@index');
            Route::get('add', 'Master\MasterUserController@add');
            Route::get('edit/{id}', 'Master\MasterUserController@edit');
            Route::post('save', 'Master\MasterUserController@save');
        });
        Route::group(['prefix' => 'master-role'], function() {
            Route::any('', 'Master\MasterRoleController@index');
            Route::get('add', 'Master\MasterRoleController@add');
            Route::get('edit/{id}', 'Master\MasterRoleController@edit');
            Route::post('save', 'Master\MasterRoleController@save');
        });
    });

});