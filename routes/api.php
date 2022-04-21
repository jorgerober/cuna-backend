<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', 'Api\AuthController@login');
Route::get('/login/list/entities', 'Api\AuthController@entities');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', 'Api\AuthController@logout');
    Route::get('/user', 'Api\AuthController@getUser');

    //********************************************UBIGEO**************************************************
    Route::get('ubigeos', 'Api\UbigeosController@index')->name('api.ubigeos.index');
    Route::get('ubigeos/departamentos', 'Api\UbigeosController@getDepartamentos')->name('api.ubigeos.getDepartamentos');
    Route::get('ubigeos/provincias/{departamento}', 'Api\UbigeosController@getProvincias')->name('api.ubigeos.getProvincias');
    Route::get('ubigeos/distritos/{provincia}', 'Api\UbigeosController@getDistritos')->name('api.ubigeos.getDistritos');
    Route::get('ubigeos/unidadTerritoriales', 'Api\UbigeosController@getUnidadTerritoriales')->name('api.ubigeos.getUnidadTerritoriales');
    Route::get('ubigeos/tipoServicios', 'Api\UbigeosController@listarTipoServicios')->name('api.ubigeos.listarTipoServicios');
    Route::get('ubigeos/codigoUbigeo/{departamento},{provincia},{distrito}', 'Api\UbigeosController@traerCodigoUbigeo')->name('api.ubigeos.traerCodigoUbigeo');



    Route::get('list/entities', 'Api\EntityController@listEntities')->name('api.entity.listEntities');
    Route::get('entities/filter/{id}', 'Api\EntityController@filterEntities')->name('api.entity.filterEntities');
    Route::post('entities', 'Api\EntityController@store')->name('api.entity.store');
    Route::put('entities/{entity}', 'Api\EntityController@update')->name('api.entity.update');
    Route::delete('entities/{id}', 'Api\EntityController@destroy')->name('api.entity.destroy');

    //********************************************AREA**************************************************
    Route::get('SgUtOct/unidadTerritoriales', 'Api\SgUtOctController@getUnidadTerritoriales')->name('api.SgUtOct.getUnidadTerritoriales');



    //********************************************PERSONA**************************************************
    Route::get('persons', 'Api\PersonController@index')->name('api.person.index');
    Route::get('list/persons', 'Api\PersonController@listPersons')->name('api.person.listPersons');
    Route::get('persons/filter/{id}', 'Api\PersonController@filterPersons')->name('api.person.filterPersons');
    Route::post('persons', 'Api\PersonController@store')->name('api.person.store');
    Route::put('persons/{id}', 'Api\PersonController@update')->name('api.person.update');
    Route::delete('persons/{id}', 'Api\PersonController@destroy')->name('api.person.destroy');

    //********************************************ASIGNACIONES**************************************************
    Route::get('asignaciones/unidadTerritoriales', 'Api\AsignacionesController@getUnidadTerritoriales')->name('api.asignaciones.getUnidadTerritoriales');
    Route::get('asignaciones/roles', 'Api\AsignacionesController@getRoles')->name('api.asignaciones.getRoles');
    Route::get('asignaciones/cargos', 'Api\AsignacionesController@getCargos')->name('api.asignaciones.getCargos');
    Route::get('asignaciones/estados', 'Api\AsignacionesController@getEstados')->name('api.asignaciones.getEstados');
    Route::get('asignaciones/tipoServicios', 'Api\AsignacionesController@getRoles')->name('api.tipoServicios.getTipoServicios');
    Route::get('asignaciones', 'Api\AsignacionesController@index')->name('api.asignaciones.index');
    Route::post('asignaciones', 'Api\AsignacionesController@store')->name('api.asignaciones.store');
    Route::put('asignaciones/{id}', 'Api\AsignacionesController@update')->name('api.asignaciones.update');
    Route::delete('asignaciones/{id}', 'Api\AsignacionesController@destroy')->name('api.asignaciones.destroy');
    //********************************************FICHA SG_UT_OCT**************************************************
    Route::get('fichaSgUtOct/seccionesPreguntas', 'Api\SgUtOctController@getSeccionesPreguntas')->name('api.fichaSgUtOct.getSeccionesPreguntas');
    Route::get('fichaSgUtOct/unidadTerritoriales', 'Api\SgUtOctController@getUnidadTerritoriales')->name('api.fichaSgUtOct.getUnidadTerritoriales');
    Route::get('fichaSgUtOct/comiteGestiones/{id},{tipo}', 'Api\SgUtOctController@getComiteGestiones')->name('api.fichaSgUtOct.getComiteGestiones');
    Route::get('fichaSgUtOct/tipoServicios', 'Api\SgUtOctController@listarTipoServicios')->name('api.fichaSgUtOct.listarTipoServicios');
    Route::post('ficha/store', 'Api\SgUtOctController@store')->name('api.fichaSgUtOct.store');

    //********************************************FICHA SEGUIMIENTO SAF TEMPORAL**************************************************
    Route::get('fichaSeguimientoSaf/seccionesPreguntas', 'Api\SeguimientoSafController@getSeccionesPreguntas')->name('api.fichaSeguimientoSaf.getSeccionesPreguntas');
    Route::get('fichaSeguimientoSaf/unidadTerritoriales', 'Api\SeguimientoSafController@getUnidadTerritoriales')->name('api.fichaSeguimientoSaf.getUnidadTerritoriales');
    Route::get('fichaSeguimientoSaf/comiteGestiones/{id},{tipo}', 'Api\SeguimientoSafController@getComiteGestiones')->name('api.fichaSeguimientoSaf.getComiteGestiones');
    Route::get('fichaSeguimientoSaf/tipoServicios', 'Api\SeguimientoSafController@listarTipoServicios')->name('api.fichaSeguimientoSaf.listarTipoServicios');
    Route::post('fichaSeguimientoSaf/store', 'Api\SeguimientoSafController@store')->name('api.fichaSeguimientoSaf.store');
    Route::get('fichaSeguimientoSafs', 'Api\SeguimientoSafController@index')->name('api.fichaSeguimientoSaf.index');

    //********************************************FICHA SEGUIMIENTO SCD TEMPORAL**************************************************
    Route::get('fichaSeguimientoScd/seccionesPreguntas', 'Api\SeguimientoScdController@getSeccionesPreguntas')->name('api.fichaSeguimientoScd.getSeccionesPreguntas');
    Route::get('fichaSeguimientoScd/unidadTerritoriales', 'Api\SeguimientoScdController@getUnidadTerritoriales')->name('api.fichaSeguimientoScd.getUnidadTerritoriales');
    Route::get('fichaSeguimientoScd/comiteGestiones/{id},{tipo}', 'Api\SeguimientoScdController@getComiteGestiones')->name('api.fichaSeguimientoScd.getComiteGestiones');
    Route::get('fichaSeguimientoScd/tipoServicios', 'Api\SeguimientoScdController@listarTipoServicios')->name('api.fichaSeguimientoScd.listarTipoServicios');
    Route::post('fichaSeguimientoScd/store', 'Api\SeguimientoScdController@store')->name('api.fichaSeguimientoScd.store');

    //********************************************FICHA SG_SAF**************************************************
    Route::get('fichaSgSaf/seccionesPreguntas', 'Api\SgSafController@getSeccionesPreguntas')->name('api.fichaSgSaf.getSeccionesPreguntas');


    //********************************************UNIDADES TERRITORIALES**************************************************
    Route::get('unidadTerritoriales', 'Api\UnidadTerritorialesController@index')->name('api.unidadTerritoriales.index');
    Route::post('unidadTerritoriales', 'Api\UnidadTerritorialesController@store')->name('api.unidadTerritoriales.store');
    Route::put('unidadTerritoriales/{id}', 'Api\UnidadTerritorialesController@update')->name('api.unidadTerritoriales.update');
    Route::delete('unidadTerritoriales/{id}', 'Api\UnidadTerritorialesController@destroy')->name('api.unidadTerritoriales.destroy');

    Route::get('assignments', 'Api\AssignmentController@index')->name('api.assignment.index');
    Route::get('list/assignments', 'Api\AssignmentController@listAssignments')->name('api.assignment.listAssignments');
    Route::get('assignments/filter/person', 'Api\AssignmentController@filterPersons')->name('api.assignment.filterPerson');
    Route::get('assignments/filter/legal', 'Api\AssignmentController@filterPersonLegal')->name('api.assignment.filterPersonLegal');
    Route::get('assignments/areas/{id}', 'Api\AssignmentController@listAreas')->name('api.assignment.listAreas');
    Route::get('assignments/filter/{id}', 'Api\AssignmentController@filterAssignments')->name('api.assignment.filterAssignments');
    Route::post('assignments', 'Api\AssignmentController@store')->name('api.assignment.store');
    Route::put('assignments/{id}', 'Api\AssignmentController@update')->name('api.assignment.update');
    Route::delete('assignments/{id}', 'Api\AssignmentController@destroy')->name('api.assignment.destroy');

    //********************************************PRODUCTOS**************************************************
    Route::get('products', 'Api\ProductController@index')->name('api.product.index');
    Route::get('list/products', 'Api\ProductController@listProducts')->name('api.product.listProducts');
    Route::post('products', 'Api\ProductController@store')->name('api.product.store');
    Route::put('products/{id}', 'Api\ProductController@update')->name('api.product.update');
    Route::delete('products/{id}', 'Api\ProductController@destroy')->name('api.product.destroy');
    Route::post('products/laboratory', 'Api\ProductController@storeLaboratory')->name('api.product.storeLaboratory');
    Route::post('products/generic', 'Api\ProductController@storeGeneric')->name('api.product.storeGeneric');
    Route::post('products/category', 'Api\ProductController@storeCategory')->name('api.product.storeCategory');
    Route::post('products/presentation', 'Api\ProductController@storePresentation')->name('api.product.storePresentation');
    Route::post('products/location', 'Api\ProductController@storeLocation')->name('api.product.storeLocation');
    Route::get('products/list/laboratories', 'Api\ProductController@listLaboratories')->name('api.product.listLaboratories');
    Route::get('products/list/generics', 'Api\ProductController@listGenerics')->name('api.product.listGenerics');
    Route::get('products/list/categories', 'Api\ProductController@listCategories')->name('api.product.listCategories');
    Route::get('products/list/presentations', 'Api\ProductController@listPresentations')->name('api.product.listPresentations');
    Route::get('products/list/locations', 'Api\ProductController@listLocations')->name('api.product.listLocations');
    Route::get('products/name/{search}', 'Api\ProductController@getProducts')->name('api.product.getProducts');
    Route::get('products/kardex', 'Api\ProductController@getKardex')->name('api.product.getKardex');
    Route::post('products/kardex/fetch', 'Api\ProductController@fetchKardex')->name('api.product.fetchKardex');
    Route::get('products/kardex/filter', 'Api\ProductController@filterKardex')->name('api.product.filterKardex');
    Route::get('products/expired', 'Api\ProductController@getExpired')->name('api.product.getExpired');
    Route::get('products/toexpire', 'Api\ProductController@getToExpire')->name('api.product.getToExpire');



    //*********************************************VENTAS**************************************************************
    Route::get('ticket/products/{search}', 'Api\TicketInvoiceController@listProducts')->name('api.ticket.listProducts')->where('search', '.*');
    Route::get('ticket/barcode/{search}', 'Api\TicketInvoiceController@listProductBarcode')->name('api.ticket.listProductBarcode');
    Route::get('ticket/invoices', 'Api\TicketInvoiceController@listTypeTicketInvoices')->name('api.ticket.listTypeTicketInvoices');
    Route::get('ticket/buys', 'Api\TicketInvoiceController@listTypeBuys')->name('api.ticket.listTypeBuy');
    Route::get('ticket', 'Api\TicketInvoiceController@index')->name('api.ticket.index');
    Route::post('ticket', 'Api\TicketInvoiceController@store')->name('api.ticket.store');
    Route::put('ticket/{id}', 'Api\TicketInvoiceController@update')->name('api.ticket.update');
    Route::post('ticket/destroy', 'Api\TicketInvoiceController@destroy')->name('api.ticket.destroy');
    Route::get('ticket/box', 'Api\TicketInvoiceController@getBox')->name('api.ticket.getBox');
    Route::post('ticket/box', 'Api\TicketInvoiceController@boxStore')->name('api.ticket.boxStore');
    Route::get('ticket/sale/invoices', 'Api\TicketInvoiceController@getInvoices')->name('api.ticket.getInvoices');
    Route::get('ticket/sale/purchases', 'Api\TicketInvoiceController@getPurchases')->name('api.ticket.getPurchases');
    Route::post('ticket/box/close', 'Api\TicketInvoiceController@closeBox')->name('api.ticket.closeBox');
    Route::get('ticket/box/total/{id}', 'Api\TicketInvoiceController@boxTotal')->name('api.ticket.boxTotal');
    Route::delete('ticket/invoice/{id}', 'Api\TicketInvoiceController@destroyTicketInvoice')->name('api.ticket.destroyTicketInvoice');
    Route::post('ticket/invoice/print', 'Api\TicketInvoiceController@printTicketInvoice')->name('api.ticket.printTicketInvoice');
    Route::post('ticket/amount/voucher', 'Api\TicketInvoiceController@getAmountVoucher')->name('api.ticket.getAmountVoucher');
    Route::post('ticket/amount/payment', 'Api\TicketInvoiceController@getAmountPayment')->name('api.ticket.getAmountPayment');
    Route::get('ticket/box/state', 'Api\TicketInvoiceController@getUserState')->name('api.ticket.getUserState');
    Route::put('cash', 'Api\TicketInvoiceController@boxUpdate')->name('api.ticket.boxUpdate');
    Route::post('reverse', 'Api\TicketInvoiceController@reverse')->name('api.ticket.reverse');

    //************************************ REPORTES ***************************************************************************************
    Route::get('report/box/{id}', 'Api\ReportController@getReportBox')->name('api.box.getReportBox');
    Route::get('report/facturaCompra/{id}', 'Api\ReportController@getReportFacturaCompra')->name('api.facturaCompra.getReportFacturaCompra');
    Route::get('report/productStock/{id}', 'Api\ReportController@getReportProductStock')->name('api.productStock.getReportProductStock');
    Route::get('report/comprobanteVenta/{id}', 'Api\ReportController@getReportComprobanteVenta')->name('api.comprobanteVenta.getReportComprobanteVenta');
    Route::get('report/productStockValorizado/{id}', 'Api\ReportController@getReportProductStockValorizado')->name('api.productStockValorizado.getReportProductStockValorizado');
    Route::get('report/productStockInventary/{id}', 'Api\ReportController@getReportProductStockInventary')->name('api.productStockInventary.getReportProductStockInventary');
    Route::get('report/productExpiration/{id}', 'Api\ReportController@getReportProductExpiration')->name('api.productExpiration.getReportProductExpiration');
    Route::get('report/productDefeated/{id}', 'Api\ReportController@getReportProductDefeated')->name('api.productDefeated.getReportProductDefeated');
    Route::get('report/productStockMin/{id}', 'Api\ReportController@getReportProductStockMin')->name('api.productStockMin.getReportProductStockMin');
    Route::get('report/productTopSales/{id}', 'Api\ReportController@getReportProductTopSales')->name('api.productTopSales.getReportProductTopSales');
    Route::get('report/salesCashesPersons/{id}', 'Api\ReportController@getReportsalesCashesPersons')->name('api.salesCashesPersons.getReportSalesCashesPersons');
    Route::get('report/salesMonthPersonal/{id}', 'Api\ReportController@getReportSalesMonthPersonal')->name('api.salesMonthPersonal.getReportSalesMonthPersonal');
    Route::get('report/salesMonth/{id}', 'Api\ReportController@getReportSalesMonth')->name('api.salesMonth.getReportSalesMonth');

    //************************************* MERMAS ****************************************************************************************
    Route::get('wastage/products/{search}', 'Api\WastageController@listProducts')->name('api.wastage.listProducts');
    Route::get('wastage/reason', 'Api\WastageController@listReason')->name('api.wastage.listReason');
    Route::get('wastage', 'Api\WastageController@index')->name('api.wastage.index');
    Route::post('wastage', 'Api\WastageController@store')->name('api.wastage.store');
    Route::post('wastage/reverse', 'Api\WastageController@reverse')->name('api.wastage.reverse');
    Route::get('wastage/search/date', 'Api\WastageController@searchDate')->name('api.wastage.searchDate');
    Route::get('wastage/search/reason', 'Api\WastageController@searchReason')->name('api.wastage.searchReason');
});

