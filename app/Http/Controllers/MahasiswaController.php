<?php

namespace App\Http\Controllers;

use App\Models\tb_bimbingan;
use App\Models\tb_daftar;
use App\Models\tb_dosen;
use App\Models\tb_form;
use App\Models\tb_info;
use App\Models\tb_jurnal;
use App\Models\tb_kartu_seminar;
use App\Models\tb_mahasiswa;
use App\Models\tb_masterform;
use App\Models\tb_panitia;
use App\Models\tb_periodik;
use App\Models\tb_nilai_bap;
use App\Models\tb_supervisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Facade\FlareClient\Stacktrace\File;

class MahasiswaController extends Controller
{

    public function __construct()
    {
        set_time_limit(10000000);
    }

    public function dashboard_m()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();

        foreach ($datas as $data) {
            $info  = tb_info::where('id_prodi', $data->id_prodi)->first();
            $suvi  = tb_supervisi::where('kelompok', $data->kelompok)->where('set_verif', 1)->first();
        }

        foreach ($datas as $data) {
            $dospem1 = $data->id_dospem1;
            $dospem2 = $data->id_dospem2;

            if ($dospem1 != null) {
                $ds1 = tb_dosen::where('id', $dospem1)->first();
            } else {
                $ds1 = "";
            }

            if ($dospem2 != null) {
                $ds2 = tb_dosen::where('id', $dospem2)->first();
            } else {
                $ds2 = "";
            }
        }

        $kolo  = tb_daftar::where('ket', 'kl')->where('id_mhs', $user->id_user)->where('set_verif', 1)->first();
        $semi  = tb_daftar::where('ket', 'sm')->where('id_mhs', $user->id_user)->where('set_verif', 1)->first();
        $sida  = tb_daftar::where('ket', 'sd')->where('id_mhs', $user->id_user)->where('set_verif', 1)->first();

        if ($kolo != null) {
            $bap_kl = array($kolo->set_bap_d, $kolo->set_bap_m);
        } else {
            $bap_kl = [];
        }

        if ($suvi != null) {
            $form_sv = array($suvi->set_form004, $suvi->set_form015);
        } else {
            $form_sv = [];
        }

        if ($semi != null) {
            $bap_sm = array($semi->set_bap_d, $semi->set_bap_m);
        } else {
            $bap_sm = [];
        }


        if ($sida != null) {
            $bap_sd = array($sida->set_bap_d, $sida->set_bap_m);
        } else {
            $bap_sd = [];
        }


        return view('mahasiswa.dashboard', compact('datas', 'kolo', 'semi', 'sida', 'bap_kl', 'bap_sm', 'bap_sd', 'ds1', 'ds2', 'info', 'suvi', 'form_sv'));
    }

    public function reset_m()
    {

        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();

        return view('mahasiswa.reset_pwd', compact('datas'));
    }

    public function resetPwd(Request $request)
    {
        $this->validate($request, [
            'password'   => 'required',
        ]);

        $id  = Auth::user()->id;

        $user               = user::findOrFail($id);
        $user->password     = bcrypt($request->input('password'));

        $user->save();

        return redirect()->route('dashboard-m')->with('success', 'Password changed successfully!');
    }

    public function biodata_m()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();

        return view('mahasiswa.biodata', compact('datas'));
    }

    public function biodata_ms(Request $request)
    {

        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();

        $bio   = tb_mahasiswa::findOrFail($user->id_user);
        $bio->tempat_lahir      = $request->input('tempat_lahir');
        $bio->tanggal_lahir     = $request->input('tanggal_lahir');
        $bio->alamat            = $request->input('alamat');
        $bio->no_tlp            = $request->input('no_tlp');
        $bio->email             = $request->input('email');
        $bio->asal_sma          = $request->input('asal_sma');
        $bio->tahun_lulus       = $request->input('tahun_lulus');
        $bio->tahun_masuk       = $request->input('tahun_masuk');
        $bio->jalur             = $request->input('jalur');
        $bio->ipk1              = $request->input('ipk1');
        $bio->ipk2              = $request->input('ipk2');
        $bio->instansi          = $request->input('instansi');
        $bio->alamat_instansi   = $request->input('alamat_instansi');
        $bio->kajian            = $request->input('kajian');

        if ($request->hasFile('foto')) {
            // Cek Foto
            $file           = Storage::disk('local')->exists('file_form/foto_mhs/' . $request->foto);

            // Delete Foto
            if ($file) {
                Storage::disk('local')->delete('file_form/foto_mhs/' . $request->foto);
            }

            $dir            = Storage::disk('local')->put('file_form/foto_mhs/', $request->foto);
            $bio->foto      = $dir;
        }


        if ($request->hasFile('gambar')) {
            $dir      = Storage::disk('local')->put('file_form/ttd_mhs/', $request->gambar);
            $bio->ttd = $dir;
        } elseif ($request->signed != "") {
            $folderPath     = 'file_form/ttd_mhs/'; // upload/
            $image_parts    = explode(";base64,", $request->signed); // image/png, sdfghjcnm
            $image_type_aux = explode("image/", $image_parts[0]); // "", png
            $image_type     = $image_type_aux[1]; // png
            $image_base64   = base64_decode($image_parts[1]); // agshgd
            $file           = $folderPath . uniqid() . '.' . $image_type; // upload/12.png

            file_put_contents($file, $image_base64);

            $bio->ttd       = $file;
        }

        $bio->save();

        return Redirect::Back()->with('success', 'Berhasil Menyimpan Data');
    }

    public function biodata_download()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();
        $data  = tb_mahasiswa::where('id', $user->id_user)->first();
        $tgl   = Carbon::now();
        $pdf   = PDF::loadview('form_pdf.biodata', compact('data'))->setPaper('A4', 'portrait');

        return $pdf->stream('Biodata ' . $data->nim . '.pdf', compact('data'));
    }

    public function form_m()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();
        $forms = tb_masterform::where('ket', 'kl')->orWhere('ket', 'sv')->orWhere('ket', 'sm')->orWhere('ket', 'sm2')->get();
        $kolos = tb_masterform::where('ket', 'kl')->get();
        $semis = tb_masterform::where('ket', 'sm')->get();
        $sidas = tb_masterform::where('ket', 'sd')->get();
        $file  = [];

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $file[]  = array(count($files));
            } else {
                foreach ($files as $get) {
                    $file[]  = array(count($files), $get->set_verif, $get->set_failed, $get->komen, $get->file);
                }
            }
        }

        foreach ($kolos as $kl) {
            $files   = tb_form::where('id_form', $kl->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $file_kl[]  = array(count($files));
            } else {
                foreach ($files as $get) {
                    $file_kl[]  = array(count($files), $get->set_verif, $get->set_failed, $get->komen);
                }
            }
        }

        foreach ($semis as $sm) {
            $files   = tb_form::where('id_form', $sm->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $file_sm[]  = array(count($files));
            } else {
                foreach ($files as $get) {
                    $file_sm[]  = array(count($files), $get->set_verif, $get->set_failed, $get->komen);
                }
            }
        }

        foreach ($sidas as $sd) {
            $files   = tb_form::where('id_form', $sd->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $file_sd[]  = array(count($files));
            } else {
                foreach ($files as $get) {
                    $file_sd[]  = array(count($files), $get->set_verif, $get->set_failed, $get->komen);
                }
            }
        }

        return view('mahasiswa.form', compact('datas', 'forms', 'file', 'file_kl', 'file_sm', 'file_sd', 'kolos', 'semis', 'sidas'));
    }

    public function jurnal()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();
        $forms = tb_masterform::all();
        $jurnals = tb_jurnal::where('id_mhs', $user->id_user)->get();


        return view('mahasiswa.jurnal_harian', compact('datas', 'forms', 'jurnals'));
    }

    public function periodik()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();
        $forms = tb_masterform::all();
        $periodiks = tb_periodik::where('id_mhs', $user->id_user)->get();

        return view('mahasiswa.laporan_periodik', compact('datas', 'forms', 'periodiks'));
    }

    public function k_bimbingan()
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();
        $forms = tb_masterform::all();
        $bimbingans = tb_bimbingan::where('id_mhs', $user->id_user)->get();

        return view('mahasiswa.kartu_bimbingan', compact('datas', 'forms', 'bimbingans'));
    }

    public function k_seminar()
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $forms  = tb_masterform::all();
        $dosens = tb_dosen::all();
        $seminars = tb_kartu_seminar::where('id_mhs', $user->id_user)->get();

        return view('mahasiswa.kartu_seminar', compact('datas', 'forms', 'dosens', 'seminars'));
    }


    public function kolokium()      // NOT USE
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();
        $forms = tb_masterform::where('ket', 'kl')->get();
        $file  = [];

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $file[]  = array(count($files));
            } else {
                foreach ($files as $get) {
                    $file[]  = array(count($files), $get->set_verif, $get->set_failed, $get->komen);
                }
            }
        }

        return view('mahasiswa.kolokium', compact('datas', 'forms', 'file'));
    }

    public function d_kolokium()
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $dosens = tb_dosen::all();
        $get    = tb_daftar::where('id_mhs', $user->id_user)->where('ket', 'kl')->first();
        $forms  = tb_masterform::where('ket', 'kl')->get();
        $set    = 0;

        $get_nilai_d  = tb_nilai_bap::where('id_mhs', $user->id_user)->where('ket', 'kl')->where('status', 'dosen')->first();
        $get_nilai_m  = tb_nilai_bap::where('id_mhs', $user->id_user)->where('ket', 'kl')->where('status', 'moderator')->first();

        if (empty($get_nilai_d)) {
            $nilai_d_kelayakan = 'ya';
            $nilai_d_keputusan = 'proses';
        } else {
            $nilai_d_kelayakan = $get_nilai_d->kelayakan;
            $nilai_d_keputusan = $get_nilai_d->keputusan;
        }

        if (empty($get_nilai_m)) {
            $nilai_m_kelayakan = 'ya';
        } else {
            $nilai_m_kelayakan = $get_nilai_m->kelayakan;
        }

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $set  = 1;
            }
        }

        if (is_null($get)) {
            $mode = "";
            $status = [];
        } else {

            $mode   = tb_dosen::where('id', $get->id_moderator)->first();
            $status = array($get->set_verif);
        }

        return view('mahasiswa.daftar_kolokium', compact('datas', 'dosens', 'get', 'set', 'mode', 'status', 'nilai_d_kelayakan', 'nilai_d_keputusan', 'nilai_m_kelayakan'));
    }

    public function perbaikan_kolokium(Request $request)
    {
        $user = Auth::user();
        $get = tb_daftar::where('id_mhs', $user->id_user)->where('ket', 'kl')->first();

        $update = tb_daftar::findOrFail($get->id);
        $update->judul = $request->input('judul');
        $update->save();

        return redirect()->route('d-kolokium')->with('success', 'Perbaikan Berhasil Disimpan');
    }

    public function s_kolokium(Request $request)
    {
        $this->validate($request, [
            'dospem' => 'required',
            'judul'  => 'required',
            'tgl'    => 'required',
            'waktu'  => 'required',
            'lokasi' => 'required',

        ]);

        $user  = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $namaDir = "";

        $upload = new tb_daftar;
        $upload->id_dosen = $request->input('dospem');
        $upload->id_mhs   = $user->id_user;
        $upload->id_prodi = $mhs->id_prodi;
        $upload->judul    = $request->input('judul');
        $upload->tgl      = $request->input('tgl');
        $upload->waktu    = $request->input('waktu');
        $upload->lokasi   = $request->input('lokasi');
        $upload->ket      = 'kl';

        // for ($i = 0; $i < count($request->file); $i++) {
        // Check File Exist
        //    $file  = Storage::disk('local')->exists('file_form/upload_persyaratan/' . $mhs->nim . '/' . $request->file[$i]->getClientOriginalName());

        //    if ($file) {
        //         Storage::disk('local')->delete('file_form/upload_persyaratan/' . $mhs->nim . '/' . $request->file[$i]->getClientOriginalName());
        //     }

        //     $dir      = Storage::disk('local')->putFileAs('file_form/upload_persyaratan/' . $mhs->nim, $request->file[$i], $request->file[$i]->getClientOriginalName());

        //     $namaDir  = $namaDir . $dir . ';';
        // }

        // $upload->file   = $namaDir;

        $upload->save();

        return Redirect::Back()->with('success', 'Berhasil Upload');
    }

    public function d_supervisi()
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        foreach ($datas as $data) {
            $get    = tb_supervisi::where('kelompok', $data->kelompok)->first();
        }

        if (is_null($get)) {
            $dosen = "";
            $status = [];
        } else {
            $dosen   = tb_dosen::where('id', $get->id_dosen)->first();
            $status = array($get->set_verif);
        }

        return view('mahasiswa.daftar_supervisi', compact('datas', 'get', 'status', 'dosen'));
    }

    public function s_supervisi(Request $request)
    {

        $user  = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $upload = new tb_supervisi;
        $upload->id_mhs   = $user->id_user;
        $upload->id_prodi = $mhs->id_prodi;
        $upload->kelompok = $mhs->kelompok;
        $upload->instansi = $mhs->instansi;
        $upload->alamat_instansi = $mhs->alamat_instansi;
        $upload->bidang_usaha = $request->input('bidang_usaha');
        $upload->tanggal = $request->input('tgl');
        $upload->save();

        return Redirect::Back()->with('success', 'Berhasil Upload');
    }





    public function seminar()       // NOT USE
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();
        $forms = tb_masterform::where('ket', 'sm')->get();
        $file  = [];

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $file[]  = array(count($files));
            } else {
                foreach ($files as $get) {
                    $file[]  = array(count($files), $get->set_verif, $get->set_failed, $get->komen);
                }
            }
        }

        return view('mahasiswa.seminar', compact('datas', 'forms', 'file'));
    }

    public function d_seminar()
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $dosens = tb_dosen::all();
        $mahasiswas = tb_mahasiswa::where('id', '!=', $user->id_user)->get();
        $get    = tb_daftar::where('id_mhs', $user->id_user)->where('ket', 'sm')->first();
        $forms  = tb_masterform::where('ket', 'sm')->get();
        $set    = 0;
        $semis = tb_masterform::where('ket', 'sm')->get();

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $set  = 1;
            }
        }

        if (is_null($get)) {
            $filename = "";
            $mode = "";
            $status = [];
        } else {
            $filename = explode(';', $get->file);
            $mode   = tb_dosen::where('id', $get->id_moderator)->first();
            $status = array($get->set_verif);
        }


        foreach ($semis as $sm) {
            $files   = tb_form::where('id_form', $sm->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $file_sm[]  = array(count($files));
            } else {
                foreach ($files as $get2) {
                    $file_sm[]  = array(count($files), $get2->set_verif, $get2->set_failed, $get2->komen);
                }
            }
        }


        return view('mahasiswa.daftar_seminar', compact('datas', 'dosens', 'mahasiswas', 'get', 'set', 'filename', 'mode', 'status', 'semis', 'file_sm'));
    }

    public function s_seminar(Request $request)
    {
        $this->validate($request, [
            'dospem' => 'required',
            'judul'  => 'required',
            'tgl'    => 'required',
            'waktu'  => 'required',
        ]);

        $user  = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $upload = new tb_daftar;
        $upload->id_dosen = $request->input('dospem');
        $upload->id_pembahas = $request->input('pembahas');
        $upload->id_mhs   = $user->id_user;
        $upload->id_prodi = $mhs->id_prodi;
        $upload->judul    = $request->input('judul');
        $upload->tgl      = $request->input('tgl');
        $upload->waktu    = $request->input('waktu');
        $upload->ket      = 'sm';
        $upload->save();

        return Redirect::Back()->with('success', 'Berhasil Upload');
    }

    public function jadwal_seminar()
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $dosens = tb_dosen::all();
        $seminars = tb_daftar::where('ket', 'sm')->where('set_verif', 1)->where('id_mhs', '!=', $user->id_user)->get();

        return view('mahasiswa.jadwal_seminar', compact('datas', 'dosens', 'seminars'));
    }

    public function hadir_seminar($id)
    {

        $user = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();

        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();
        $sm = tb_daftar::where('id', $id)->where('ket', 'sm')->first();

        $cek = tb_kartu_seminar::where('id_mhs', $mhs->id)->where('tanggal', $sm->tgl)->where('waktu', $sm->waktu)->first();

        if ($cek != null) {
            return Redirect::Back()->with('error', 'Tidak diperbolehkan menghadiri dua seminar di waktu yang bersamaan.');
        }

        $hadir = new tb_kartu_seminar;
        $hadir->id_mhs      = $user->id_user;
        $hadir->id_prodi    = $mhs->id_prodi;
        $hadir->id_seminar  = $id;
        $hadir->tanggal     = $sm->tgl;
        $hadir->waktu       = $sm->waktu;
        $hadir->nama_pemrasaran = $sm->getMahasiswa->nama;
        $hadir->nim_pemrasaran  = $sm->getMahasiswa->nim;
        $hadir->id_dosen    = $sm->id_moderator;
        $hadir->paraf       = 0;
        $hadir->hadir       = 1;

        $hadir->save();

        return Redirect::Back()->with('success', 'Berhasil menghadiri seminar');
    }

    public function kartu_sm()
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $forms  = tb_masterform::all();
        $dosens = tb_dosen::all();
        $seminars = tb_kartu_seminar::where('id_mhs', $user->id_user)->where('hadir', 1)->get();
        $jumlah = tb_kartu_seminar::where('id_mhs', $user->id_user)->where('paraf', 1)->count();

        return view('mahasiswa.kartu_seminar', compact('datas', 'forms', 'dosens', 'seminars', 'jumlah'));
    }




    public function sidang()        // NOT USE
    {
        $user  = Auth::user();
        $datas = tb_mahasiswa::where('id', $user->id_user)->get();
        $forms = tb_masterform::where('ket', 'sd')->get();
        $file  = [];

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $file[]  = array(count($files));
            } else {
                foreach ($files as $get) {
                    $file[]  = array(count($files), $get->set_verif, $get->set_failed, $get->komen);
                }
            }
        }

        return view('mahasiswa.sidang', compact('datas', 'forms', 'file'));
    }

    public function d_sidang()
    {
        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $dosens = tb_dosen::all();
        $get    = tb_daftar::where('id_mhs', $user->id_user)->where('ket', 'sd')->where('set_ulang', 0)->first();
        $get2   = tb_daftar::where('id_mhs', $user->id_user)->where('ket', 'sd2')->where('set_ulang', 0)->first();
        $forms  = tb_masterform::where('ket', 'sd')->get();
        $set    = 0;

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $user->id_user)->get();
            if (count($files) == 0) {
                $set  = 1;
            }
        }

        if (is_null($get2)) {
            if (is_null($get)) {
                $getname = "";
                $filename = "";
                $mode = "";
                $status = [];
            } else {
                $filename = explode(';', $get->file);

                for ($i = 0; $i < count($filename) - 1; $i++) {
                    $getname[] = explode('/', $filename[$i]);
                }

                $mode   = tb_dosen::where('id', $get->id_moderator)->first();
                $status = array($get->set_verif);
            }
        } else {
            $filename = explode(';', $get2->file);

            for ($i = 0; $i < count($filename) - 1; $i++) {
                $getname[] = explode('/', $filename[$i]);
            }

            $mode   = tb_dosen::where('id', $get2->id_moderator)->first();
            $status = array($get2->set_verif);
        }
        return view('mahasiswa.daftar_sidang', compact('datas', 'dosens', 'get', 'set', 'get2', 'filename', 'getname', 'mode', 'status'));
    }

    public function s_sidang(Request $request)
    {
        $this->validate($request, [
            'dospem' => 'required',
            'dosji'  => 'required',
            'judul'  => 'required',
            'tgl'    => 'required',
            'waktu'  => 'required',

        ]);

        $user   = Auth::user();
        $mhs    = tb_mahasiswa::where('id', $user->id_user)->first();
        $daftar = tb_daftar::where('id_mhs', $user->id_user)->where('ket', 'sd')->get();

        $namaDir = "";

        $upload = new tb_daftar;
        $upload->id_dosen  = $request->input('dospem');
        $upload->id_dosji  = $request->input('dosji');
        $upload->id_mhs    = $user->id_user;
        $upload->id_prodi  = $mhs->id_prodi;
        $upload->judul     = $request->input('judul');
        $upload->tgl       = $request->input('tgl');
        $upload->waktu     = $request->input('waktu');

        if (count($daftar) == 0) {
            $upload->ket   = 'sd';
        } else {
            $upload->ket   = 'sd2';
        }

        for ($i = 0; $i < count($request->file); $i++) {
            // Check File Exist
            $file  = Storage::disk('local')->exists('file_form/upload_persyaratan/' . $mhs->nim . '/' . $request->file[$i]->getClientOriginalName());

            if ($file) {
                Storage::disk('local')->delete('file_form/upload_persyaratan/' . $mhs->nim . '/' . $request->file[$i]->getClientOriginalName());
            }

            $dir      = Storage::disk('local')->putFileAs('file_form/upload_persyaratan/' . $mhs->nim, $request->file[$i], $request->file[$i]->getClientOriginalName());

            $namaDir  = $namaDir . $dir . ';';
        }

        $upload->file   = $namaDir;

        $upload->save();

        return Redirect::Back()->with('success', 'Berhasil Upload');
    }

    public function upload(Request $request, $id)
    {
        $this->validate($request, [
            'upload' => 'required'
        ]);

        $user = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();
        $cek = tb_form::where('id_form', $id)->where('id_mhs', $user->id_user)->where('ket', $request->input('ket'))->first();

        if ($cek == null) {
            $form             = new tb_form;
            $form->id_mhs     = $user->id_user;
            $form->id_form    = $id;
            $form->ket        = $request->input('ket');

            // Check File Exist
            $file             = Storage::disk('local')->exists('file_form/upload_form/' . $mhs->nim . '/' . $request->upload->getClientOriginalName());

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('file_form/upload_form/' . $mhs->nim . '/' . $request->upload->getClientOriginalName());
            }

            $dir          = Storage::disk('local')->putFileAs('file_form/upload_form/' . $mhs->nim, $request->upload, $request->upload->getClientOriginalName());
            $form->file   = $dir;

            $form->save();
        } else {
            $update = tb_form::findOrFail($cek->id);
            $update->set_failed = 0;

            // Check File Exist
            $file             = Storage::disk('local')->exists('file_form/upload_form/' . $mhs->nim . '/' . $request->upload->getClientOriginalName());

            // Delete File
            if ($file) {
                Storage::disk('local')->delete('file_form/upload_form/' . $mhs->nim . '/' . $request->upload->getClientOriginalName());
            }

            $dir            = Storage::disk('local')->putFileAs('file_form/upload_form/' . $mhs->nim, $request->upload, $request->upload->getClientOriginalName());
            $update->file   = $dir;

            $update->save();
        }

        return Redirect::Back()->with('success', 'Berhasil Upload');
    }

    public function menu_input($id)
    {

        $user   = Auth::user();
        $datas  = tb_mahasiswa::where('id', $user->id_user)->get();
        $prodi  = tb_mahasiswa::where('id', $user->id_user)->first();
        $dosens = tb_dosen::all();

        $link  = tb_panitia::where('id_prodi', $prodi->id_prodi)->first();
        $forms = tb_masterform::where('ket', 'laporan_pkl')->get();

        $form018  = tb_form::where('id_mhs', $user->id_user)->where('id_form', 16)->where('ket', 'sm')->first();


        if ($id == "1") {
            return view('mahasiswa.form_input.input_001', compact('datas', 'id'));
        } elseif ($id == "2") {
            return view('mahasiswa.form_input.input_002', compact('datas', 'id'));
        } elseif ($id == "3") {
            return view('mahasiswa.form_input.input_003', compact('datas', 'id'));
        } elseif ($id == "4") {
            return view('mahasiswa.form_input.input_012', compact('datas', 'id'));
        } elseif ($id == "5") {
            return view('mahasiswa.form_input.input_transkrip', compact('datas', 'id', 'link'));
        } elseif ($id == "6") {
            return view('mahasiswa.form_input.input_bimbingan_akademik', compact('datas', 'id', 'link'));
        } elseif ($id == "7") {
            return view('mahasiswa.form_input.bayar_spp', compact('datas', 'id', 'link'));
        } elseif ($id == "8") {
            return view('mahasiswa.form_input.input_015_1', compact('datas', 'id', 'dosens'));
        } elseif ($id == "9") {
            return view('mahasiswa.form_input.input_015_2', compact('datas', 'id', 'link'));
        } elseif ($id == "10") {
            return view('mahasiswa.form_input.input_008', compact('datas', 'id'));
        } elseif ($id == "11") {
            return view('mahasiswa.form_input.input_009', compact('datas', 'id'));
        } elseif ($id == "12") {
            return view('mahasiswa.form_input.input_010', compact('datas', 'id'));
        } elseif ($id == "13") {
            return view('mahasiswa.form_input.input_011', compact('datas', 'id'));
        } elseif ($id == "14") {
            return view('mahasiswa.form_input.input_013', compact('datas', 'id'));
        } elseif ($id == "15") {
            return view('mahasiswa.form_input.input_014', compact('datas', 'id'));
        } elseif ($id == "16") {
            return view('mahasiswa.form_input.input_018', compact('datas', 'id', 'form018'));
        } elseif ($id == "17") {
            return view('mahasiswa.form_input.laporan_pkl', compact('datas', 'id', 'forms'));
        } elseif ($id == "18") {
            return view('mahasiswa.form_input.penggunaan_produk', compact('datas', 'id'));
        } elseif ($id == "19") {
            return view('mahasiswa.form_input.syarat_seminar', compact('datas', 'id', 'link'));
        } elseif ($id == "20") {
            return view('mahasiswa.form_input.input_020', compact('datas', 'id'));
        } elseif ($id == "21") {
            return view('mahasiswa.form_input.input_016', compact('datas', 'id'));
        } elseif ($id == "22") {
            return view('mahasiswa.form_input.input_017', compact('datas', 'id', 'dosens'));
        } elseif ($id == "23") {
            return view('mahasiswa.form_input.input_022', compact('datas', 'id'));
        } elseif ($id == "24") {
            return view('mahasiswa.form_input.input_023_d', compact('datas', 'id'));
        } elseif ($id == "25") {
            return view('mahasiswa.form_input.input_023_p', compact('datas', 'id'));
        } elseif ($id == "26") {
            return view('mahasiswa.form_input.input_025', compact('datas', 'id'));
        }
    }

    public function jurnal_submit(Request $request)
    {
        $user = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $input = new tb_jurnal;
        $input->id_mhs = $user->id_user;
        // $input->hari = $request->input('hari');
        $input->tanggal = $request->input('tanggal');
        $input->waktu = $request->input('waktu');
        $input->kegiatan = $request->input('kegiatan');
        $input->id_prodi = $mhs->id_prodi;

        $input->save();

        return Redirect::Back()->with('success', 'Data Berhasil Disimpan');
    }

    public function periodik_submit(Request $request)
    {
        $user = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $input = new tb_periodik;
        $input->id_mhs = $user->id_user;
        $input->periode = $request->input('periode');
        $input->tanggal = $request->input('tanggal');
        $input->informasi = $request->input('info');
        $input->kendala = $request->input('kendala');
        $input->catatan = $request->input('catatan');
        $input->id_prodi = $mhs->id_prodi;

        $input->save();

        return Redirect::Back()->with('success', 'Data Berhasil Disimpan');
    }

    public function bimbingan_submit(Request $request)
    {
        $user = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $input = new tb_bimbingan;
        $input->id_mhs = $user->id_user;
        $input->pertemuan = $request->input('pertemuan');
        $input->tanggal = $request->input('tanggal');
        $input->kegiatan = $request->input('kegiatan');
        $input->id_prodi = $mhs->id_prodi;

        $input->save();

        return Redirect::Back()->with('success', 'Data Berhasil Disimpan');
    }

    public function k_seminar_submit(Request $request)
    {
        $user = Auth::user();
        $mhs = tb_mahasiswa::where('id', $user->id_user)->first();

        $input = new tb_kartu_seminar;
        $input->id_mhs = $user->id_user;
        $input->nama_pemrasaran = $request->input('nama_pem');
        $input->nim_pemrasaran = $request->input('nim_pem');
        $input->tanggal = $request->input('tanggal');
        $input->waktu = $request->input('waktu');
        $input->id_dosen = $request->input('dosen');
        $input->id_prodi = $mhs->id_prodi;

        $input->save();

        return Redirect::Back()->with('success', 'Data Berhasil Disimpan');
    }
}
