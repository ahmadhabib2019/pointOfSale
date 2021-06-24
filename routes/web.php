<?php

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'AgamaController@index');
Route::get('/penjualans/create', 'PenjualanController@create');
Route::get('/getPD', 'PDFController@getPDF');
Route::get('/penjualans/print{id}', 'PenjualanController@print')->name('penjualans.print');

//search

Route::get('pembelians/caribeli', 'PembelianController@search')->name('caribeli');
Route::get('returs/caribeli', 'ReturController@search')->name('cariretur');

Route::get('cari', 'PenjualanController@search')->name('cari');
Route::get('getPdf', 'PenjualanController@pdf')->name('getPdf');

Route::get('/getPDef', 'PDFController@getPDF');
Route::get('labaRugi', 'LaporanController@prosesLabaRugi');

Route::get('export', 'BarangController@export')->name('export');
Route::get('importExportView', 'BarangController@importExportView');
Route::post('/barangs.index', 'BarangController@getUpload')->name('baranss');

Route::resource('agamas', 'AgamaController');//dasboard

Route::resource('penjualans', 'PenjualanController');

Route::resource('pelanggans', 'PelangganController');

Route::get('/detail_penjualans','DetailPenjualanController@index');

Route::get('barang/{id}','BarangController@search');
Route::group(['middleware'=>['check-permission:admin|superadmin']],function(){

Route::get('barang', 'BarangController@index');
Route::get('/search', 'BarangController@earch');
Route::get('/searchKategori', 'KategoriController@earch');
Route::get('/searchPegawai', 'PegawaiController@earch');
Route::get('/searchSupplier', 'SupplierController@earch');
Route::get('/searchPelanggan', 'PelangganController@earch');
Route::get('/searchUser', 'UserController@earch');

Route::resource('kategoris', 'KategoriController');
Route::resource('pembelians', 'PembelianController');
Route::resource('suppliers', 'SupplierController');
	
});
Route::resource('barangs', 'BarangController');

Route::group(['middleware' => ['check-permission:superadmin']], function() {
	Route::resource('users', 	  'UserController');
	Route::resource('pegawais',   'PegawaiController');	
	Route::resource('laporans', 'LaporanController');
});

Route::get('/lapor','LaporanController@laporan');
Route::get( '/get/barang/', 'PenjualanController@barangajax' )->name('get-barang');
Route::post( '/get/beli/', 'PembelianController@barangajax' )->name('get-beli');


Route::resource('returs', 'returController');

Route::resource('hargas', 'HargaController');