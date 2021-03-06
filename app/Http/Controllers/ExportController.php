<?php

namespace App\Http\Controllers;

use App\Models\tb_bimbingan;
use App\Models\tb_daftar;
use App\Models\tb_dosen;
use App\Models\tb_form;
use App\Models\tb_form_004;
use App\Models\tb_form_015;
use App\Models\tb_form_025;
use App\Models\tb_jurnal;
use App\Models\tb_kartu_seminar;
use App\Models\tb_mahasiswa;
use App\Models\tb_masterform;
use App\Models\tb_panitia;
use App\Models\tb_nilai_bap;
use App\Models\tb_supervisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use ZipArchive;
use App\Models\tb_nilai_forum;
use App\Models\tb_nilai_pembahas;
use App\Models\tb_periodik;

class ExportController extends Controller
{

    public function __construct()
    {
        set_time_limit(10000000);
    }

    // BAP -- USER DOSEN
    public function kl_bap_vd($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_kolokium_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('BAP Kolokium Dospem.pdf', compact('bap', 'data', 'dosen', 'mhs'));
    }

    public function kl_bap_vm($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_kolokium_m', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('BAP Kolokium Moderator.pdf', compact('bap', 'data', 'dosen', 'mhs'));
    }

    public function sm_bap_vd($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_seminar_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('BAP Seminar Dospem.pdf', compact('bap', 'data', 'dosen', 'mhs'));
    }

    public function sm_bap_vm($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_seminar_m', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('BAP Seminar Moderator.pdf', compact('bap', 'data', 'dosen', 'mhs'));
    }

    public function sm_forum($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $sm    = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $datas = tb_nilai_forum::where('id_seminar', $sm->id)->get();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sm_forum', compact('bap', 'sm', 'datas', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('Form Penilaian Forum Seminar.pdf', compact('bap', 'sm', 'datas', 'dosen', 'mhs'));
    }

    public function sm_pembahas($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $sm    = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $data  = tb_nilai_pembahas::where('id_seminar', $sm->id)->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sm_pembahas', compact('bap', 'sm', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('Form Penilaian Pembahas Seminar.pdf', compact('bap', 'sm', 'data', 'dosen', 'mhs'));
    }


    public function sd_bap_vd($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('BAP Sidang Dospem.pdf', compact('bap', 'data', 'dosen', 'mhs'));
    }

    public function sd_bap_vj($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_j', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('BAP Sidang Penguji.pdf', compact('bap', 'data', 'dosen', 'mhs'));
    }

    public function sd_bap_vdu($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('BAP Sidang Dospem.pdf', compact('bap', 'data', 'dosen', 'mhs'));
    }

    public function sd_bap_vju($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_j', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('BAP Sidang Penguji.pdf', compact('bap', 'data', 'dosen', 'mhs'));
    }




    // BAP -- USER PANITIA

    public function download_bap_kld($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_kolokium_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Kolokium Dospem ' . $mhs->nim . '.pdf');
    }

    public function download_bap_klm($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_kolokium_m', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Kolokium Moderator ' . $mhs->nim . '.pdf');
    }

    public function download_bap_smd($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_seminar_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Seminar Dospem ' . $mhs->nim . '.pdf');
    }

    public function download_bap_smm($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_seminar_m', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Seminar Moderator ' . $mhs->nim . '.pdf');
    }

    public function download_sm_forum($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $sm    = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $datas = tb_nilai_forum::where('id_seminar', $sm->id)->get();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sm_forum', compact('bap', 'sm', 'datas', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('Form Penilaian Forum Seminar ' . $mhs->nim . '.pdf');
    }

    public function download_sm_pembahas($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $sm    = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $data  = tb_nilai_pembahas::where('id_seminar', $sm->id)->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sm_pembahas', compact('bap', 'sm', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('Form Penilaian Pembahas Seminar ' . $mhs->nim . '.pdf');
    }

    public function download_bap_sdd($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Sidang Dospem ' . $mhs->nim . '.pdf');
    }

    public function download_bap_sdj($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_j', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Sidang Penguji ' . $mhs->nim . '.pdf');
    }

    public function download_bap_sddu($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Sidang Dospem ' . $mhs->nim . '.pdf');
    }

    public function download_bap_sdju($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_j', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Sidang Penguji ' . $mhs->nim . '.pdf');
    }

    public function download_zip(Request $request)
    {
        $form   = tb_form::where('id_mhs', $request->input('id'))->where('ket', 'kl')->where('set_verif', 1)->get();

        $dir = 'file_form/zip_form';
        $zipFileName = 'Zipfile_Form_' . $request->input('nama') . '.zip';

        $zip = new ZipArchive;
        if ($zip->open($dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            // Add File in ZipArchive 
            foreach ($form as $get) {
                if ($get->id_form == 1) {
                    $zip->addFile($get->file, $request->input('nama') . '_' . $request->input('nim') . '_form001' . '.pdf');
                } elseif ($get->id_form == 4) {
                    $zip->addFile($get->file, $request->input('nama') . '_' . $request->input('nim') . '_form012' . '.pdf');
                }
            }
            $zip->close();
        }
        // Set Header 
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath = $dir . '/' . $zipFileName;
        // Create Download Response 
        if (file_exists($filetopath)) {
            return response()->download($filetopath, $zipFileName, $headers);
        }

        return Redirect::back();
    }

    public function download_zip_supervisi(Request $request)
    {

        $dir = 'file_form/zip_form';
        $zipFileName = 'Zipfile_Supervisi_' . $request->input('nama') . '.zip';

        $zip = new ZipArchive;
        if ($zip->open($dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            // Add File in ZipArchive 
            $supervisi   = tb_form_004::where('kelompok', $request->input('kelompok'))->first();
            $daftar = tb_supervisi::where('kelompok', $request->input('kelompok'))->first();
            $value6 = explode(',', $supervisi->penilaian_6);
            $value7 = explode(',', $supervisi->penilaian_7);
            $pdf   = PDF::loadview('dosen.Form-004.pdf_supervisi_form_004', compact('supervisi', 'daftar', 'value6', 'value7'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');
            Storage::disk('local')->put('file_form/form004_' . $request->input('nama') . '.pdf', $pdf->output());
            $zip->addFile('file_form/form004_' . $request->input('nama') . '.pdf', $request->input('nama') . '_' . $request->input('nim') . '_form004' . '.pdf');

            $supervisi   = tb_form_015::where('kelompok', $request->input('kelompok'))->first();
            $daftar = tb_supervisi::where('kelompok', $request->input('kelompok'))->first();
            $value6 = explode(',', $supervisi->penilaian_6);
            $value7 = explode(',', $supervisi->penilaian_7);
            $value8 = explode(',', $supervisi->penilaian_8);
            $value9 = explode(',', $supervisi->penilaian_9);
            $value10 = explode(',', $supervisi->penilaian_10);
            $pdf   = PDF::loadview('dosen.Form-015.pdf_supervisi_form_015', compact('supervisi', 'daftar', 'value6', 'value7', 'value8', 'value9', 'value10'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');
            Storage::disk('local')->put('file_form/form015_' . $request->input('nama') . '.pdf', $pdf->output());
            $zip->addFile('file_form/form015_' . $request->input('nama') . '.pdf', $request->input('nama') . '_' . $request->input('nim') . '_form015' . '.pdf');
            $zip->close();
        }
        Storage::disk('local')->delete('file_form/form004_' . $request->input('nama') . '.pdf');
        Storage::disk('local')->delete('file_form/form015_' . $request->input('nama') . '.pdf');
        // Set Header 
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath = $dir . '/' . $zipFileName;
        // Create Download Response 
        if (file_exists($filetopath)) {
            return response()->download($filetopath, $zipFileName, $headers);
        }

        return Redirect::back();
    }

    public function form001_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();
        $dosens = tb_dosen::all();

        $instansi   = $request->input('instansi');
        $alamat   = $request->input('alamat');
        $pimpinan  = $request->input('pimpinan');
        $contact = $request->input('contact');
        $tgl = $request->input('tgl');
        $kajian = $request->input('kajian');
        $telp = $request->input('telp');
        $pdf   = PDF::loadview('form_pdf.pdf_form_001', compact('datas', 'instansi', 'alamat', 'pimpinan', 'contact', 'tgl', 'kajian', 'telp'))->setPaper('A4', 'portrait');


        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'kl')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'kl';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_001.pdf');
            $lampiran         = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/lampiran.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_001.pdf');
            }

            // Delete File
            if ($lampiran) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/lampiran.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_001.pdf';
            $form->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_001.pdf', $pdf->output());
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'lampiran.pdf');

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_001.pdf');
            $lampiran         = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/lampiran.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_001.pdf');
            }

            // Delete File
            if ($lampiran) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/lampiran.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_001.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_001.pdf', $pdf->output());
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'lampiran.pdf');

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function form002_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'kl')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'kl';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_002.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_002.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_002.pdf';
            $form->file   = $namadir;

            //save to directory
            // Storage::disk('local')->put('pdf/'.$mhs->nim.'/pdf_form_002.pdf', $request->input('file'));
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_002.pdf');

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_002.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_002.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_002.pdf';
            $update->file   = $namadir;

            //save to directory
            // Storage::disk('local')->put('pdf/'.$mhs->nim.'/pdf_form_002.pdf', $request->input('file'));
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_002.pdf');

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function form003_pdf(Request $request)
    {
        $user   = Auth::user();
        $getDosen = tb_dosen::where('id', $user->id_user)->first();
        $mahasiswa = tb_mahasiswa::where('id_dospem1', $getDosen->id)->get();

        $peminatan1 = $request->input('peminatan1');
        $peminatan2 = $request->input('peminatan2');
        $usulan = $request->input('usulan');
        $tanggal = $request->input('tanggal');
        $prodi = $request->input('prodi');
        $pdf   = PDF::loadview('form_pdf.pdf_form_003', compact('getDosen', 'peminatan1', 'peminatan2', 'usulan', 'tanggal', 'prodi'))->setPaper('A4', 'portrait');


        foreach ($mahasiswa as $mhs) {
            $cek = tb_form::where('id_form', 3)->where('id_mhs', $mhs->id)->where('ket', 'kl')->first();

            if ($cek == null) {
                $form             = new tb_form;
                $form->id_mhs     = $mhs->id;
                $form->id_form    = 3;
                $form->ket        = 'kl';

                // Check File Exist
                $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_003.pdf');

                // Delete File
                if ($file) {
                    Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_003.pdf');
                }

                $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_003.pdf';
                $form->file   = $namadir;

                //save to directory
                Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_003.pdf', $pdf->output());

                //save to directory dosen
                Storage::disk('local')->put('file_form/kesediaan_dosen/' . $getDosen->id . '/pdf_form_003.pdf', $pdf->output());

                $form->save();
            } else {
                $update = tb_form::findOrFail($cek->id);
                $update->set_failed = 0;

                // Check File Exist
                $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_003.pdf');

                // Delete File
                if ($file) {
                    Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_003.pdf');
                }

                $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_003.pdf';
                $update->file   = $namadir;

                //save to directory
                Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_003.pdf', $pdf->output());

                //save to directory dosen
                Storage::disk('local')->put('file_form/kesediaan_dosen/' . $getDosen->id . '/pdf_form_003.pdf', $pdf->output());

                $update->save();
            }
        }

        return redirect()->route('form-kesediaan')->with('success', 'Berhasil Upload');
    }

    public function form012_pdf_save(Request $request, $id)
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();
        $cek    = 1;

        $instansi   = $request->input('instansi');
        $alamat     = $request->input('alamat');
        $pemlap     = $request->input('pemlap');
        $judul      = $request->input('judul');
        $tgl        = $request->input('tgl');
        $pdf        = PDF::loadview('form_pdf.pdf_form_012', compact('datas', 'instansi', 'alamat', 'pemlap', 'judul', 'tgl'))->setPaper('A4', 'portrait');

        //save to directory
        Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_012.pdf', $pdf->output());

        return redirect()->back();
    }

    public function form012_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'kl')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'kl';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_012.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_012.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_012.pdf';
            $form->file   = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_012.pdf');

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_012.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_012.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_012.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_012.pdf');

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function form012_pdf_delete()
    {
        $user = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        // Check File Exist
        $file = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_012.pdf');

        // Delete File
        if ($file) {
            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_012.pdf');
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Hapus Form 012');
    }

    public function form029_pembimbing_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $lokasi   = $request->input('lokasi');
        $waktu  = $request->input('waktu');
        $judul = $request->input('judul');
        $tanggal = $request->input('tanggal');
        $pdf   = PDF::loadview('form_pdf.pdf_form_029_pembimbing', compact('datas', 'lokasi', 'waktu', 'judul', 'tanggal'))->setPaper('A4', 'portrait');

        // return $pdf->stream('Form 029 Pembimbing.pdf', compact('datas', 'lokasi', 'waktu', 'judul', 'tanggal', 'tgl'));

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'kl')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'kl';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_029_pembimbing.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_029_pembimbing.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_029_pembimbing.pdf';
            $form->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_029_pembimbing.pdf', $pdf->output());

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_029_pembimbing.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_029_pembimbing.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_029_pembimbing.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_029_pembimbing.pdf', $pdf->output());

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function form029_moderator_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $lokasi   = $request->input('lokasi');
        $waktu  = $request->input('waktu');
        $judul = $request->input('judul');
        $tanggal = $request->input('tanggal');
        $pdf   = PDF::loadview('form_pdf.pdf_form_029_moderator', compact('datas', 'lokasi', 'waktu', 'judul', 'tanggal'))->setPaper('A4', 'portrait');

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'kl')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'kl';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_029_moderator.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_029_moderator.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_029_moderator.pdf';
            $form->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_029_moderator.pdf', $pdf->output());

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_029_moderator.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_029_moderator.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_029_moderator.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_029_moderator.pdf', $pdf->output());

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function form_004_pdf($id)
    {

        $supervisi   = tb_form_004::where('id_supervisi', $id)->first();
        $daftar = tb_supervisi::where('id', $id)->first();
        $value6 = explode(',', $supervisi->penilaian_6);
        $value7 = explode(',', $supervisi->penilaian_7);
        $pdf   = PDF::loadview('dosen.Form-004.pdf_supervisi_form_004', compact('supervisi', 'daftar', 'value6', 'value7'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');

        return $pdf->stream('Supervisi Form 004 ' . $supervisi->kelompok . '.pdf');
    }

    public function form_015_pdf($id)
    {

        $supervisi   = tb_form_015::where('id_supervisi', $id)->first();
        $daftar = tb_supervisi::where('id', $id)->first();
        $value6 = explode(',', $supervisi->penilaian_6);
        $value7 = explode(',', $supervisi->penilaian_7);
        $value8 = explode(',', $supervisi->penilaian_8);
        $value9 = explode(',', $supervisi->penilaian_9);
        $value10 = explode(',', $supervisi->penilaian_10);
        $pdf   = PDF::loadview('dosen.Form-015.pdf_supervisi_form_015', compact('supervisi', 'daftar', 'value6', 'value7', 'value8', 'value9', 'value10'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');

        return $pdf->stream('Supervisi Form 004 ' . $supervisi->kelompok . '.pdf');
    }

    public function form014_pdf_download()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();
        $data  = tb_mahasiswa::where('id', $user->id_user)->first();
        $pdf   = PDF::loadview('form_pdf.pdf_form_014', compact('data', 'datas'))->setPaper('A4', 'portrait');

        // return $pdf->download('Form014 ' . $data->nim . '.pdf');
        return $pdf->stream('Form014 ' . $data->nim . '.pdf', compact('data'));
    }

    public function form014_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sm')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'sm';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_014.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_014.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_014.pdf';
            $form->file     = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_014.pdf');

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_014.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_014.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_014.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_014.pdf');

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function form008_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sm')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'sm';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_008.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_008.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_008.pdf';
            $form->file     = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_008.pdf');

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_008.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_008.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_008.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_008.pdf');

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function form011_pdf_save(Request $request, $id)
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();
        $cek    = 1;

        $instansi   = $mhs->instansi;
        $alamat     = $mhs->alamat_instansi;
        $pemlap     = $request->input('pemlap');
        $tanggal    = $request->input('tanggal');
        $judul      = $request->input('judul');
        $pdf        = PDF::loadview('form_pdf.pdf_form_011', compact('datas', 'instansi', 'alamat', 'pemlap', 'judul', 'tanggal'))->setPaper('A4', 'portrait');

        //save to directory
        Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_011.pdf', $pdf->output());

        return redirect()->back();
    }

    public function form011_pdf_delete()
    {
        $user = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        // Check File Exist
        $file = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_011.pdf');

        // Delete File
        if ($file) {
            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_011.pdf');
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Hapus Form 011');
    }

    public function form011_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sm')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'sm';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_011.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_011.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_011.pdf';
            $form->file     = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_011.pdf');

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_011.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_011.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_011.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_011.pdf');

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function form013_pdf_save(Request $request, $id)
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();
        $cek    = 1;

        $instansi   = $mhs->instansi;
        $alamat     = $mhs->alamat_instansi;
        $pemlap     = $request->input('pemlap');
        $pdf        = PDF::loadview('form_pdf.pdf_form_013', compact('datas', 'instansi', 'alamat', 'pemlap'))->setPaper('A4', 'portrait');

        //save to directory
        Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_013.pdf', $pdf->output());

        return redirect()->back();
    }

    public function form013_pdf_delete()
    {
        $user = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        // Check File Exist
        $file = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_013.pdf');

        // Delete File
        if ($file) {
            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_013.pdf');
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Hapus Form 013');
    }

    public function form013_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sm')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'sm';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_013.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_013.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_013.pdf';
            $form->file     = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_013.pdf');

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_013.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_013.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_013.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_form_013.pdf');

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function form018_pdf_delete($id)
    {
        $user = Auth::user();
        $mhs  = tb_mahasiswa::where('id', $user->id_user)->first();

        // Check File Exist
        $file = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_018.pdf');
        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sm')->first();

        // Delete File
        if ($file) {
            $update = tb_form::findOrFail($cek->id);
            $update->delete();

            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_018.pdf');
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Hapus Form 018');
    }

    public function form018_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();

        $judul   = $request->input('judul');
        $tanggal = $request->input('tanggal');
        $pdf   = PDF::loadview('form_pdf.pdf_form_018', compact('datas', 'judul', 'tanggal'))->setPaper('A4', 'portrait');

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sm')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'sm';
            $form->set_verif  = 2;
            $form->ttd_dospem = 1;
            $form->judul      = $request->input('judul');
            $form->tanggal    = $request->input('tanggal');

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_018.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_018.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_018.pdf';
            $form->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_018.pdf', $pdf->output());

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_verif  = 2;
            $update->ttd_dospem = 1;
            $update->judul      = $request->input('judul');
            $update->tanggal    = $request->input('tanggal');

            // Check File Exist
            $file            = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_018.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_018.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_018.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_018.pdf', $pdf->output());

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload dan Request Tanda Tangan Kepada Dosen Pembimbing');
    }

    public function penggunaan_produk_pdf_save(Request $request, $id)
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();
        $cek    = 1;

        $instansi   = $mhs->instansi;
        $alamat     = $mhs->alamat_instansi;
        $pemlap     = $request->input('pemlap');
        $judul      = $request->input('judul');
        $pdf        = PDF::loadview('form_pdf.pdf_penggunaan_produk', compact('datas', 'instansi', 'alamat', 'pemlap', 'judul'))->setPaper('A4', 'portrait');

        //save to directory
        Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_penggunaan_produk.pdf', $pdf->output());

        return redirect()->back();
    }

    public function penggunaan_produk_pdf_delete()
    {
        $user = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        // Check File Exist
        $file = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_penggunaan_produk.pdf');

        // Delete File
        if ($file) {
            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_penggunaan_produk.pdf');
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Hapus Form Penggunaan Produk');
    }

    public function penggunaan_produk_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sm')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'sm';

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_penggunaan_produk.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_penggunaan_produk.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_penggunaan_produk.pdf';
            $form->file     = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_penggunaan_produk.pdf');

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_penggunaan_produk.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_penggunaan_produk.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_penggunaan_produk.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->putFileAs('pdf/' . $mhs->nim, $request->upload, 'pdf_penggunaan_produk.pdf');

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }

    public function download_jurnal()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->first();
        $lists = tb_jurnal::where('id_mhs', $user->id_user)->get();
        $totalPages = 0;
        //load pdf
        $pdf_num   = PDF::loadview('mahasiswa.pdf_jurnal_harian', compact('totalPages', 'datas', 'lists'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');
        //path save file pdf
        $path = 'file_form/file.pdf';
        //save pdf
        Storage::disk('local')->put('file_form/file.pdf', $pdf_num->output());

        //variabel for get total page
        $pdftext = file_get_contents($path);
        $totalPages  = preg_match_all("/\/Page\W/", $pdftext, $dummy);

        //delete file pdf from public
        Storage::disk('local')->delete('file_form/file.pdf');

        //load pdf again with passing var total page
        $pdf   = PDF::loadview('mahasiswa.pdf_jurnal_harian', compact('totalPages', 'datas', 'lists'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');

        return $pdf->stream('Jurnal Harian_'.$datas->nama.'_'.$datas->nim.'.pdf');
    }

    public function download_kartu_sm()
    {
        $user = Auth::user();
        $mahasiswa = tb_mahasiswa::where('id', $user->id_user)->first();
        $kartu = tb_kartu_seminar::where('id_mhs', $user->id_user)->where('paraf', 1)->get();

        $totalPages = 0;
        //load pdf
        $pdf_num   = PDF::loadview('mahasiswa.pdf_kartu_seminar', compact('totalPages', 'kartu', 'mahasiswa'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');
        //path save file pdf
        $path = 'file_form/file3.pdf';
        //save pdf
        Storage::disk('local')->put('file_form/file3.pdf', $pdf_num->output());

        //variabel for get total page
        $pdftext = file_get_contents($path);
        $totalPages  = preg_match_all("/\/Page\W/", $pdftext, $dummy);

        //delete file pdf from public
        Storage::disk('local')->delete('file_form/file3.pdf');

        //load pdf again with passing var total page
        $pdf   = PDF::loadview('mahasiswa.pdf_kartu_seminar', compact('totalPages', 'kartu', 'mahasiswa'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');

        return $pdf->stream('Kartu Seminar_'.$mahasiswa->nama.'_'.$mahasiswa->nim.'.pdf');
    }

    public function download_kartu_sm_p($id)
    {
        $mahasiswa = tb_mahasiswa::where('id', $id)->first();
        $kartu = tb_kartu_seminar::where('id_mhs', $id)->where('paraf', 1)->get();

        $totalPages = 0;
        //load pdf
        $pdf_num   = PDF::loadview('mahasiswa.pdf_kartu_seminar', compact('totalPages', 'kartu', 'mahasiswa'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');
        //path save file pdf
        $path = 'file_form/file7.pdf';
        //save pdf
        Storage::disk('local')->put('file_form/file7.pdf', $pdf_num->output());

        //variabel for get total page
        $pdftext = file_get_contents($path);
        $totalPages  = preg_match_all("/\/Page\W/", $pdftext, $dummy);

        //delete file pdf from public
        Storage::disk('local')->delete('file_form/file7.pdf');

        //load pdf again with passing var total page
        $pdf   = PDF::loadview('mahasiswa.pdf_kartu_seminar', compact('totalPages', 'kartu', 'mahasiswa'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');

        return $pdf->stream('Kartu Seminar_' . $mahasiswa->nama . '_' . $mahasiswa->nim . '.pdf');
    }

    public function sortDate($a, $b)
    {
        if (strtotime($a[3]) == strtotime($b[3])) return 0;
        return (strtotime($a[3]) > strtotime($b[3])) ? 1 : -1;
    }

    public function download_periodik()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->first();
        $gets = tb_periodik::select('id_mhs', 'tgl_awal', 'tgl_selesai')->distinct()->get();
        $periodik = [];
        $periode = [];

        if ($gets != '') {
            foreach ($gets as $get) {
                if ($get->id_mhs == $datas->id) {
                    $lists = tb_periodik::where('id_mhs', $get->id_mhs)->where('tgl_awal', $get->tgl_awal)->where('tgl_selesai', $get->tgl_selesai)->get();
                    foreach ($lists as $list) {
                        $periodik[] = array($list->id, $list->id_mhs, $list->id_prodi, $list->tanggal, $list->informasi, $list->kendala, $list->catatan, $list->tgl_awal, $list->tgl_selesai);
                    }
                    usort($periodik, array($this, 'sortDate'));
                    $periode[] = array($get->id, $get->tgl_awal, $get->tgl_selesai);
                }
            }
        }

        $totalPages = 0;
        //load pdf
        $pdf_num   = PDF::loadview('mahasiswa.pdf_laporan_periodik', compact('totalPages', 'datas', 'periode', 'periodik'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');
        //path save file pdf
        $path = 'file_form/file5.pdf';
        //save pdf
        Storage::disk('local')->put('file_form/file5.pdf', $pdf_num->output());

        //variabel for get total page
        $pdftext = file_get_contents($path);
        $totalPages  = preg_match_all("/\/Page\W/", $pdftext, $dummy);

        //delete file pdf from public
        Storage::disk('local')->delete('file_form/file5.pdf');

        //load pdf again with passing var total page
        $pdf   = PDF::loadview('mahasiswa.pdf_laporan_periodik', compact('totalPages', 'datas', 'periode', 'periodik'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');

        return $pdf->stream('Laporan Periodik_'.$datas->nama.'_'.$datas->nim.'.pdf');
    }

    public function form022_pdf_delete($id)
    {
        $user = Auth::user();
        $mhs  = tb_mahasiswa::where('id', $user->id_user)->first();

        // Check File Exist
        $file = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_022.pdf');
        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sd')->first();

        // Delete File
        if ($file) {
            $update = tb_form::findOrFail($cek->id);
            $update->delete();

            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_022.pdf');
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Hapus Form 022');
    }

    public function form022_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();

        $judul   = $request->input('judul');
        $tanggal = $request->input('tanggal');
        $waktu = $request->input('waktu');
        $pdf   = PDF::loadview('form_pdf.pdf_form_022', compact('datas', 'judul', 'tanggal', 'waktu'))->setPaper('A4', 'portrait');

        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sd')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'sd';
            $form->set_verif  = 2;
            $form->ttd_dospem = 1;
            $form->judul      = $request->input('judul');
            $form->tanggal    = $request->input('tanggal');
            $form->waktu      = $request->input('waktu');

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_022.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_022.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_022.pdf';
            $form->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_022.pdf', $pdf->output());

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_verif  = 2;
            $update->ttd_dospem = 1;
            $update->judul      = $request->input('judul');
            $update->tanggal    = $request->input('tanggal');
            $update->waktu      = $request->input('waktu');

            // Check File Exist
            $file            = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_022.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_022.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_022.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_022.pdf', $pdf->output());

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload dan Request Tanda Tangan Kepada Dosen Pembimbing');
    }

    public function sd_form025($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $form  = tb_form_025::where('id_sidang', $data->id)->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sd_025', compact('bap', 'form', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('Form 025 ' . $mhs->nim . '.pdf', compact('bap', 'form', 'data', 'dosen', 'mhs'));
    }

    public function download_sd_form025($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $form  = tb_form_025::where('id_sidang', $data->id)->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sd_025', compact('bap', 'form', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('Form 025 ' . $mhs->nim . '.pdf', compact('bap', 'form', 'data', 'dosen', 'mhs'));
    }

    public function sdu_form025($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $form  = tb_form_025::where('id_sidang', $data->id)->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sd_025', compact('bap', 'form', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->stream('Form 025 ' . $mhs->nim . '.pdf', compact('bap', 'form', 'data', 'dosen', 'mhs'));
    }

    public function download_sdu_form025($id)
    {
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $form  = tb_form_025::where('id_sidang', $data->id)->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sd_025', compact('bap', 'form', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('Form 025 ' . $mhs->nim . '.pdf', compact('bap', 'form', 'data', 'dosen', 'mhs'));
    }

    public function form027_pdf_delete($id)
    {
        $user = Auth::user();
        $mhs  = tb_mahasiswa::where('id', $user->id_user)->first();

        // Check File Exist
        $file    = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_027.pdf');
        $file_1  = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_027_d.pdf');
        $file_2  = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_027_p.pdf');
        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sd')->first();

        // Delete File
        if ($file) {
            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_027.pdf');
        }

        if ($file_1) {
            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_027_d.pdf');
        }

        if ($file_2) {
            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_027_p.pdf');
        }

        $update = tb_form::findOrFail($cek->id);
        $update->delete();

        return redirect()->route('form-m')->with('success', 'Berhasil Hapus Form 027');
    }

    public function form027_pdf(Request $request, $id)
    {
        $user   = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();
        $data = tb_daftar::where('id_mhs', $user->id_user)->where('ket', 'sd')->first();

        $k_penguji = $request->input('koreksi_penguji');
        $p_penguji = $request->input('perbaikan_penguji');
        $k_pembimbing = $request->input('koreksi_pembimbing');
        $p_pembimbing = $request->input('perbaikan_pembimbing');

        $totalPages = 0;
        //load pdf
        $pdf_num   = PDF::loadview('form_pdf.pdf_form_027', compact('mhs', 'data', 'totalPages', 'k_penguji', 'p_penguji', 'k_pembimbing', 'p_pembimbing'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');
        //path save file pdf
        $path = 'file_form/file11.pdf';
        //save pdf
        Storage::disk('local')->put('file_form/file11.pdf', $pdf_num->output());

        //variabel for get total page
        $pdftext = file_get_contents($path);
        $totalPages  = preg_match_all("/\/Page\W/", $pdftext, $dummy);

        //delete file pdf from public
        Storage::disk('local')->delete('file_form/file11.pdf');

        //load pdf again with passing var total page
        $pdf   = PDF::loadview('form_pdf.pdf_form_027', compact('mhs', 'data', 'totalPages', 'k_penguji', 'p_penguji', 'k_pembimbing', 'p_pembimbing'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');

        //load pdf again with passing var total page
        $pdf_1   = PDF::loadview('form_pdf.pdf_form_027_d', compact('mhs', 'data', 'totalPages', 'k_penguji', 'p_penguji', 'k_pembimbing', 'p_pembimbing'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');

        //load pdf again with passing var total page
        $pdf_2   = PDF::loadview('form_pdf.pdf_form_027_p', compact('mhs', 'data', 'totalPages', 'k_penguji', 'p_penguji', 'k_pembimbing', 'p_pembimbing'))->setPaper([0, 0, 595.276, 841.8898], 'portrait');
        
        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', 'sd')->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = 'sd';
            $form->set_verif  = 2;
            $form->ttd_dospem = 1;
            $form->ttd_dosji  = 1;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_027.pdf');
            $file_1           = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_027_d.pdf');
            $file_2           = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_027_p.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_027.pdf');
            }

            if ($file_1) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_027_d.pdf');
            }

            if ($file_2) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_027_p.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_027.pdf';
            $form->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_027.pdf', $pdf->output());

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_027_d.pdf', $pdf_1->output());

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_027_p.pdf', $pdf_2->output());

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_verif  = 2;
            $update->ttd_dospem = 1;
            $update->ttd_dosji  = 1;
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_027.pdf');
            $file_1           = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_027_d.pdf');
            $file_2           = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_027_p.pdf');

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_027.pdf');
            }

            if ($file_1) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_027_d.pdf');
            }

            if ($file_2) {
                Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_027_p.pdf');
            }

            $namadir        = 'pdf/' . $mhs->nim . '/pdf_form_027.pdf';
            $update->file   = $namadir;

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_027.pdf', $pdf->output());

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_027_d.pdf', $pdf_1->output());

            //save to directory
            Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_027_p.pdf', $pdf_2->output());

            $update->save();
        }

        return redirect()->route('form-m')->with('success', 'Berhasil Upload');
    }
}
