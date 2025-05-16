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
use App\Models\AuditLog\bitacora;
use App\Observers\bitacoraObserver;

Route::get('/', function () {
    return view('Paquete_Usuarios.usuario.login');
});

//auth

Route::prefix('auth')->group(function () {
    // Route::get('login', function(){
    //     return 'Usuario registrado exitosamente ';
    // })->name('login');
    Route::get('login', [PersonasController::class, 'login'])->name('login');
    Route::post('login', [PersonasController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [PersonasController::class, 'register'])->name('register');
    Route::post('register', [PersonasController::class, 'registerVerify']);
    Route::post('signOut', [PersonasController::class, 'signOut'])->name('signOut');
});

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
    Route::post('register/cliente', [clienteController::class, 'registerVerify']);

    Route::get('register/proveedor', [proveedorController::class, 'register'])->name('register.proveedor');
    Route::post('register/proveedor', [proveedorController::class, 'registerVerify']);

    Route::get('register/usuario', [usuarioController::class, 'register'])->name('register.usuario');
    Route::post('register/usuario', [usuarioController::class, 'registerVerify']);


    // crear usuarios
    Route::get('crear', [PersonasController::class, 'crearUsuarios'])->name('crear.usuarios');
});



// return 'Hola dashboard aqui termino la clase';
// return view('dashboard.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // producto y categorias
// Route::get('register/proveedor', [proveedorController::class, 'register'])->name('register.proveedor');
// Route::post('register/proveedor', [proveedorController::class, 'registerVerify']);

// Route::get('register/proveedor', [proveedorController::class, 'register'])->name('register.proveedor');
// Route::post('register/proveedor', [proveedorController::class, 'registerVerify']);

// bitacora
Route::middleware('auth')->prefix('bitacora')->group(function () {
    // Route::get('/', [CuentaController::class, 'index'])->name('cuentas.index');
    // Route::get('/crear', [CuentaController::class, 'create'])->name('cuentas.create');
    // otras rutas...
    Route::resource('bitacora', bitacoraController::class);
    Route::get('listarBitacora', [bitacoraController::class, 'listarBitacora'])->name('listar.bitacora');
});

//categoria

Route::middleware('auth')->prefix('categoria')->group(function () {
    Route::resource('categoria', categoriaController::class);
    Route::get('register/categoria', [categoriaController::class, 'register'])->name('register.categoria');
    Route::post('register/categoria', [categoriaController::class, 'registerVerify']);
    Route::get('listarCategorias', [categoriaController::class, 'listarCategorias'])->name('listar.categorias');
});

//producto
Route::middleware('auth')->prefix('producto')->group(function () {
    Route::resource('producto', productoController::class);
    Route::get('register/producto', [productoController::class, 'register'])->name('register.producto');
    Route::post('register/producto', [productoController::class, 'registerVerify']);
    Route::get('listarProductos', [productoController::class, 'listarProductos'])->name('listar.productos');
});


//     Route::middleware('auth')->prefix('cuentas')->group(function () {
//     Route::get('/', [CuentaController::class, 'index'])->name('cuentas.index');
//     Route::get('/crear', [CuentaController::class, 'create'])->name('cuentas.create');
//     // otras rutas...
// });
