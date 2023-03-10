<?php

use App\Http\Controllers\MenusController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'ApiRep'
], function () {
        Route::post('menusindex',        [MenusController::class, 'menusindex']);
        Route::post('rolesindex',        [RolesController::class, 'index']);
        Route::post('Usuariosindex',     [UsuarioController::class, 'Usuariosindex']);
        Route::post('SelectIndex',       [SelectController::class, 'SelectIndex']);

        
        Route::post('reportesindex',     [ReportesController::class, 'reportesindex']);
        Route::post('RelTE',             [ReportesController::class, 'RelTE']);

        
/*
        Route::prefix('reportes')->group(function () {
            Route::get('excel', [ReportesController::class, 'index']);
            Route::get('pdf',   [ReportesPDFController::class, 'index']);
        });

        Route::prefix('plantillas')->group(function () {
            Route::get('/', [PlantillasController::class,'index']);
            Route::post('crear',[PlantillasController::class,'store']);
            Route::put('editar',[PlantillasController::class,'update']);
            Route::get('mostrar',[PlantillasController::class,'show']);
            Route::get('eliminar',[PlantillasController::class,'destroy']);
        });*/




});
