<?php

namespace App\Http\Controllers;

use App\Models\tb_daftar;
use App\Models\tb_dosen;
use App\Models\tb_form;
use App\Models\tb_form_004;
use App\Models\tb_form_015;
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

class ExportController extends Controller
{

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
                if ($get->id_form == 1){
                    $zip->addFile($get->file, $request->input('nama').'_'.$request->input('nim').'_form001'.'.pdf');
                }elseif ($get->id_form == 4){
                    $zip->addFile($get->file, $request->input('nama').'_'.$request->input('nim').'_form012'.'.pdf');
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
                Storage::disk('local')->put('file_form/kesediaan_dosen/' . $getDosen->id. '/pdf_form_003.pdf', $pdf->output());
    
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
                Storage::disk('local')->put('file_form/kesediaan_dosen/' . $getDosen->id. '/pdf_form_003.pdf', $pdf->output());
    
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

        $supervisi   = tb_form_004::where('kelompok', $id)->first();
        $daftar = tb_supervisi::where('kelompok', $id)->first();
        $value6 = explode(',', $supervisi->penilaian_6);
        $value7 = explode(',', $supervisi->penilaian_7);
        $pdf   = PDF::loadview('dosen.Form-004.pdf_supervisi_form_004', compact('supervisi', 'daftar', 'value6', 'value7'))->setPaper([0,0,595.276,841.8898], 'portrait');

        return $pdf->stream('Supervisi Form 004 ' . $supervisi->kelompok . '.pdf');
    }

    public function form_015_pdf($id)
    {

        $supervisi   = tb_form_015::where('kelompok', $id)->first();
        $daftar = tb_supervisi::where('kelompok', $id)->first();
        $value6 = explode(',', $supervisi->penilaian_6);
        $value7 = explode(',', $supervisi->penilaian_7);
        $value8 = explode(',', $supervisi->penilaian_8);
        $value9 = explode(',', $supervisi->penilaian_9);
        $value10 = explode(',', $supervisi->penilaian_10);
        $pdf   = PDF::loadview('dosen.Form-015.pdf_supervisi_form_015', compact('supervisi', 'daftar', 'value6', 'value7', 'value8', 'value9', 'value10'))->setPaper([0,0,595.276,841.8898], 'portrait');

        return $pdf->stream('Supervisi Form 004 ' . $supervisi->kelompok . '.pdf');
    }
}
