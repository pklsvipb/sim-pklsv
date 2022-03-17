<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
    return 1232222;
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'login'])->name('login');

Route::get('/n&l/down', function () {
    Artisan::call('down');
    return 'Application is now in maintenance mode.';
});

Route::get('/n&l/up', function () {
    Artisan::call('up');
    return 'Application is now live.';
});

Auth::routes();




// Route Akademik
Route::middleware('role:akademik')->get('/akademik/dashboard', [App\Http\Controllers\AkademikController::class, 'dashboard_a'])->name('dashboard-a');
Route::middleware('role:akademik')->get('/akademik/reset-password', [App\Http\Controllers\AkademikController::class, 'reset_a'])->name('reset-a');
Route::middleware('role:akademik')->post('/akademik/reset-password/submit', [App\Http\Controllers\AkademikController::class, 'resetPwd'])->name('reset-pwd');

Route::middleware('role:akademik')->post('/akademik/bap-kolokium/filter', [App\Http\Controllers\AkademikController::class, 'prodi_filter_kl'])->name('prodi-filter-kl');
Route::middleware('role:akademik')->post('/akademik/bap-seminar/filter', [App\Http\Controllers\AkademikController::class, 'prodi_filter_sm'])->name('prodi-filter-sm');
Route::middleware('role:akademik')->post('/akademik/bap-sidang/filter', [App\Http\Controllers\AkademikController::class, 'prodi_filter_sd'])->name('prodi-filter-sd');

Route::middleware('role:akademik')->get('/akademik/download-bap/kolokium', [App\Http\Controllers\AkademikController::class, 'download_bap_kolokium'])->name('download-bap-kolokium');
Route::middleware('role:akademik')->get('/akademik/download-kld/kolokium/{id}', [App\Http\Controllers\AkademikController::class, 'download_bap_kolokium_d'])->name('download-bap-kolokium-d');
Route::middleware('role:akademik')->get('/akademik/download-klm/kolokium/{id}', [App\Http\Controllers\AkademikController::class, 'download_bap_kolokium_m'])->name('download-bap-kolokium-m');

Route::middleware('role:akademik')->get('/akademik/download-bap/seminar', [App\Http\Controllers\AkademikController::class, 'download_bap_seminar'])->name('download-bap-seminar');
Route::middleware('role:akademik')->get('/akademik/download-smd/seminar/{id}', [App\Http\Controllers\AkademikController::class, 'download_bap_seminar_d'])->name('download-bap-seminar-d');
Route::middleware('role:akademik')->get('/akademik/download-smm/seminar/{id}', [App\Http\Controllers\AkademikController::class, 'download_bap_seminar_m'])->name('download-bap-seminar-m');

Route::middleware('role:akademik')->get('/akademik/download-bap/sidang', [App\Http\Controllers\AkademikController::class, 'download_bap_sidang'])->name('download-bap-sidang');
Route::middleware('role:akademik')->get('/akademik/download-sdd/sidang/{id}', [App\Http\Controllers\AkademikController::class, 'download_bap_sidang_d'])->name('download-bap-sidang-d');
Route::middleware('role:akademik')->get('/akademik/download-sdj/sidang/{id}', [App\Http\Controllers\AkademikController::class, 'download_bap_sidang_j'])->name('download-bap-sidang-j');

Route::middleware('role:akademik')->get('/akademik/download-bap/sidang2', [App\Http\Controllers\AkademikController::class, 'download_bap_sidang2'])->name('download-bap-sidang2');
Route::middleware('role:akademik')->get('/akademik/download-sddu/sidang/{id}', [App\Http\Controllers\AkademikController::class, 'download_bap_sidang_du'])->name('download-bap-sidang-du');
Route::middleware('role:akademik')->get('/akademik/download-sdju/sidang/{id}', [App\Http\Controllers\AkademikController::class, 'download_bap_sidang_ju'])->name('download-bap-sidang-ju');

Route::middleware('role:akademik')->get('download-zip-a', [App\Http\Controllers\AkademikController::class, 'download_zip_a'])->name('download-zip-a');





// Route Panitia
Route::middleware('role:panitia')->get('/panitia/dashboard', [App\Http\Controllers\PanitiaController::class, 'dashboard_p'])->name('dashboard-p');
Route::middleware('role:panitia')->get('/panitia/reset-password', [App\Http\Controllers\PanitiaController::class, 'reset_p'])->name('reset-p');
Route::middleware('role:panitia')->post('/panitia/reset-password/submit', [App\Http\Controllers\PanitiaController::class, 'resetPwd'])->name('reset-pwd');

Route::middleware('role:panitia')->get('/panitia/rekap-export', [App\Http\Controllers\PanitiaController::class, 'export_kolokium'])->name('export-kolokium');

Route::middleware('role:panitia')->get('/panitia/set/kelompok-mahasiswa', [App\Http\Controllers\PanitiaController::class, 'set_kelompok'])->name('set-kelompok');
Route::middleware('role:panitia')->post('/panitia/set/kelompok-mahasiswa/submit', [App\Http\Controllers\PanitiaController::class, 'set_kelompok_s'])->name('set-kelompok-s');

Route::middleware('role:panitia')->get('/panitia/set-pembimbing', [App\Http\Controllers\PanitiaController::class, 'pembimbing_p'])->name('pembimbing-p');
Route::middleware('role:panitia')->post('/panitia/set-pembimbing/submit/{kelompok}', [App\Http\Controllers\PanitiaController::class, 'pembimbing_ps'])->name('pembimbing-ps');

Route::middleware('role:panitia')->get('/panitia/edit/kelompok-mahasiswa/{id}', [App\Http\Controllers\PanitiaController::class, 'edit_kelompok'])->name('edit-kelompok');
Route::middleware('role:panitia')->post('/panitia/edit/kelompok-mahasiswa/submit', [App\Http\Controllers\PanitiaController::class, 'edit_kelompok_s'])->name('edit-kelompok-s');
Route::middleware('role:panitia')->get('/panitia/kelompok-mhs/delete/{id}', [App\Http\Controllers\PanitiaController::class, 'delete_kelompok'])->name('delete-kelompok');

Route::middleware('role:panitia')->get('/panitia/kolokium/list-mahasiswa-form', [App\Http\Controllers\PanitiaController::class, 'list_kl_form'])->name('list-kl-form');
Route::middleware('role:panitia')->get('/panitia/kolokium/verif-form/{id}', [App\Http\Controllers\PanitiaController::class, 'kolokium_vf'])->name('kolokium-vf');
Route::middleware('role:panitia')->post('/panitia/kolokium/verif-form/submit/{id}', [App\Http\Controllers\PanitiaController::class, 'kolokium_vf_s'])->name('kolokium-vfs');

// Route::middleware('role:panitia')->get('/panitia/kolokium/list-mahasiswa-daftar', [App\Http\Controllers\PanitiaController::class, 'list_kl_daftar'])->name('list-kl-daftar');
Route::middleware('role:panitia')->get('/panitia/kolokium/verif-daftar/{id}', [App\Http\Controllers\PanitiaController::class, 'kolokium_vd'])->name('kolokium-vd');
Route::middleware('role:panitia')->post('/panitia/kolokium/verif-daftar/submit/{id}', [App\Http\Controllers\PanitiaController::class, 'kolokium_vd_s'])->name('kolokium-vds');

Route::middleware('role:panitia')->get('/panitia/supervisi/list-mahasiswa-daftar', [App\Http\Controllers\PanitiaController::class, 'list_sv_daftar'])->name('list-sv-daftar');
Route::middleware('role:panitia')->get('/panitia/supervisi/verif-daftar/{id}', [App\Http\Controllers\PanitiaController::class, 'supervisi_vd'])->name('supervisi-vd');
Route::middleware('role:panitia')->post('/panitia/supervisi/verif-daftar/submit/{id}', [App\Http\Controllers\PanitiaController::class, 'supervisi_vd_s'])->name('supervisi-vds');

Route::middleware('role:panitia')->get('/panitia/seminar/list-mahasiswa-form', [App\Http\Controllers\PanitiaController::class, 'list_sm_form'])->name('list-sm-form');
Route::middleware('role:panitia')->get('/panitia/seminar/verif-form/{id}', [App\Http\Controllers\PanitiaController::class, 'seminar_vf'])->name('seminar-vf');
Route::middleware('role:panitia')->post('/panitia/seminar/verif-form/submit/{id}', [App\Http\Controllers\PanitiaController::class, 'seminar_vf_s'])->name('seminar-vfs');

// Route::middleware('role:panitia')->get('/panitia/seminar/list-mahasiswa-daftar', [App\Http\Controllers\PanitiaController::class, 'list_sm_daftar'])->name('list-sm-daftar');
Route::middleware('role:panitia')->get('/panitia/serminar/verif-daftar/{id}', [App\Http\Controllers\PanitiaController::class, 'seminar_vd'])->name('seminar-vd');
Route::middleware('role:panitia')->post('/panitia/seminar/verif-daftar/submit/{id}', [App\Http\Controllers\PanitiaController::class, 'seminar_vd_s'])->name('seminar-vds');




Route::middleware('role:panitia')->get('/panitia/sidang/list-mahasiswa-form', [App\Http\Controllers\PanitiaController::class, 'list_sd_form'])->name('list-sd-form');
Route::middleware('role:panitia')->get('/panitia/sidang/verif-form/{id}', [App\Http\Controllers\PanitiaController::class, 'sidang_vf'])->name('sidang-vf');
Route::middleware('role:panitia')->post('/panitia/sidang/verif-form/submit/{id}', [App\Http\Controllers\PanitiaController::class, 'sidang_vf_s'])->name('sidang-vfs');

// Route::middleware('role:panitia')->get('/panitia/sidang/list-mahasiswa-daftar', [App\Http\Controllers\PanitiaController::class, 'list_sd_daftar'])->name('list-sd-daftar');
Route::middleware('role:panitia')->get('/panitia/sidang/verif-daftar/{id}', [App\Http\Controllers\PanitiaController::class, 'sidang_vd'])->name('sidang-vd');
Route::middleware('role:panitia')->post('/panitia/sidang/verif-daftar/submit/{id}', [App\Http\Controllers\PanitiaController::class, 'sidang_vd_s'])->name('sidang-vds');

Route::middleware('role:panitia')->post('/panitia/sidang/sidang-ulang/{id}', [App\Http\Controllers\PanitiaController::class, 'sidang_ulang'])->name('sidang-ulang');

Route::middleware('role:panitia')->post('/panitia/bap/filter', [App\Http\Controllers\PanitiaController::class, 'bap_filter'])->name('bap-filter');

Route::middleware('role:panitia')->get('/panitia/download-bap', [App\Http\Controllers\PanitiaController::class, 'download_bap'])->name('download-bap');
Route::middleware('role:panitia')->get('/panitia/download-bap-sm', [App\Http\Controllers\PanitiaController::class, 'download_bap_sm'])->name('download-bap-sm');
Route::middleware('role:panitia')->get('/panitia/download-bap-sd', [App\Http\Controllers\PanitiaController::class, 'download_bap_sd'])->name('download-bap-sd');
Route::middleware('role:panitia')->get('/panitia/download-bap-sd2', [App\Http\Controllers\PanitiaController::class, 'download_bap_sd2'])->name('download-bap-sd2');

// DOWNLOAD BAP PDF
Route::middleware('role:panitia')->get('/panitia/download-kld/{id}', [App\Http\Controllers\ExportController::class, 'download_bap_kld'])->name('download-bap-kld');
Route::middleware('role:panitia')->get('/panitia/download-klm/{id}', [App\Http\Controllers\ExportController::class, 'download_bap_klm'])->name('download-bap-klm');
Route::middleware('role:panitia')->get('/panitia/download-smd/{id}', [App\Http\Controllers\ExportController::class, 'download_bap_smd'])->name('download-bap-smd');
Route::middleware('role:panitia')->get('/panitia/download-smm/{id}', [App\Http\Controllers\ExportController::class, 'download_bap_smm'])->name('download-bap-smm');
Route::middleware('role:panitia')->get('/panitia/download-sdd/{id}', [App\Http\Controllers\ExportController::class, 'download_bap_sdd'])->name('download-bap-sdd');
Route::middleware('role:panitia')->get('/panitia/download-sdj/{id}', [App\Http\Controllers\ExportController::class, 'download_bap_sdj'])->name('download-bap-sdj');
Route::middleware('role:panitia')->get('/panitia/download-sddu/{id}', [App\Http\Controllers\ExportController::class, 'download_bap_sddu'])->name('download-bap-sddu');
Route::middleware('role:panitia')->get('/panitia/download-sdmu/{id}', [App\Http\Controllers\ExportController::class, 'download_bap_sdju'])->name('download-bap-sdju');

Route::middleware('role:panitia')->get('download-zip', [App\Http\Controllers\ExportController::class, 'download_zip'])->name('download-zip');
Route::middleware('role:panitia')->get('download-zip-supervisi', [App\Http\Controllers\ExportController::class, 'download_zip_supervisi'])->name('download-zip-supervisi');

//Pengumuman
Route::middleware('role:panitia')->post('/panitia/pengumuman', [App\Http\Controllers\PanitiaController::class, 'pengumuman'])->name('pengumuman');
Route::middleware('role:panitia')->post('/panitia/pengumuman/delete', [App\Http\Controllers\PanitiaController::class, 'pengumuman_delete'])->name('pengumuman-delete');

Route::middleware('role:panitia')->get('/panitia/jurnal_harian', [App\Http\Controllers\PanitiaController::class, 'jurnal_harian'])->name('jurnal-harian');
Route::middleware('role:panitia')->get('/panitia/kartu-bimbingan', [App\Http\Controllers\PanitiaController::class, 'kartu_bimbingan'])->name('kartu-bimbingan');
Route::middleware('role:panitia')->get('/panitia/laporan_periodik', [App\Http\Controllers\PanitiaController::class, 'laporan_periodik'])->name('laporan-periodik');
Route::middleware('role:panitia')->post('/panitia/set-kaprodi/submit', [App\Http\Controllers\PanitiaController::class, 'set_kaprodi'])->name('set-kaprodi');

Route::middleware('role:panitia')->get('/panitia/link_form', [App\Http\Controllers\PanitiaController::class, 'link_form'])->name('link-form');
Route::middleware('role:panitia')->post('/panitia/link_form/save', [App\Http\Controllers\PanitiaController::class, 'link_form_save'])->name('link-form-save');

Route::middleware('role:panitia')->get('/panitia/setting/mahasiswa', [App\Http\Controllers\PanitiaController::class, 'set_mahasiswa'])->name('set-mahasiswa');
Route::middleware('role:panitia')->get('/panitia/setting/mahasiswa/reset/{id}', [App\Http\Controllers\PanitiaController::class, 'mahasiswa_reset'])->name('mahasiswa-reset');



// Route Dosen
Route::middleware('role:dosen')->get('/dosen/dashboard', [App\Http\Controllers\DosenController::class, 'dashboard_d'])->name('dashboard-d');
Route::middleware('role:dosen')->get('/dosen/reset-password', [App\Http\Controllers\DosenController::class, 'reset_d'])->name('reset-d');
Route::middleware('role:dosen')->post('/dosen/reset-password/submit', [App\Http\Controllers\DosenController::class, 'resetPwd'])->name('reset-pwd');

Route::middleware('role:dosen')->get('/dosen/biodata', [App\Http\Controllers\DosenController::class, 'biodata_d'])->name('biodata-d');
Route::middleware('role:dosen')->post('/dosen/biodata-submit', [App\Http\Controllers\DosenController::class, 'biodata_ds'])->name('biodata-ds');

Route::middleware('role:dosen')->get('/dosen/form/kesediaan', [App\Http\Controllers\DosenController::class, 'form_kesediaan'])->name('form-kesediaan');
Route::middleware('role:dosen')->post('/mahasiswa/form003', [App\Http\Controllers\ExportController::class, 'form003_pdf'])->name('form003-pdf');

Route::middleware('role:dosen')->get('/dosen/form/tanda-tangan', [App\Http\Controllers\DosenController::class, 'form_ttd'])->name('form-ttd');
Route::middleware('role:dosen')->post('/dosen/form/tanda-tangan/submit/{id}', [App\Http\Controllers\DosenController::class, 'form_ttd_submit'])->name('form-ttd-submit');

Route::middleware('role:dosen')->get('/dosen/kolokium/dosen-pembimbing', [App\Http\Controllers\DosenController::class, 'kolokium_d'])->name('kolokium-d');
Route::middleware('role:dosen')->get('/dosen/kolokium/moderator', [App\Http\Controllers\DosenController::class, 'kolokium_m'])->name('kolokium-m');
Route::middleware('role:dosen')->get('/dosen/seminar/dosen-pembimbing', [App\Http\Controllers\DosenController::class, 'seminar_d'])->name('seminar-d');
Route::middleware('role:dosen')->get('/dosen/seminar/moderator', [App\Http\Controllers\DosenController::class, 'seminar_m'])->name('seminar-m');
Route::middleware('role:dosen')->get('/dosen/sidang/dosen-pembimbing', [App\Http\Controllers\DosenController::class, 'sidang_d'])->name('sidang-d');
Route::middleware('role:dosen')->get('/dosen/sidang/dosen-penguji', [App\Http\Controllers\DosenController::class, 'sidang_j'])->name('sidang-j');

Route::middleware('role:dosen')->get('/dosen/input/kl-bap-d/{id}', [App\Http\Controllers\DosenController::class, 'kl_bap_d'])->name('kl-bap-d');
Route::middleware('role:dosen')->get('/dosen/input/kl-bap-m/{id}', [App\Http\Controllers\DosenController::class, 'kl_bap_m'])->name('kl-bap-m');
Route::middleware('role:dosen')->get('/dosen/input/sm-bap-d/{id}', [App\Http\Controllers\DosenController::class, 'sm_bap_d'])->name('sm-bap-d');
Route::middleware('role:dosen')->get('/dosen/input/sm-bap-m/{id}', [App\Http\Controllers\DosenController::class, 'sm_bap_m'])->name('sm-bap-m');
Route::middleware('role:dosen')->get('/dosen/input/sd-bap-d/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_d'])->name('sd-bap-d');
Route::middleware('role:dosen')->get('/dosen/input/sd-bap-j/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_j'])->name('sd-bap-j');
Route::middleware('role:dosen')->get('/dosen/input/sd-bap-du/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_du'])->name('sd-bap-du');
Route::middleware('role:dosen')->get('/dosen/input/sd-bap-ju/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_ju'])->name('sd-bap-ju');

Route::middleware('role:dosen')->post('/dosen/submit/kolokium-bap-dospem/{id}', [App\Http\Controllers\DosenController::class, 'kl_bap_sd'])->name('kl-bap-sd');
Route::middleware('role:dosen')->post('/dosen/submit/kolokium-bap-moderator/{id}', [App\Http\Controllers\DosenController::class, 'kl_bap_sm'])->name('kl-bap-sm');
Route::middleware('role:dosen')->post('/dosen/submit/seminar-bap-dospem/{id}', [App\Http\Controllers\DosenController::class, 'sm_bap_sd'])->name('sm-bap-sd');
Route::middleware('role:dosen')->post('/dosen/submit/seminar-bap-moderator/{id}', [App\Http\Controllers\DosenController::class, 'sm_bap_sm'])->name('sm-bap-sm');
Route::middleware('role:dosen')->post('/dosen/submit/sidang-bap-dospem/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_sd'])->name('sd-bap-sd');
Route::middleware('role:dosen')->post('/dosen/submit/sidang-bap-penguji/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_sj'])->name('sd-bap-sj');

Route::middleware('role:dosen')->get('/dosen/supervisi/list-form-004', [App\Http\Controllers\DosenController::class, 'list_form_004'])->name('list-form-004');
Route::middleware('role:dosen')->get('/dosen/supervisi/form004/{id}', [App\Http\Controllers\DosenController::class, 'input_form_004'])->name('input-form-004');
Route::middleware('role:dosen')->post('/dosen/submit/supervisi/form004/{id}', [App\Http\Controllers\DosenController::class, 'submit_form_004'])->name('submit-form-004');
Route::middleware('role:dosen')->get('/dosen/supervisi/form004/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'form_004_pdf'])->name('form-004-pdf');

Route::middleware('role:dosen')->get('/dosen/supervisi/list-form-015', [App\Http\Controllers\DosenController::class, 'list_form_015'])->name('list-form-015');
Route::middleware('role:dosen')->get('/dosen/supervisi/form015/{id}', [App\Http\Controllers\DosenController::class, 'input_form_015'])->name('input-form-015');
Route::middleware('role:dosen')->post('/dosen/submit/supervisi/form015/{id}', [App\Http\Controllers\DosenController::class, 'submit_form_015'])->name('submit-form-015');
Route::middleware('role:dosen')->get('/dosen/supervisi/form015/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'form_015_pdf'])->name('form-015-pdf');

//VIEW BAP PDF
Route::middleware('role:dosen')->get('/dosen/dospem/bap-kl/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'kl_bap_vd'])->name('kl-bap-vd');
Route::middleware('role:dosen')->get('/dosen/moderator/bap-kl/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'kl_bap_vm'])->name('kl-bap-vm');
Route::middleware('role:dosen')->get('/dosen/dospem/bap-sm/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'sm_bap_vd'])->name('sm-bap-vd');
Route::middleware('role:dosen')->get('/dosen/moderator/bap-sm/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'sm_bap_vm'])->name('sm-bap-vm');

Route::middleware('role:dosen')->get('/dosen/sm-forum/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'sm_forum'])->name('sm-forum');
Route::middleware('role:dosen')->get('/dosen/sm-pembahas/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'sm_pembahas'])->name('sm-pembahas');

Route::middleware('role:dosen')->get('/dosen/dospem/bap-sd/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'sd_bap_vd'])->name('sd-bap-vd');
Route::middleware('role:dosen')->get('/dosen/penguji/bap-sd/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'sd_bap_vj'])->name('sd-bap-vj');

Route::middleware('role:dosen')->get('/dosen/dospem/bap-sd-ulang/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'sd_bap_vdu'])->name('sd-bap-vdu');
Route::middleware('role:dosen')->get('/dosen/penguji/bap-sd-ulang/view-pdf/{id}', [App\Http\Controllers\ExportController::class, 'sd_bap_vju'])->name('sd-bap-vju');

// EDIT DAN UPDATE BAP
Route::middleware('role:dosen')->get('/dosen/dospem/bap-kl/edit/{id}', [App\Http\Controllers\DosenController::class, 'kl_bap_ed'])->name('kl-bap-ed');
Route::middleware('role:dosen')->get('/dosen/moderator/bap-kl/edit/{id}', [App\Http\Controllers\DosenController::class, 'kl_bap_em'])->name('kl-bap-em');
Route::middleware('role:dosen')->get('/dosen/dospem/bap-sm/edit/{id}', [App\Http\Controllers\DosenController::class, 'sm_bap_ed'])->name('sm-bap-ed');
Route::middleware('role:dosen')->get('/dosen/moderator/bap-sm/edit/{id}', [App\Http\Controllers\DosenController::class, 'sm_bap_em'])->name('sm-bap-em');
Route::middleware('role:dosen')->get('/dosen/dospem/bap-sd/edit/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_ed'])->name('sd-bap-ed');
Route::middleware('role:dosen')->get('/dosen/penguji/bap-sd/edit/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_ej'])->name('sd-bap-ej');
Route::middleware('role:dosen')->get('/dosen/dospem/bap-sd-ulang/edit/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_edu'])->name('sd-bap-edu');
Route::middleware('role:dosen')->get('/dosen/penguji/bap-sd-ulang/edit/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_eju'])->name('sd-bap-eju');

Route::middleware('role:dosen')->post('/dosen/update/kolokium-bap-dospem/{id}', [App\Http\Controllers\DosenController::class, 'kl_bap_ud'])->name('kl-bap-ud');
Route::middleware('role:dosen')->post('/dosen/update/kolokium-bap-moderator/{id}', [App\Http\Controllers\DosenController::class, 'kl_bap_um'])->name('kl-bap-um');
Route::middleware('role:dosen')->post('/dosen/update/seminar-bap-dospem/{id}', [App\Http\Controllers\DosenController::class, 'sm_bap_ud'])->name('sm-bap-ud');
Route::middleware('role:dosen')->post('/dosen/update/seminar-bap-moderator/{id}', [App\Http\Controllers\DosenController::class, 'sm_bap_um'])->name('sm-bap-um');
Route::middleware('role:dosen')->post('/dosen/update/sidang-bap-dospem/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_ud'])->name('sd-bap-ud');
Route::middleware('role:dosen')->post('/dosen/update/sidang-bap-penguji/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_uj'])->name('sd-bap-uj');
Route::middleware('role:dosen')->post('/dosen/update/sidang2-bap-dospem/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_udu'])->name('sd-bap-udu');
Route::middleware('role:dosen')->post('/dosen/update/sidang2-bap-penguji/{id}', [App\Http\Controllers\DosenController::class, 'sd_bap_uju'])->name('sd-bap-uju');

Route::middleware('role:dosen')->get('/dosen/jurnal_harian', [App\Http\Controllers\DosenController::class, 'jurnal_harian'])->name('d-jurnal-harian');
Route::middleware('role:dosen')->get('/dosen/kartu-bimbingan', [App\Http\Controllers\DosenController::class, 'kartu_bimbingan'])->name('d-kartu-bimbingan');
Route::middleware('role:dosen')->get('/dosen/laporan_periodik', [App\Http\Controllers\DosenController::class, 'laporan_periodik'])->name('d-laporan-periodik');
Route::middleware('role:dosen')->get('/dosen/paraf-bimbingan/{id}', [App\Http\Controllers\DosenController::class, 'paraf_bimbingan'])->name('d-paraf-bimbingan');
Route::middleware('role:dosen')->get('/dosen/ttd-kaprodi', [App\Http\Controllers\DosenController::class, 'ttd_kaprodi'])->name('d-ttd-kaprodi');
Route::middleware('role:dosen')->get('/dosen/ttd-kaprodi/submit/{id}', [App\Http\Controllers\DosenController::class, 'ttd_kaprodi_submit'])->name('d-ttd-kaprodi-submit');






// Route Mahasiswa
Route::middleware('role:mahasiswa')->get('/mahasiswa/dashboard', [App\Http\Controllers\MahasiswaController::class, 'dashboard_m'])->name('dashboard-m');
Route::middleware('role:mahasiswa')->get('/mahasiswa/reset-password', [App\Http\Controllers\MahasiswaController::class, 'reset_m'])->name('reset-m');
Route::middleware('role:mahasiswa')->post('/mahasiswa/reset-password/submit', [App\Http\Controllers\MahasiswaController::class, 'resetPwd'])->name('reset-pwd');

Route::middleware('role:mahasiswa')->get('/mahasiswa/biodata', [App\Http\Controllers\MahasiswaController::class, 'biodata_m'])->name('biodata-m');
Route::middleware('role:mahasiswa')->post('/mahasiswa/biodata-submit', [App\Http\Controllers\MahasiswaController::class, 'biodata_ms'])->name('biodata-ms');
Route::middleware('role:mahasiswa')->get('/mahasiswa/download-biodata', [App\Http\Controllers\MahasiswaController::class, 'biodata_download'])->name('download-biodata');

Route::middleware('role:mahasiswa')->get('/mahasiswa/form', [App\Http\Controllers\MahasiswaController::class, 'form_m'])->name('form-m');

Route::middleware('role:mahasiswa')->get('/mahasiswa/form-daily/jurnal-harian', [App\Http\Controllers\MahasiswaController::class, 'jurnal'])->name('jurnal');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form-daily/jurnal-harian/submit', [App\Http\Controllers\MahasiswaController::class, 'jurnal_submit'])->name('jurnal-submit');

Route::middleware('role:mahasiswa')->get('/mahasiswa/form-daily/laporan-periodik', [App\Http\Controllers\MahasiswaController::class, 'periodik'])->name('periodik');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form-daily/laporan-periodik/submit', [App\Http\Controllers\MahasiswaController::class, 'periodik_submit'])->name('periodik-submit');

Route::middleware('role:mahasiswa')->get('/mahasiswa/form-daily/kartu-bimbingan-ta', [App\Http\Controllers\MahasiswaController::class, 'k_bimbingan'])->name('k-bimbingan');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form-daily/bimbingan-akademik/submit', [App\Http\Controllers\MahasiswaController::class, 'bimbingan_submit'])->name('bimbingan-submit');

Route::middleware('role:mahasiswa')->get('/mahasiswa/form-daily/kartu-seminar', [App\Http\Controllers\MahasiswaController::class, 'k_seminar'])->name('k-seminar');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form-daily/kartu-seminar/submit', [App\Http\Controllers\MahasiswaController::class, 'k_seminar_submit'])->name('k-seminar-submit');

Route::middleware('role:mahasiswa')->post('/mahasiswa/upload/form/{id}', [App\Http\Controllers\MahasiswaController::class, 'upload'])->name('upload');

Route::middleware('role:mahasiswa')->get('/mahasiswa/daftar-kolokium', [App\Http\Controllers\MahasiswaController::class, 'd_kolokium'])->name('d-kolokium');
Route::middleware('role:mahasiswa')->post('/mahasiswa/daftar-kolokium-submit', [App\Http\Controllers\MahasiswaController::class, 's_kolokium'])->name('s-kolokium');
Route::middleware('role:mahasiswa')->post('/mahasiswa/perbaikan-daftar-kolokium-submit', [App\Http\Controllers\MahasiswaController::class, 'perbaikan_kolokium'])->name('perbaikan-kolokium');

Route::middleware('role:mahasiswa')->get('/mahasiswa/daftar-supervisi', [App\Http\Controllers\MahasiswaController::class, 'd_supervisi'])->name('d-supervisi');
Route::middleware('role:mahasiswa')->post('/mahasiswa/daftar-supervisi-submit', [App\Http\Controllers\MahasiswaController::class, 's_supervisi'])->name('s-supervisi');

Route::middleware('role:mahasiswa')->get('/mahasiswa/daftar-seminar', [App\Http\Controllers\MahasiswaController::class, 'd_seminar'])->name('d-seminar');
Route::middleware('role:mahasiswa')->post('/mahasiswa/daftar-seminar-submit', [App\Http\Controllers\MahasiswaController::class, 's_seminar'])->name('s-seminar');

Route::middleware('role:mahasiswa')->get('/mahasiswa/jadwal-seminar', [App\Http\Controllers\MahasiswaController::class, 'jadwal_seminar'])->name('jadwal-seminar');
Route::middleware('role:mahasiswa')->post('/mahasiswa/jadwal-seminar/hadir/{id}', [App\Http\Controllers\MahasiswaController::class, 'hadir_seminar'])->name('hadir-seminar');

Route::middleware('role:mahasiswa')->get('/mahasiswa/kartu-seminar', [App\Http\Controllers\MahasiswaController::class, 'kartu_sm'])->name('kartu-sm');
Route::middleware('role:mahasiswa')->get('/mahasiswa/download-kartu-seminar', [App\Http\Controllers\MahasiswaController::class, 'download_kartu_sm'])->name('download-kartu-sm');

Route::middleware('role:mahasiswa')->get('/mahasiswa/daftar-sidang', [App\Http\Controllers\MahasiswaController::class, 'd_sidang'])->name('d-sidang');
Route::middleware('role:mahasiswa')->post('/mahasiswa/daftar-sidang-submit', [App\Http\Controllers\MahasiswaController::class, 's_sidang'])->name('s-sidang');

// Route::middleware('role:mahasiswa')->get('/mahasiswa/kolokium', [App\Http\Controllers\MahasiswaController::class, 'kolokium'])->name('kolokium');
// Route::middleware('role:mahasiswa')->get('/mahasiswa/seminar', [App\Http\Controllers\MahasiswaController::class, 'seminar'])->name('seminar');
// Route::middleware('role:mahasiswa')->get('/mahasiswa/sidang', [App\Http\Controllers\MahasiswaController::class, 'sidang'])->name('sidang');

Route::middleware('role:mahasiswa')->get('/mahasiswa/menu-input/{id}', [App\Http\Controllers\MahasiswaController::class, 'menu_input'])->name('menu-input');

Route::middleware('role:mahasiswa')->post('/mahasiswa/form001/{id}', [App\Http\Controllers\ExportController::class, 'form001_pdf'])->name('form001-pdf');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form002/{id}', [App\Http\Controllers\ExportController::class, 'form002_pdf'])->name('form002-pdf');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form012/save/{id}', [App\Http\Controllers\ExportController::class, 'form012_pdf_save'])->name('form012-pdf-save');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form012/{id}', [App\Http\Controllers\ExportController::class, 'form012_pdf'])->name('form012-pdf');
Route::middleware('role:mahasiswa')->get('/mahasiswa/form012/delete', [App\Http\Controllers\ExportController::class, 'form012_pdf_delete'])->name('form012-pdf-delete');

Route::middleware('role:mahasiswa')->post('/mahasiswa/form029/pembimbing/{id}', [App\Http\Controllers\ExportController::class, 'form029_pembimbing_pdf'])->name('form029-pembimbing-pdf');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form029/moderator/{id}', [App\Http\Controllers\ExportController::class, 'form029_moderator_pdf'])->name('form029-moderator-pdf');

Route::middleware('role:mahasiswa')->get('/mahasiswa/download/jurnal-harian', [App\Http\Controllers\ExportController::class, 'download_jurnal'])->name('download-jurnal');
Route::middleware('role:mahasiswa')->post('/mahasiswa/upload/jurnal-harian', [App\Http\Controllers\MahasiswaController::class, 'upload_jurnal'])->name('upload-jurnal');
Route::middleware('role:mahasiswa')->post('/mahasiswa/edit/jurnal-harian', [App\Http\Controllers\MahasiswaController::class, 'edit_jurnal'])->name('edit-jurnal');

Route::middleware('role:mahasiswa')->post('/mahasiswa/edit/kartu-bimbingan', [App\Http\Controllers\MahasiswaController::class, 'edit_bimbingan'])->name('edit-bimbingan');
Route::middleware('role:mahasiswa')->get('/mahasiswa/form014/download', [App\Http\Controllers\ExportController::class, 'form014_pdf_download'])->name('form014-pdf-download');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form014/{id}', [App\Http\Controllers\ExportController::class, 'form014_pdf'])->name('form014-pdf');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form008/{id}', [App\Http\Controllers\ExportController::class, 'form008_pdf'])->name('form008-pdf');

Route::middleware('role:mahasiswa')->post('/mahasiswa/form011/save/{id}', [App\Http\Controllers\ExportController::class, 'form011_pdf_save'])->name('form011-pdf-save');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form011/delete', [App\Http\Controllers\ExportController::class, 'form011_pdf_delete'])->name('form011-pdf-delete');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form011/{id}', [App\Http\Controllers\ExportController::class, 'form011_pdf'])->name('form011-pdf');

Route::middleware('role:mahasiswa')->post('/mahasiswa/form013/save/{id}', [App\Http\Controllers\ExportController::class, 'form013_pdf_save'])->name('form013-pdf-save');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form013/delete', [App\Http\Controllers\ExportController::class, 'form013_pdf_delete'])->name('form013-pdf-delete');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form013/{id}', [App\Http\Controllers\ExportController::class, 'form013_pdf'])->name('form013-pdf');

Route::middleware('role:mahasiswa')->post('/mahasiswa/form018/delete/{id}', [App\Http\Controllers\ExportController::class, 'form018_pdf_delete'])->name('form018-pdf-delete');
Route::middleware('role:mahasiswa')->post('/mahasiswa/form018/{id}', [App\Http\Controllers\ExportController::class, 'form018_pdf'])->name('form018-pdf');

Route::middleware('role:mahasiswa')->post('/mahasiswa/penggunaan_produk/save/{id}', [App\Http\Controllers\ExportController::class, 'penggunaan_produk_pdf_save'])->name('penggunaan-produk-pdf-save');
Route::middleware('role:mahasiswa')->post('/mahasiswa/penggunaan_produk/delete', [App\Http\Controllers\ExportController::class, 'penggunaan_produk_pdf_delete'])->name('penggunaan-produk-pdf-delete');
Route::middleware('role:mahasiswa')->post('/mahasiswa/penggunaan_produk/{id}', [App\Http\Controllers\ExportController::class, 'penggunaan_produk_pdf'])->name('penggunaan-produk-pdf');
