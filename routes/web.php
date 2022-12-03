<?php


use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\RestauranteUsersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\controladorPIni;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

//Route::get('/', function () {});

// tes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */

Route::get('/',[controladorPIni::class, 'Cargardatos'])->name('inicio.inicio');


Route::post('/', [controladorPIni::class, 'Filtro'])->name('inicio.filtrado');
//localhost:8000/prueba




//GERENTE
//nombre de la ruta         llamamos al controlador de gerente y nos invoca el metodo index     
//Route::get('/', [ClienteController::class, 'index'])->name('cliente.index'); //este name es como se llama internamente

//Route::get('/gerenteEdit', [GerenteController::class,'edit'])->name('gerente.edit');este name es como se llama internamente


/*
|--------------------------------------------------------------------------
| Creacion Restaurante
|--------------------------------------------------------------------------
*/
Route::get('/crear-restaurante', [RestauranteController::class, 'create'])->name('restaurante.create'); //Formulario de crear Restaurante
Route::post('/guardar-restaurante', [RestauranteController::class, 'store'])->name('restaurante.store'); //Añade a la BBDD el nuevo restaurante
//le obligo a que reciva un parametro y va con la interrogacion de opcional porque si no da error el listar
/*
|--------------------------------------------------------------------------
| Listar Restaurante ligado a gerente
|--------------------------------------------------------------------------
*/
Route::get('/listar-restaurante', [RestauranteController::class, 'index'])->name('restaurante.index'); //Muestra todos los Restaurantes
/*
|--------------------------------------------------------------------------
| editar Restaurante 
|--------------------------------------------------------------------------
*/
Route::post('/editar-restaurante/{codigoRestaurante?}', [RestauranteController::class, 'edit'])->name('restaurante.edit'); //Formulario de Editar Restaurante
//es de tipo put porq asi lo especifico en el method del formulario que se encuentra en la vista editar
Route::put('/guardar-restaurante/{codigoRestaurante?}', [RestauranteController::class, 'update'])->name('restaurante.update'); //Actualiza la BBDD con el nuevo restaurante
/*
|--------------------------------------------------------------------------
| borrar Restaurante 
|--------------------------------------------------------------------------
*/
Route::post('/mostrar-restaurante/{codigoRestaurante?}', [RestauranteController::class, 'show'])->name('restaurante.show'); //Captura el restaurante a eliminar
Route::delete('/borrar-restaurante/{codigoRestaurante?}', [RestauranteController::class, 'destroy'])->name('restaurante.destroy'); //elimina el restaurante
/*
|--------------------------------------------------------------------------
| Mostrar Detalles Restaurante 
|--------------------------------------------------------------------------
*/
Route::get('/detalles-restaurante/{codigoRestaurante?}', [RestauranteController::class, 'mostarInfoRestaurante'])->name('restaurante.mostarInfoRestaurante'); //Muestra la informacion concreta del restaurante


/*
|--------------------------------------------------------------------------
| Creacion CLiente
|--------------------------------------------------------------------------
*/
Route::get('/crear-cliente', [UsersController::class, 'createCliente'])->name('cliente.create'); //Formulario para crear cliente
Route::post('/guardar-cliente', [UsersController::class, 'storeCliente'])->name('cliente.store'); //Añade a la BBDD el nuevo Cliente
/*
|--------------------------------------------------------------------------
| editar Cliente 
|--------------------------------------------------------------------------
*/
Route::get('/editar-cliente', [UsersController::class, 'editCliente'])->name('cliente.edit'); //Formulario de Editar Cliente
//es de tipo put porq asi lo especifico en el method del formulario que se encuentra en la vista editar
Route::put('/guardar-cliente/{cliente?}', [UsersController::class, 'updateCliente'])->name('cliente.update'); //Actualiza la BBDD con el Cliente

/*
|--------------------------------------------------------------------------
| Loggin CLiente
|--------------------------------------------------------------------------
*/
Route::get('/formulario-logginCliente', [UsersController::class, 'logginRegistroCliente'])->name('cliente.logginRegistroCliente'); //Formulario para loggear el cliente
Route::post('/formulario-logginCliente', [UsersController::class, 'autenticarCliente'])->name('cliente.autenticarCliente'); //realiza el propio log con la BBDD
/*
|--------------------------------------------------------------------------
| LogOut CLiente
|--------------------------------------------------------------------------
*/
Route::get('/logOut', [UsersController::class, 'logOut'])->name('cliente.logOut'); //Cierra la Sesion del cliente

/*
|--------------------------------------------------------------------------
| Creacion Reserva
|--------------------------------------------------------------------------
*/                                                  //METODO VACIO
Route::get('/crear-reserva', [RestauranteUsersController::class, 'create'])->name('reserva.create'); //Formulario de crear reserva
Route::post('/guardar-reserva/{codigoRestaurante}', [RestauranteUsersController::class, 'store'])->name('reserva.store'); //Añade a la BBDD la nueva reserva

/*
|--------------------------------------------------------------------------
| Listar Reserva ligada a cliente
|--------------------------------------------------------------------------
*/
Route::get('/listar-reserva', [RestauranteUsersController::class, 'index'])->name('reserva.index'); //Muestra todos las reservas de ese cliente
/*
|--------------------------------------------------------------------------
| editar Reserva
|--------------------------------------------------------------------------
*/ 
Route::post('/editar-reserva/{codigoRes?}&{fecha?}&{hora?}', [RestauranteUsersController::class, 'edit'])->name('reserva.edit'); //Formulario de Editar reserva
//es de tipo put porq asi lo especifico en el method del formulario que se encuentra en la vista editar
Route::put('/guardar-reserva/{codigoRes?}&{fecha?}&{hora?}', [RestauranteUsersController::class, 'update'])->name('reserva.update'); //Actualiza la BBDD con la nueva reserva
/*
|--------------------------------------------------------------------------
| borrar Reserva
|--------------------------------------------------------------------------
*/
Route::post('/mostrar-reserva/{codigoRes?}&{fecha?}&{hora?}', [RestauranteUsersController::class, 'show'])->name('reserva.show'); //Captura la reserva a eliminar
Route::delete('/borrar-reserva/{codigoRes?}&{fecha?}&{hora?}', [RestauranteUsersController::class, 'destroy'])->name('reserva.destroy'); //elimina el restaurante







// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// require __DIR__.'/auth.php';
