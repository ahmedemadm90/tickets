<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\CleaningToolController;
use App\Http\Controllers\DispatchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaintenanceCategoryController;
use App\Http\Controllers\MaintenanceToolController;
use App\Http\Controllers\OperationalStateController;
use App\Http\Controllers\RecordDeviceController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VlanController;
use App\Models\Camera;
use GuzzleHttp\Exception\ConnectException;

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
/* Route::get('test/get',function()
{
    $client = new GuzzleHttp\Client();
    try {
        $res = $client->request('GET', 'http://192.168.60.11', ['connect_timeout' => 3]);
        dd('Success');
    } catch (ConnectException $e) {
        dd('Offline');
    }
}); */
/* Route::get('test/get',function()
{
    set_time_limit(0);
    $client = new GuzzleHttp\Client();
    $cameras = Camera::where('ping', 1)->get();
    foreach ($cameras as $camera) {
        try {
            $res = $client->request('GET', "http://$camera->ip", ['connect_timeout' => 3]);
            $camera->update([
                'state'=>'online',
            ]);
        } catch (\Throwable $th) {
            $camera->update([
                'state' => 'offline',
            ]);
        }
    }
}); */
Route::any('/findcams', [CameraController::class, "find"])->name('findcams');
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    /* Start Roles Routes */
    Route::prefix('roles')->group(function () {
        Route::get('/index', [RoleController::class, "index"])->name('roles.index');
        Route::get('/create', [RoleController::class, "create"])->name('roles.create');
        Route::get('/show/{id}', [RoleController::class, "show"])->name('roles.show');
        Route::post('/store', [RoleController::class, "store"])->name('roles.store');
        Route::get('/edit/{id}', [RoleController::class, "edit"])->name('roles.edit');
        Route::any('/update/{id}', [RoleController::class, "update"])->name('roles.update');
        Route::any('/delete/{id}', [RoleController::class, "destroy"])->name('roles.destroy');
    });
    /* End Roles Routes */
    /* Start Users Routes */
    Route::prefix('users')->group(function () {
        Route::get('/index', [UserController::class, "index"])->name('users.index');
        Route::get('/create', [UserController::class, "create"])->name('users.create');
        Route::get('/show/{id}', [UserController::class, "show"])->name('users.show');
        Route::post('/store', [UserController::class, "store"])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, "edit"])->name('users.edit');
        Route::any('/update/{id}', [UserController::class, "update"])->name('users.update');
        Route::any('/delete/{id}', [UserController::class, "destroy"])->name('users.destroy');
    });
    /* End Users Routes */
    /* Start Regions Routes */
    Route::prefix('regions')->group(function () {
        Route::get('/index', [RegionController::class, "index"])->name('regions.index');
        Route::get('/create', [RegionController::class, "create"])->name('regions.create');
        Route::get('/show/{id}', [RegionController::class, "show"])->name('regions.show');
        Route::post('/store', [RegionController::class, "store"])->name('regions.store');
        Route::get('/edit/{id}', [RegionController::class, "edit"])->name('regions.edit');
        Route::any('/update/{id}', [RegionController::class, "update"])->name('regions.update');
        Route::any('/delete/{id}', [RegionController::class, "destroy"])->name('regions.destroy');
    });
    /* End Regions Routes */
    /* Start Regions Routes */
    Route::prefix('segments')->group(function () {
        Route::get('/index', [SegmentController::class, "index"])->name('segments.index');
        Route::get('/create', [SegmentController::class, "create"])->name('segments.create');
        Route::get('/show/{id}', [SegmentController::class, "show"])->name('segments.show');
        Route::post('/store', [SegmentController::class, "store"])->name('segments.store');
        Route::get('/edit/{id}', [SegmentController::class, "edit"])->name('segments.edit');
        Route::any('/update/{id}', [SegmentController::class, "update"])->name('segments.update');
        Route::any('/delete/{id}', [SegmentController::class, "destroy"])->name('segments.destroy');
    });
    /* End Regions Routes */
    /* Start Locations Routes */
    Route::prefix('locations')->group(function () {
        Route::get('/index', [LocationController::class, "index"])->name('locations.index');
        Route::get('/create', [LocationController::class, "create"])->name('locations.create');
        Route::get('/show/{id}', [LocationController::class, "show"])->name('locations.show');
        Route::post('/store', [LocationController::class, "store"])->name('locations.store');
        Route::get('/edit/{id}', [LocationController::class, "edit"])->name('locations.edit');
        Route::any('/update/{id}', [LocationController::class, "update"])->name('locations.update');
        Route::any('/delete/{id}', [LocationController::class, "destroy"])->name('locations.destroy');
    });
    /* End Locations Routes */
    /* Start operational/state Routes */
    Route::prefix('operational/state')->group(function () {
        Route::get('/index', [OperationalStateController::class, "index"])->name('op.states.index');
        Route::get('/create', [OperationalStateController::class, "create"])->name('op.states.create');
        Route::get('/show/{id}', [OperationalStateController::class, "show"])->name('op.states.show');
        Route::post('/store', [OperationalStateController::class, "store"])->name('op.states.store');
        Route::get('/edit/{id}', [OperationalStateController::class, "edit"])->name('op.states.edit');
        Route::any('/update/{id}', [OperationalStateController::class, "update"])->name('op.states.update');
        Route::any('/delete/{id}', [OperationalStateController::class, "destroy"])->name('op.states.destroy');
    });
    /* End operational/state Routes */
    /* Start Areas Routes */
    Route::prefix('areas')->group(function () {
        Route::get('/index', [AreaController::class, "index"])->name('areas.index');
        Route::get('/create', [AreaController::class, "create"])->name('areas.create');
        Route::get('/show/{id}', [AreaController::class, "show"])->name('areas.show');
        Route::post('/store', [AreaController::class, "store"])->name('areas.store');
        Route::get('/edit/{id}', [AreaController::class, "edit"])->name('areas.edit');
        Route::any('/update/{id}', [AreaController::class, "update"])->name('areas.update');
        Route::any('/delete/{id}', [AreaController::class, "destroy"])->name('areas.destroy');
    });
    /* End Areas Routes */
    /* Start Dispatches Routes */
    Route::prefix('dispatches')->group(function () {
        Route::get('/index', [DispatchController::class, "index"])->name('dispatches.index');
        Route::get('/create', [DispatchController::class, "create"])->name('dispatches.create');
        Route::get('/show/{id}', [DispatchController::class, "show"])->name('dispatches.show');
        Route::post('/store', [DispatchController::class, "store"])->name('dispatches.store');
        Route::get('/edit/{id}', [DispatchController::class, "edit"])->name('dispatches.edit');
        Route::any('/update/{id}', [DispatchController::class, "update"])->name('dispatches.update');
        Route::any('/delete/{id}', [DispatchController::class, "destroy"])->name('dispatches.destroy');
    });
    /* End Dispatches Routes */
    /* Start Vlans Routes */
    Route::prefix('vlans')->group(function () {
        Route::get('/index', [VlanController::class, "index"])->name('vlans.index');
        Route::get('/create', [VlanController::class, "create"])->name('vlans.create');
        Route::get('/show/{id}', [VlanController::class, "show"])->name('vlans.show');
        Route::post('/store', [VlanController::class, "store"])->name('vlans.store');
        Route::get('/edit/{id}', [VlanController::class, "edit"])->name('vlans.edit');
        Route::any('/update/{id}', [VlanController::class, "update"])->name('vlans.update');
        Route::any('/delete/{id}', [VlanController::class, "destroy"])->name('vlans.destroy');
    });
    /* End vlans Routes */
    /* Start Vlans Routes */
    Route::prefix('record/devices')->group(function () {
        Route::get('/index', [RecordDeviceController::class, "index"])->name('record.devices.index');
        Route::get('/create', [RecordDeviceController::class, "create"])->name('record.devices.create');
        Route::get('/show/{id}', [RecordDeviceController::class, "show"])->name('record.devices.show');
        Route::post('/store', [RecordDeviceController::class, "store"])->name('record.devices.store');
        Route::get('/edit/{id}', [RecordDeviceController::class, "edit"])->name('record.devices.edit');
        Route::any('/update/{id}', [RecordDeviceController::class, "update"])->name('record.devices.update');
        Route::any('/delete/{id}', [RecordDeviceController::class, "destroy"])->name('record.devices.destroy');
    });
    /* End vlans Routes */
    /* Start maintenance category Routes */
    Route::prefix('maintenance/category')->group(function () {
        Route::get('/index', [MaintenanceCategoryController::class, "index"])->name('maintenance.category.index');
        Route::get('/create', [MaintenanceCategoryController::class, "create"])->name('maintenance.category.create');
        Route::get('/show/{id}', [MaintenanceCategoryController::class, "show"])->name('maintenance.category.show');
        Route::post('/store', [MaintenanceCategoryController::class, "store"])->name('maintenance.category.store');
        Route::get('/edit/{id}', [MaintenanceCategoryController::class, "edit"])->name('maintenance.category.edit');
        Route::any('/update/{id}', [MaintenanceCategoryController::class, "update"])->name('maintenance.category.update');
        Route::any('/delete/{id}', [MaintenanceCategoryController::class, "destroy"])->name('maintenance.category.destroy');
    });
    /* End maintenance category Routes */
    /* Start maintenance tools Routes */
    Route::prefix('maintenance/tools')->group(function () {
        Route::get('/index', [MaintenanceToolController::class, "index"])->name('maintenance.tools.index');
        Route::get('/create', [MaintenanceToolController::class, "create"])->name('maintenance.tools.create');
        Route::get('/show/{id}', [MaintenanceToolController::class, "show"])->name('maintenance.tools.show');
        Route::post('/store', [MaintenanceToolController::class, "store"])->name('maintenance.tools.store');
        Route::get('/edit/{id}', [MaintenanceToolController::class, "edit"])->name('maintenance.tools.edit');
        Route::any('/update/{id}', [MaintenanceToolController::class, "update"])->name('maintenance.tools.update');
        Route::any('/delete/{id}', [MaintenanceToolController::class, "destroy"])->name('maintenance.tools.destroy');
    });
    /* End maintenance tools Routes */
    /* Start cleaning tools Routes */
    Route::prefix('cleaning/tools')->group(function () {
        Route::get('/index', [CleaningToolController::class, "index"])->name('cleaning.tools.index');
        Route::get('/create', [CleaningToolController::class, "create"])->name('cleaning.tools.create');
        Route::get('/show/{id}', [CleaningToolController::class, "show"])->name('cleaning.tools.show');
        Route::post('/store', [CleaningToolController::class, "store"])->name('cleaning.tools.store');
        Route::get('/edit/{id}', [CleaningToolController::class, "edit"])->name('cleaning.tools.edit');
        Route::any('/update/{id}', [CleaningToolController::class, "update"])->name('cleaning.tools.update');
        Route::any('/delete/{id}', [CleaningToolController::class, "destroy"])->name('cleaning.tools.destroy');
    });
    /* End cleaning tools Routes */
    /* Start Cameras Routes */
    Route::prefix('cameras')->group(function () {
        Route::get('/index', [CameraController::class, "index"])->name('cameras.index');
        Route::get('/create', [CameraController::class, "create"])->name('cameras.create');
        Route::get('/show/{id}', [CameraController::class, "show"])->name('cameras.show');
        Route::post('/store', [CameraController::class, "store"])->name('cameras.store');
        Route::get('/edit/{id}', [CameraController::class, "edit"])->name('cameras.edit');
        Route::any('/update/{id}', [CameraController::class, "update"])->name('cameras.update');
        Route::any('/delete/{id}', [CameraController::class, "destroy"])->name('cameras.destroy');
        Route::any('/online', [CameraController::class, "online"])->name('cameras.online');
        Route::any('/offline', [CameraController::class, "offline"])->name('cameras.offline');
    });
    /* End Cameras Routes */
    /* Start Tickets Routes */
    Route::prefix('tickets')->group(function () {
        Route::get('/index', [TicketController::class, "index"])->name('tickets.index');
        Route::get('/create', [TicketController::class, "create"])->name('tickets.create');
        Route::get('/show/{id}', [TicketController::class, "show"])->name('tickets.show');
        Route::post('/store', [TicketController::class, "store"])->name('tickets.store');
        Route::get('/edit/{id}', [TicketController::class, "edit"])->name('tickets.edit');
        Route::any('/update/{id}', [TicketController::class, "update"])->name('tickets.update');
        Route::any('/delete/{id}', [TicketController::class, "destroy"])->name('tickets.destroy');
        Route::any('/close/{id}', [TicketController::class, "close"])->name('tickets.close');
        Route::any('/closed/tickets', [TicketController::class, "closed"])->name('tickets.closed.index');
        Route::post('/comment/{id}', [TicketController::class, "comment"])->name('tickets.comment');
        Route::post('/closed/search', [TicketController::class, "closedSearch"])->name('tickets.closed.results');
        Route::post('/tickets/search', [TicketController::class, "ticketsSearch"])->name('tickets.search.results');
    });
    /* End Tickets Routes */
});
