<?php


//use App\Http\Controllers\Paquete_Usuarios\Auth\AuthController;
use App\Http\Controllers\Paquete_Usuarios\Auth\PersonasController;
use App\Http\Controllers\Paquete_Usuarios\clienteController;
use App\Http\Controllers\Paquete_Usuarios\proveedorController;
use App\Http\Controllers\Paquete_Usuarios\usuarioController;
use App\Http\Controllers\Paquete_Productos\productoController;

use App\Http\Controllers\Paquete_Usuarios\bitacoraController;

use App\Models\Paquete_Usuarios\Auth\Persona;
use App\Models\Paquete_Usuarios\cliente;
use App\Models\Paquete_Usuarios\proveedor;
use Faker\Provider\ar_EG\Person;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paquete_Productos\categoriaController;
use App\Livewire\ReporteStock;
use App\Models\AuditLog\bitacora;
use App\Observers\bitacoraObserver;

Route::get('/', function () {
    return view('Paquete_Usuarios.usuario.login');
    // return view('welcome');



});

//auth

Route::prefix('auth')->group(function () {
    // Route::get('login', function(){
    //     return 'Usuario registrado exitosamente ';
    // })->name('login');
    Route::get('login', [PersonasController::class, 'login'])->name('login');
    Route::post('login', [PersonasController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [PersonasController::class, 'register'])->name('register');
    Route::post('register', [PersonasController::class, 'registerVerify'])->name('register.verify');
    Route::post('signOut', [PersonasController::class, 'signOut'])->name('signOut');
});


// Route::get('register/categoria', [categoriaController::class, 'register1'])->name('register.categoria');
// Route::post('register/categoria', [categoriaController::class, 'registerVerify1']);


//protegidas
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {

        //return 'hola mundo '.auth()->user()->nombre;
        // return view('dashboard.index');
        return view('dashboard');
    })->name('dashboard');

    Route::get('perfil', [PersonasController::class, 'mostrarPerfil'])->name('perfil');
    Route::get('listaUsuarios', [PersonasController::class, 'listarUsuarios'])->name('listar.usuarios');
    // Route::get('perfil', [PersonasController::class, '']);
    //usuarios
    Route::get('/vista', function () {
        return view('Paquete_Usuarios.usuario.perfil');
    })->name('lista');

    Route::resource('persona', PersonasController::class);
    Route::resource('cliente', clienteController::class);

    Route::get('register/cliente', [clienteController::class, 'register'])->name('register.cliente');
    Route::get('listaClientes', [clienteController::class, 'listarClientes'])->name('listar.clientes');
    Route::post('register/cliente', [clienteController::class, 'registerVerify'])->name('cliente.verify');


    Route::get('register/proveedor', [proveedorController::class, 'register'])->name('register.proveedor');
    Route::post('register/proveedor', [proveedorController::class, 'registerVerify'])->name('proveedor.verify');


    Route::get('register/usuario', [usuarioController::class, 'register'])->name('register.usuario');
    Route::post('register/usuario', [usuarioController::class, 'registerVerify'])->name('usuario.verify');


        Route::get('listaEmpleados', [PersonasController::class, 'listarEmpleados'])->name('listar.empleados');


    // crear usuarios
    Route::get('crear', [PersonasController::class, 'crearUsuarios'])->name('crear.usuarios');
});



// return 'Hola dashboard aqui termino la clase';
// return view('dashboard.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// bitacora
Route::middleware('auth')->prefix('bitacora')->group(function () {

    // Route::resource('bitacora', bitacoraController::class);
    Route::get('ver/bitacora', [bitacoraController::class, 'vistaBitacora'])->name('ver.bitacora');
    Route::get('/lista1', [bitacoraController::class, 'listarAccionCuenta'])->name('listar.accion.cuenta');
    Route::get('/lista2', [bitacoraController::class, 'listarEventosCuenta'])->name('listar.eventos.cuenta');
});


//categoria

Route::middleware('auth')->prefix('categoria')->group(function () {
    Route::resource('categoria', categoriaController::class);
    Route::get('register/categoria', [categoriaController::class, 'register'])->name('register.categoria');
    Route::post('register/categoria', [categoriaController::class, 'registerVerify'])->name('categoria.verify');
    Route::get('listarCategorias', [categoriaController::class, 'listarCategorias'])->name('listar.categorias');
});

//producto
Route::middleware('auth')->prefix('producto')->group(function () {
    Route::resource('producto', productoController::class);
    Route::get('register/producto', [productoController::class, 'register'])->name('register.producto');
    Route::post('register/producto', [productoController::class, 'registerVerify'])->name('producto.verify');
    Route::get('listarProductos', [productoController::class, 'listarProductos'])->name('listar.productos');

    Route::get('/reportes/stock-bajo', function(){
        return view('Paquete_productos.producto.listar_stocks');
    })->name('vista.stock.bajo');
    // Route::get('/reportes/stock-bajo', ReporteStock::class)->name('vista.stock.bajo');

    Route::get('lista/imagen/producto', [ productoController::class, 'pruebaProducto'])->name('prueba.producto');
    Route::get('tarjeta/{id}', [ productoController::class, 'tarjetaProducto'])->name('tarjeta.producto');


});

Route::get('prueba/', function(){
    return view('pruebas');
})->name('prueba');

//     Route::middleware('auth')->prefix('cuentas')->group(function () {
//     Route::get('/', [CuentaController::class, 'index'])->name('cuentas.index');
//     Route::get('/crear', [CuentaController::class, 'create'])->name('cuentas.create');
//     // otras rutas...
// });
