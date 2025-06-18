<?php


//use App\Http\Controllers\Paquete_Usuarios\Auth\AuthController;
use App\Http\Controllers\Paquete_Usuarios\Auth\PersonasController;
use App\Http\Controllers\Paquete_Usuarios\clienteController;
use App\Http\Controllers\Paquete_Usuarios\proveedorController;
use App\Http\Controllers\Paquete_Usuarios\usuarioController;
use App\Http\Controllers\Paquete_Productos\productoController;

use App\Http\Controllers\Paquete_Usuarios\bitacoraController;
use App\Http\Controllers\Paquete_compra\ImprimirFacturaController;

use App\Models\Paquete_Usuarios\Auth\Persona;
use App\Models\Paquete_Usuarios\cliente;
use App\Models\Paquete_Usuarios\proveedor;
use Faker\Provider\ar_EG\Person;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Paquete_Productos\categoriaController;
use App\Livewire\ReporteStock;
use App\Models\AuditLog\bitacora;
use App\Observers\bitacoraObserver;
use App\Livewire\HistorialStock;
use App\Http\Controllers\Auth\ResetPasswordController;


use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Password;

use App\Http\Controllers\Paquete_Usuarios\Auth\ResetPwdController;
use App\Livewire\PaqueteCompras\NotaCompra;
use App\Http\Controllers\ConfiguracionController;

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


//actualizacion de la contrasena


 Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
 Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// //resetear contrasena
  Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
 Route::post('password/reset', [ResetPwdController::class, 'reset'] )->name('password.update');
//  Route::put('change/{id}', [PersonasController::class, 'actualizar_credenciales'] )->name('password.change');







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

Route::put('/password-change/{id}', [PersonasController::class, 'actualizar_credenciales'])->name('actualizar.credencial');



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

// historial de inventario
Route::get('/inventario/historial', function () {
    return view('Paquete_productos.producto.inventario_historial'); // o el nombre real del blade que estás usando
})->middleware('auth')->name('inventario.historial');



Route::get('prueba/', function(){
    return view('pruebas');
})->name('prueba');
//cotizacion
Route::middleware('auth')->prefix('cotizacion')->group(function () {
    Route::get('listarCotizaciones', function(){
        return view('Paquete_Ventas.cotizacion.listar-cotizaciones');
    })->name('listar.cotizaciones');
    Route::get('CrearCotizacion', function(){
        return view('Paquete_Ventas.cotizacion.crear-cotizacion');
    })->name('crear.cotizacion');
    Route::get('detalleCotizacion/', function (Illuminate\Http\Request $request) {
        $cotizacionId = $request->query('cotizacionId');
        return view('Paquete_Ventas.cotizacion.detallecotizacion', ['cotizacionId' => $cotizacionId]);
    })->name('detalle.cotizacion');
});

//venta
Route::middleware('auth')->prefix('venta')->group(function () {
    Route::get('listarVentas', function(){
        return view('Paquete_Ventas.venta.listar-ventas');
    })->name('listar.ventas');
    Route::get('crearVenta', function(){
        return view('Paquete_Ventas.venta.crear-venta');
    })->name('crear.venta');
    // Route::get('detalleventa/', function (Illuminate\Http\Request $request) {
    //     $ventaId = $request->query('ventaId');
    //     return view('Paquete_Ventas.venta.detalleventa', ['ventaId' => $ventaId]);
    // })->name('detalle.venta');
});


//Nota compra

Route::get('nota-compra', function(){
    return view('Paquete_compra.listar-compras');
})->name('nota.compra');
Route::get('add-compra', function(){
    return view('Paquete_compra.add-compras');
})->name('add.compra');
Route::get('edit-compra/{id}', function($id){
    return view('Paquete_compra.edit-compras' , ['compra_id' => $id]);
})->name('edit.compra');

Route::get('print-compras/{id}', function($id){
    return view('Paquete_compra.imprimir', ['compra_id' => $id]);
})->name('print.compras');

// Route::get('pdf-compras/{id}', function($id){
//      return view('Paquete_compra.pdf-compras', ['compra_id' => $id]);
//  })->name('pdf.compras');
// web.php
 Route::get('pdf-compras/{id}', [ImprimirFacturaController::class, 'descargarPDF'])->name('pdf.compras');


//  Route::get('/orden-compra/pdf/{id}', [imprimirFacturaController::class, 'descargarPDF'])->name('orden.pdf');
// Route::get('/orden-compra/pdf/{id}', [OrdenCompraController::class, 'descargarPDF'])->name('orden.pdf');


// gestionar pagos

 Route::get('Pago-stripe', function(){

     return view('Paquete_Ventas.PagoStripe.crearPago');
 })->name('pago.stripe');

Route::get('Pago-qr', function(){
    return view('Paquete_Ventas.PagoStripe.pagoQR');
})->name('pago.qr');

Route::get('Pago-tarjeta', function(){
    return view('Paquete_Ventas.PagoStripe.pagoTarjeta');
})->name('pago.tarjeta');






Route::post('/cambiar-tema', [ConfiguracionController::class, 'cambiarTema'])->name('cambiar.tema');

