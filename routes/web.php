<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;


route::controller(loginController::class)->group(function(){
    //solo mostramos la pagina de iniciar sesion
    route::get('/', 'index')->name('log_home');

    //aqui validamos si los datos ingresados ya estan registrados, para dar permisos o simplemente no dejar pasar
    route::post('/login', 'validar')->name('validacion');

    //pagina para registrar un usuario nuevo
    route::get('/registro_nuevo', 'reg_new')->name('registro_new');
    //aqui se hace el proceso de recoger y guardar los datos de registro de nuevos usuarios
    route::POST('/home', [loginController::class, 'store'])->name('home');



    //esta en la pagina de inicio despues de logearse, osea la pagina principal
    route::get('/inicio', [homeController::class, 'index'])->middleware('auth')->name('inicio');
    //aqui cerramos la sesion iniciada
    route::get('/loginn','logout')->middleware('auth')->name('salir');

    //plantilla
    route::get('plantilla','plantilla')->name('plantilla');
});

