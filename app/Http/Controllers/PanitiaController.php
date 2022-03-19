<?php

namespace App\Http\Controllers;

use App\Models\tb_daftar;
use App\Models\tb_dosen;
use App\Models\tb_form;
use App\Models\tb_info;
use App\Models\tb_jurnal;
use App\Models\tb_mahasiswa;
use App\Models\tb_masterform;
use App\Models\tb_panitia;
use App\Models\tb_nilai_bap;
use App\Models\tb_periodik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcelKolokium;
use App\Models\tb_bimbingan;
use App\Models\tb_form_004;
use App\Models\tb_form_015;
use App\Models\tb_kartu_seminar;
use App\Models\tb_nilai_forum;
use App\Models\tb_nilai_pembahas;
use App\Models\tb_prodi;
use App\Models\tb_supervisi;
use ZipArchive;


class PanitiaController extends Controller
{
    public function dashboard_p()
    {
        $user  = Auth::user();
        $datas = tb_panitia::where('id', $user->id_user)->get();

        foreach ($datas as $data) {
            $info  = tb_info::where('id_prodi', $data->id_prodi)->first();
        }

        $get_mh = tb_mahasiswa::all();
        $get_kl = tb_daftar::where('ket', 'kl')->where('set_verif', 1)->get();
        $get_sm = tb_daftar::where('ket', 'sm')->where('set_verif', 1)->get();
        $get_sd = tb_daftar::where('ket', 'sd')->where('set_verif', 1)->get();

        return view('panitia.dashboard', compact('datas', 'get_mh', 'get_kl', 'get_sm', 'get_sd', 'info'));
    }

    public function reset_p()
    {
        $user  = Auth::user();
        $datas = tb_panitia::where('id', $user->id_user)->get();

        return view('panitia.reset_pwd', compact('datas'));
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

        return redirect()->route('dashboard-p')->with('success', 'Password changed successfully!');
    }

    public function pembimbing_p()
    {
        $user      = Auth::user();
        $datas     = tb_panitia::where('id', $user->id_user)->get();
        $prodiuser = tb_panitia::where('id', $user->id_user)->first();
        $dospem    = tb_dosen::all();
        $dosen     = tb_dosen::where('set_dospem', 0)->get();
        $getkelompok = tb_mahasiswa::select('kelompok', 'id_dospem1', 'id_dospem2', 'id_prodi')->where('id_prodi', $prodiuser->id_prodi)->distinct()->get();
        $kelompok = [];
        $mhs      = [];


        foreach ($getkelompok as $klp) {
            if ($klp->kelompok != null) {
                $dospem1 = tb_dosen::where('id', $klp->id_dospem1)->first();
                $dospem2 = tb_dosen::where('id', $klp->id_dospem2)->first();

                if (is_null($dospem1) && is_null($dospem2)) {
                    $kelompok[] = array($klp->kelompok, "", "");
                } elseif (is_null($dospem2)) {
                    $kelompok[] = array($klp->kelompok, $dospem1->nama, "");
                } else {
                    $kelompok[] = array($klp->kelompok, $dospem1->nama, $dospem2->nama);
                }

                $get = tb_mahasiswa::where('kelompok', $klp->kelompok)->where('id_prodi', $prodiuser->id_prodi)->get();
                foreach ($get as $gt) {
                    $mhs[] = array($klp->kelompok, array($gt->nama, $gt->nim));
                }
            }
        }

        return view('panitia.set_pembimbing', compact('datas', 'kelompok', 'dosen', 'dospem', 'mhs'));
    }

    public function pembimbing_ps(Request $request, $kelompok)
    {
        $user = Auth::user();
        $prodiuser = tb_panitia::where('id', $user->id_user)->first();
        $set = tb_mahasiswa::where('kelompok', $kelompok)->where('id_prodi', $prodiuser->id_prodi)->get();

        foreach ($set as $dos) {
            $mahasiswa = tb_mahasiswa::findOrFail($dos->id);
            $mahasiswa->id_dospem1 = $request->input('dospem1');
            $mahasiswa->id_dospem2 = $request->input('dospem2');
            $mahasiswa->save();
        }

        return redirect()->route('pembimbing-p')->with('success', 'Sukses Setting Pembimbing');
    }

    public function set_kelompok()
    {
        $user       = Auth::user();
        $datas      = tb_panitia::where('id', $user->id_user)->get();
        $prodiuser  = tb_panitia::where('id', $user->id_user)->first();
        $mahasiswas = tb_mahasiswa::where('kelompok', NULL)->where('id_prodi', $prodiuser->id_prodi)->get();

        return view('panitia.set_kel_mahasiswa', compact('datas', 'mahasiswas'));
    }

    public function set_kelompok_s(Request $request)
    {
        $this->validate($request, [
            'nama_kel' => 'required',
            'id'       => 'required',
        ]);

        $nama_kel = $request->input('nama_kel');
        $id       = $request->input('id');

        for ($i = 0; $i < count($id); $i++) {
            $mahasiswa = tb_mahasiswa::findOrFail($id[$i]);
            $mahasiswa->kelompok = $nama_kel;
            $mahasiswa->save();
        }

        return redirect()->route('pembimbing-p')->with('success', 'Sukses Input Kelompok Mahasiswa');
    }

    public function edit_kelompok($id)
    {
        $user      = Auth::user();
        $datas     = tb_panitia::where('id', $user->id_user)->get();
        $prodiuser = tb_panitia::where('id', $user->id_user)->first();
        $getkelompok = tb_mahasiswa::where('id_prodi', $prodiuser->id_prodi)->where('kelompok', $id)->get();
        $mahasiswas  = tb_mahasiswa::where('id_prodi', $prodiuser->id_prodi)->where('kelompok', null)->get();
        $namakel   = $id;

        return view('panitia.edit_kelompok', compact('datas', 'getkelompok', 'mahasiswas', 'namakel'));
    }

    public function edit_kelompok_s(Request $request)
    {
        $nama_kel_old = $request->input('nama_kel_old');
        $nama_kel = $request->input('nama_kel');
        $id       = $request->input('id');
        $dospem1 = $request->input('dospem1');
        $dospem2 = $request->input('dospem2');

        if ($id == "") {
            $getmhs = tb_mahasiswa::where('kelompok', $nama_kel_old)->get();

            foreach ($getmhs as $mhs) {
                $update = tb_mahasiswa::findOrFail($mhs->id);
                $update->kelompok = $nama_kel;
                $update->save();
            }
        } else {
            $getmhs = tb_mahasiswa::where('kelompok', $nama_kel_old)->get();

            foreach ($getmhs as $mhs) {
                $update = tb_mahasiswa::findOrFail($mhs->id);
                $update->id_dospem1 = $dospem1;
                $update->id_dospem2 = $dospem2;
                $update->kelompok = $nama_kel;
                $update->save();
            }

            for ($i = 0; $i < count($id); $i++) {
                $mahasiswa = tb_mahasiswa::findOrFail($id[$i]);
                $mahasiswa->id_dospem1 = $dospem1;
                $mahasiswa->id_dospem2 = $dospem2;
                $mahasiswa->kelompok = $nama_kel;
                $mahasiswa->save();
            }
        }

        return redirect()->route('pembimbing-p')->with('success', 'Sukses Edit Kelompok Mahasiswa');
    }

    public function delete_kelompok($id)
    {
        $update = tb_mahasiswa::findOrFail($id);
        $update->id_dospem1 = null;
        $update->id_dospem2 = null;
        $update->kelompok = null;
        $update->save();

        return Redirect::Back()->with('success', 'Berhasil Menghapus');
    }

    public function list_kl_form()
    {
        $user       = Auth::user();
        $prodiuser  = tb_panitia::where('id', $user->id_user)->first();
        $datas      = tb_panitia::where('id', $user->id_user)->get();
        $getlist    = tb_form::select('id_mhs', 'ket')->distinct()->get();
        $setlist    = $getlist->where('ket', 'kl');
        $getlist2   = tb_daftar::where('ket', 'kl')->where('id_moderator', 0)->get();
        $getlist3   = tb_daftar::where('ket', 'kl')->where('set_verif', 1)->get();
        // $setlist2   = tb_daftar::where('ket', 'kl')->where('set_verif', 0)->get();

        $kolokium = [];
        if (count($setlist) == 0) {
            $kolokium = [];
        } else {
            foreach ($setlist as $get) {
                $getmhs   = tb_mahasiswa::where('id', $get->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                $getfrm   = tb_form::where('id_mhs', $get->id_mhs)->where('ket', 'kl')->get();
                $getver   = tb_form::where('id_mhs', $get->id_mhs)->where('ket', 'kl')->where('set_verif', 0)->where('set_failed', 0)->get();
                if ($getmhs != null) {
                    $kolokium[] = array($get->id_mhs, $getmhs->nama, $getmhs->nim, count($getfrm), count($getver));
                }
            }
        }

        $kolokium2 = [];
        if (count($getlist2) == 0) {
            $kolokium2 = [];
        } else {
            foreach ($getlist2 as $get2) {
                $getmhs2   = tb_mahasiswa::where('id', $get2->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs2 != null) {
                    $kolokium2[] = array($get2->id_mhs, $getmhs2->nama, $getmhs2->nim, $get2->tgl, $getmhs2->id_dospem1);
                }
            }
        }

        $kolokium3 = [];
        if (count($getlist3) == 0) {
            $kolokium3 = [];
        } else {
            foreach ($getlist3 as $get3) {
                $getmhs3   = tb_mahasiswa::where('id', $get3->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs3 != null) {
                    $kolokium3[] = array($get3->id_mhs, $getmhs3->nama, $getmhs3->nim, $get3->tgl, $getmhs3->id_dospem1);
                }
            }
        }

        return view('panitia.list_kl_form', compact('datas', 'kolokium', 'kolokium2', 'kolokium3'));
    }

    public function kolokium_vf($id)
    {

        $user  = Auth::user();
        $id_mhs = $id;
        $datas = tb_panitia::where('id', $user->id_user)->get();
        $forms = tb_masterform::where('ket', 'kl')->get();
        $file  = [];

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $id)->get();
            if (count($files) == 0) {
                $file[]  = array('', '', '', '');
            } else {
                foreach ($files as $get) {
                    $file[]  = array($get->set_verif, $get->set_failed, $get->komen, $get->file, $get->id);
                }
            }
        }

        return view('panitia.verif_kl_form', compact('datas', 'forms', 'file', 'id_mhs'));
    }

    public function kolokium_vf_s(Request $request, $id)
    {
        $id_form = $request->input('id_form');

        for ($i = 0; $i < count($id_form); $i++) {
            $update   = tb_form::findOrFail($id_form[$i]);

            if ($request->input('verif' . ($id_form[$i]) . '') == 1) {
                $update->set_verif = 1;
                $update->komen = "";
                $update->set_failed = 0;
                $update->save();
            } elseif ($request->input('verif' . ($id_form[$i]) . '') == 0) {
                if ($update->id_form == 4) {
                    Storage::disk('local')->delete($update->file);
                    $update->komen = $request->input('komen' . ($id_form[$i]) . '');
                    $update->set_verif = 0;
                    $update->set_failed = 1;
                    $update->file = null;
                    $update->save();
                } else {
                    $update->komen = $request->input('komen' . ($id_form[$i]) . '');
                    $update->set_verif = 0;
                    $update->set_failed = 1;
                    $update->save();
                }
            } else {
                $update->set_verif = 0;
                $update->set_failed = 0;
                $update->save();
            }
        }

        return Redirect::Back()->with('success', 'Sukses Simpan');
    }

    public function list_kl_daftar()    // NOT USE
    {
        $user       = Auth::user();
        $prodiuser  = tb_panitia::where('id', $user->id_user)->first();
        $datas      = tb_panitia::where('id', $user->id_user)->get();
        $getlist    = tb_daftar::where('ket', 'kl')->where('set_verif', 0)->get();
        $history    = tb_daftar::where('ket', 'kl')->where('set_verif', 1)->get();

        if (count($getlist) == 0) {
            $kolokium = [];
        } else {
            foreach ($getlist as $get) {
                $getmhs   = tb_mahasiswa::where('id', $get->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs == null) {
                    $kolokium = [];
                } else {
                    $kolokium[] = array($get->id, $get->id_mhs, $getmhs->nama, $getmhs->nim);
                }
            }
        }

        if (count($history) == 0) {
            $kolokium2 = [];
        } else {
            foreach ($history as $hs) {
                $getmhs      = tb_mahasiswa::where('id', $hs->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs == null) {
                    $kolokium2 = [];
                } else {
                    $kolokium2[] = array($hs->id, $getmhs->nama, $getmhs->nim);
                }
            }
        }

        return view('panitia.list_kl_daftar', compact('datas', 'kolokium', 'kolokium2'));
    }

    public function kolokium_vd($id)
    {

        $user      = Auth::user();
        $id_mhs    = $id;
        $datas     = tb_panitia::where('id', $user->id_user)->get();
        $daftar    = tb_daftar::where('id_mhs', $id_mhs)->where('ket', 'kl')->first();

        if ($daftar == null) {
            $mahasiswa = tb_mahasiswa::where('id', $id_mhs)->first();
            $dosens    = [];
            $dosbim    = [];
            // $getname   = [];
            // $filename  = [];
            $moderator = [];
        } else {
            $mahasiswa = tb_mahasiswa::where('id', $daftar->id_mhs)->first();
            $dosens    = tb_dosen::all();
            $dosbim    = $dosens->where('id', $daftar->id_dosen)->first();
            $moderator = $dosens->where('id', $daftar->id_moderator)->first();

            // $filename = explode(';', $daftar->file);

            // for ($i = 0; $i < count($filename) - 1; $i++) {
            //    $getname[] = explode('/', $filename[$i]);
            // }
        }

        return view('panitia.verif_kl_daftar', compact('datas', 'daftar', 'dosens', 'dosbim', 'moderator', 'mahasiswa', 'id_mhs'));
    }

    public function kolokium_vd_s(Request $request, $id)
    {

        if ($request->input('status') == 1) {
            $update = tb_daftar::findOrFail($id);
            $update->set_verif = 1;
            $update->link = $request->input('link');
            $update->id_moderator = $request->input('moderator');
            $update->save();

            return redirect()->route('list-kl-form')->with('success', 'Verfikasi Kolokium berhasil diterima');
        } else {
            $update = tb_daftar::findOrFail($id)->delete();

            return redirect()->route('list-kl-form')->with('success', 'Verfikasi Kolokium berhasil ditolak');
        }
    }

    public function link_form()
    {
        $user  = Auth::user();
        $datas = tb_panitia::where('id', $user->id_user)->get();
        $panitia = tb_panitia::where('id', $user->id_user)->first();

        return view('panitia.link_form', compact('datas', 'panitia'));
    }

    public function link_form_save(Request $request)
    {
        $user  = Auth::user();
        $datas = tb_panitia::where('id', $user->id_user)->get();
        $panitia = tb_panitia::where('id', $user->id_user)->first();

        $panitia->link_nilai = $request->link_nilai;
        $panitia->link_bimbingan_aka = $request->link_bimbingan_aka;
        $panitia->link_form015 = $request->link_form015;
        $panitia->bayar_spp = $request->bayar_spp;
        $panitia->syarat_seminar = $request->syarat_seminar;
        $panitia->save();

        return Redirect::Back()->with('success', 'Sukses Simpan Link');
    }

    public function list_sv_daftar()
    {
        $user       = Auth::user();
        $prodiuser  = tb_panitia::where('id', $user->id_user)->first();
        $datas      = tb_panitia::where('id', $user->id_user)->get();
        $getlist    = tb_supervisi::where('set_verif', 0)->get();
        $history    = tb_supervisi::where('set_verif', 1)->get();
        $supervisi = [];
        $supervisi2 = [];

        if (count($getlist) == 0) {
            $supervisi = [];
        } else {
            foreach ($getlist as $get) {
                $getmhs   = tb_mahasiswa::where('id', $get->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();

                if ($getmhs != null) {
                    $supervisi[] = array($get->id, $get->id_mhs, $getmhs->nama, $getmhs->nim, $get->kelompok);
                }
            }
        }

        if (count($history) == 0) {
            $supervisi2 = [];
        } else {
            foreach ($history as $hs) {
                $getmhs      = tb_mahasiswa::where('id', $hs->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs != null) {
                    $supervisi2[] = array($hs->id, $getmhs->nama, $getmhs->nim, $hs->kelompok);
                }
            }
        }

        return view('panitia.list_sv_daftar', compact('datas', 'supervisi', 'supervisi2'));
    }

    public function supervisi_vd($id)
    {

        $user      = Auth::user();
        $id_daftar = $id;
        $datas     = tb_panitia::where('id', $user->id_user)->get();
        $daftar    = tb_supervisi::where('id', $id_daftar)->first();

        if ($daftar == null) {
            $mahasiswa = [];
            $allDosens = [];
            $dosen     = [];
        } else {
            $mahasiswa = tb_mahasiswa::where('id', $daftar->id_mhs)->first();
            $allDosens = tb_dosen::all();
            $dosen     = $allDosens->where('id', $daftar->id_dosen)->first();
        }

        return view('panitia.verif_sv_daftar', compact('datas', 'daftar', 'allDosens', 'dosen', 'mahasiswa', 'id_daftar'));
    }

    public function supervisi_vd_s(Request $request, $id)
    {
        if ($request->input('status') == 1) {
            $update = tb_supervisi::findOrFail($id);
            $update->set_verif  = 1;
            $update->id_dosen   = $request->input('dosen');
            $update->save();
            return redirect()->route('list-sv-daftar')->with('success', 'Verfikasi Supervisi Diterima');
        } else {
            $update = tb_supervisi::findOrFail($id)->delete();
            return redirect()->route('list-sv-daftar')->with('success', 'Verfikasi Supervisi Ditolak');
        }
    }



    public function list_sm_form()
    {
        $user       = Auth::user();
        $prodiuser  = tb_panitia::where('id', $user->id_user)->first();
        $datas      = tb_panitia::where('id', $user->id_user)->get();
        $getlist    = tb_form::select('id_mhs', 'ket')->distinct()->get();
        $setlist    = $getlist->where('ket', 'sm');
        $getlist2   = tb_daftar::where('ket', 'sm')->where('id_moderator', 0)->get();
        $getlist3   = tb_daftar::where('ket', 'sm')->where('set_verif', 1)->get();

        $seminar    = [];
        if (count($setlist) == 0) {
            $seminar = [];
        } else {
            foreach ($setlist as $get) {
                $getmhs   = tb_mahasiswa::where('id', $get->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                $getfrm   = tb_form::where('id_mhs', $get->id_mhs)->where('ket', 'sm')->where('ttd_dospem', 0)->get();
                $getver   = tb_form::where('id_mhs', $get->id_mhs)->where('ket', 'sm')->where('set_verif', 0)->where('set_failed', 0)->get();
                if ($getmhs == null) {
                    $seminar = [];
                } else {
                    $seminar[] = array($get->id_mhs, $getmhs->nama, $getmhs->nim, count($getfrm), count($getver));
                }
            }
        }

        $seminar2 = [];
        if (count($getlist2) == 0) {
            $seminar2 = [];
        } else {
            foreach ($getlist2 as $get2) {
                $getmhs2   = tb_mahasiswa::where('id', $get2->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs2 != null) {
                    $seminar2[] = array($get2->id_mhs, $getmhs2->nama, $getmhs2->nim, $get2->tgl, $getmhs2->id_dospem1);
                }
            }
        }

        $seminar3 = [];
        if (count($getlist3) == 0) {
            $seminar3 = [];
        } else {
            foreach ($getlist3 as $get3) {
                $getmhs3   = tb_mahasiswa::where('id', $get3->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs3 != null) {
                    $seminar3[] = array($get3->id_mhs, $getmhs3->nama, $getmhs3->nim, $get3->tgl, $getmhs3->id_dospem1);
                }
            }
        }

        return view('panitia.list_sm_form', compact('datas', 'seminar', 'seminar2', 'seminar3'));
    }

    public function seminar_vf($id)
    {

        $user  = Auth::user();
        $id_mhs = $id;
        $datas = tb_panitia::where('id', $user->id_user)->get();
        $forms = tb_masterform::where('ket', 'sm')->get();
        $file  = [];

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $id)->where('ttd_dospem', 0)->get();
            if (count($files) == 0) {
                $file[]  = array('', '', '', '');
            } else {
                foreach ($files as $get) {
                    $file[]  = array($get->set_verif, $get->set_failed, $get->komen, $get->file, $get->id);
                }
            }
        }

        return view('panitia.verif_sm_form', compact('datas', 'forms', 'file', 'id_mhs'));
    }

    public function seminar_vf_s(Request $request, $id)
    {
        $id_form = $request->input('id_form');

        for ($i = 0; $i < count($id_form); $i++) {
            $update   = tb_form::findOrFail($id_form[$i]);

            if ($request->input('verif' . ($id_form[$i]) . '') == 1) {
                $update->set_verif = 1;
                $update->komen = "";
                $update->set_failed = 0;
                $update->save();
            } elseif ($request->input('verif' . ($id_form[$i]) . '') == 0) {
                if ($update->id_form == 4) {
                    Storage::disk('local')->delete($update->file);
                    $update->komen = $request->input('komen' . ($id_form[$i]) . '');
                    $update->set_verif = 0;
                    $update->set_failed = 1;
                    $update->file = null;
                    $update->save();
                } else {
                    $update->komen = $request->input('komen' . ($id_form[$i]) . '');
                    $update->set_verif = 0;
                    $update->set_failed = 1;
                    $update->save();
                }
            } else {
                $update->set_verif = 0;
                $update->set_failed = 0;
                $update->save();
            }
        }

        return Redirect::Back()->with('success', 'Sukses Simpan');
    }

    public function list_sm_daftar()    // NOT USE
    {
        $user       = Auth::user();
        $prodiuser  = tb_panitia::where('id', $user->id_user)->first();
        $datas      = tb_panitia::where('id', $user->id_user)->get();
        $getlist    = tb_daftar::where('ket', 'sm')->where('set_verif', 0)->get();
        $history    = tb_daftar::where('ket', 'sm')->where('set_verif', 1)->get();

        if (count($getlist) == 0) {
            $seminar = [];
        } else {
            foreach ($getlist as $get) {
                $getmhs   = tb_mahasiswa::where('id', $get->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs == null) {
                    $seminar = [];
                } else {
                    $seminar[] = array($get->id, $get->id_mhs, $getmhs->nama, $getmhs->nim);
                }
            }
        }

        if (count($history) == 0) {
            $seminar2 = [];
        } else {
            foreach ($history as $hs) {
                $getmhs      = tb_mahasiswa::where('id', $hs->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs == null) {
                    $seminar2 = [];
                } else {
                    $seminar2[] = array($hs->id, $getmhs->nama, $getmhs->nim);
                }
            }
        }

        return view('panitia.list_sm_daftar', compact('datas', 'seminar', 'seminar2'));
    }

    public function seminar_vd($id)
    {

        $user      = Auth::user();
        $id_mhs    = $id;
        $datas     = tb_panitia::where('id', $user->id_user)->get();
        $daftar    = tb_daftar::where('id_mhs', $id_mhs)->where('ket', 'sm')->first();

        if ($daftar == null) {
            $mahasiswa = tb_mahasiswa::where('id', $id_mhs)->first();
            $pembahas  = [];
            $dosens    = [];
            $dosbim    = [];
            // $getname   = [];
            // $filename  = [];
            $moderator = [];
        } else {
            $mahasiswa = tb_mahasiswa::where('id', $daftar->id_mhs)->first();
            $pembahas  = tb_mahasiswa::where('id', $daftar->id_pembahas)->first();
            $dosens    = tb_dosen::all();
            $dosbim    = $dosens->where('id', $daftar->id_dosen)->first();
            $moderator = $dosens->where('id', $daftar->id_moderator)->first();

            // $filename = explode(';', $daftar->file);

            // for ($i = 0; $i < count($filename) - 1; $i++) {
            //     $getname[] = explode('/', $filename[$i]);
            // }
        }

        return view('panitia.verif_sm_daftar', compact('datas', 'daftar', 'pembahas', 'dosens', 'dosbim', 'moderator', 'mahasiswa', 'id_mhs'));
    }

    public function seminar_vd_s(Request $request, $id)
    {

        if ($request->input('status') == 1) {
            $update = tb_daftar::findOrFail($id);
            $update->set_verif = 1;
            $update->link = $request->input('link');
            $update->id_moderator = $request->input('moderator');
            $update->save();

            return redirect()->route('list-sm-form')->with('success', 'Verfikasi Seminar berhasil diterima');
        } else {
            $update = tb_daftar::where('id', $id)->first();
            $kartu = tb_kartu_seminar::where('id_seminar', $update->id)->first();
            $bap = tb_nilai_bap::where('id_mhs', $update->id_mhs)->where('ket', 'sm')->first();
            $forum = tb_nilai_forum::where('id_seminar', $update->id)->first();
            $pembahas = tb_nilai_pembahas::where('id_seminar', $update->id)->first();
            
            if($kartu != null){
                $kartu = tb_kartu_seminar::where('id_seminar', $update->id)->delete();
            }

            if($bap != null){
                $bap = tb_nilai_bap::where('id_mhs', $update->id_mhs)->where('ket', 'sm')->delete();
            }

            if($forum != null){
                $forum = tb_nilai_forum::where('id_seminar', $update->id)->delete();
            }

            if($pembahas != null){
                $pembahas = tb_nilai_pembahas::where('id_seminar', $update->id)->delete();
            }

            $update = tb_daftar::findOrFail($id)->delete();

            return redirect()->route('list-sm-form')->with('success', 'Verfikasi Seminar berhasil ditolak');
        }
    }

    public function list_sd_form()
    {
        $user       = Auth::user();
        $prodiuser  = tb_panitia::where('id', $user->id_user)->first();
        $datas      = tb_panitia::where('id', $user->id_user)->get();
        $getlist    = tb_form::select('id_mhs', 'ket')->distinct()->get();
        $setlist    = $getlist->where('ket', 'sd');

        if (count($setlist) == 0) {
            $sidang = [];
        } else {
            foreach ($setlist as $get) {
                $getmhs   = tb_mahasiswa::where('id', $get->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                $getfrm   = tb_form::where('id_mhs', $get->id_mhs)->where('ket', 'sd')->get();
                $getver   = tb_form::where('id_mhs', $get->id_mhs)->where('ket', 'sd')->where('set_verif', 0)->where('set_failed', 0)->get();
                $status   = tb_daftar::where('id_mhs', $get->id_mhs)->where('ket', 'sd')->first();

                if ($status == null) {
                    $get_ulang = 0;
                } else {
                    $get_ulang = $status->set_ulang;
                }

                if ($getmhs == null) {
                    $sidang = [];
                } else {
                    $sidang[] = array($get->id_mhs, $getmhs->nama, $getmhs->nim, count($getfrm), count($getver), $get_ulang);
                }
            }
        }

        return view('panitia.list_sd_form', compact('datas', 'sidang'));
    }

    public function sidang_vf($id)
    {

        $user  = Auth::user();
        $id_mhs = $id;
        $datas = tb_panitia::where('id', $user->id_user)->get();
        $forms = tb_masterform::where('ket', 'sd')->get();
        $file  = [];

        foreach ($forms as $form) {
            $files   = tb_form::where('id_form', $form->id)->where('id_mhs', $id)->get();
            if (count($files) == 0) {
                $file[]  = array('', '', '', '');
            } else {
                foreach ($files as $get) {
                    $file[]  = array($get->set_verif, $get->set_failed, $get->komen, $get->file, $get->id);
                }
            }
        }

        return view('panitia.verif_sd_form', compact('datas', 'forms', 'file', 'id_mhs'));
    }

    public function sidang_vf_s(Request $request, $id)
    {
        $id_form = $request->input('id_form');

        for ($i = 0; $i < count($id_form); $i++) {
            $update   = tb_form::findOrFail($id_form[$i]);

            if ($request->input('verif' . ($id_form[$i]) . '') == 1) {
                $update->set_verif = 1;
                $update->komen = "";
                $update->set_failed = 0;
                $update->save();
            } elseif ($request->input('verif' . ($id_form[$i]) . '') == 0) {
                $update->komen = $request->input('komen' . ($id_form[$i]) . '');
                $update->set_verif = 0;
                $update->set_failed = 1;
                $update->save();
            } else {
                $update->set_verif = 0;
                $update->set_failed = 0;
                $update->save();
            }
        }

        return redirect()->route('list-sd-form')->with('success', 'Sukses Save');
    }

    public function list_sd_daftar()    // NOT USE
    {
        $user       = Auth::user();
        $prodiuser  = tb_panitia::where('id', $user->id_user)->first();
        $datas      = tb_panitia::where('id', $user->id_user)->get();
        $getlist    = tb_daftar::where('ket', 'sd')->where('set_verif', 0)->get();
        $history    = tb_daftar::where('ket', 'sd')->where('set_verif', 1)->orWhere('ket', 'sd2')->get();

        $getulang   = tb_daftar::where('ket', 'sd2')->where('set_verif', 0)->get();

        if (count($getlist) == 0) {
            $sidang = [];
        } else {
            foreach ($getlist as $get) {
                $getmhs   = tb_mahasiswa::where('id', $get->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs == null) {
                    $sidang = [];
                } else {
                    $sidang[] = array($get->id, $get->id_mhs, $getmhs->nama, $getmhs->nim);
                }
            }
        }

        if (count($history) == 0) {
            $sidang2 = [];
        } else {
            foreach ($history as $hs) {
                $getmhs      = tb_mahasiswa::where('id', $hs->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs == null) {
                    $sidang2 = [];
                } else {
                    $sidang2[] = array($hs->id, $getmhs->nama, $getmhs->nim, $hs->id_mhs, $hs->set_ulang, $hs->ket);
                }
            }
        }

        if (count($getulang) == 0) {
            $sidang3 = [];
        } else {
            foreach ($getulang as $get) {
                $getmhs   = tb_mahasiswa::where('id', $get->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();
                if ($getmhs == null) {
                    $sidang3 = [];
                } else {
                    $sidang3[] = array($get->id, $get->id_mhs, $getmhs->nama, $getmhs->nim);
                }
            }
        }

        return view('panitia.list_sd_daftar', compact('datas', 'sidang', 'sidang2', 'sidang3'));
    }

    public function sidang_vd($id)
    {

        $user      = Auth::user();
        $id_mhs    = $id;
        $datas     = tb_panitia::where('id', $user->id_user)->get();
        $daftar    = tb_daftar::where('id_mhs', $id_mhs)->where('ket', 'sd')->first();
        $ulang     = tb_daftar::where('id_mhs', $id_mhs)->where('ket', 'sd2')->first();

        if ($daftar == null) {
            $mahasiswa = tb_mahasiswa::where('id', $id_mhs)->first();
            $dosens    = [];
            $dosbim    = [];
            $getname   = [];
            $filename  = [];
            $dosji     = [];
        } else {
            $mahasiswa = tb_mahasiswa::where('id', $daftar->id_mhs)->first();
            $dosens    = tb_dosen::all();
            $dosbim    = $dosens->where('id', $daftar->id_dosen)->first();
            $dosji     = $dosens->where('id', $daftar->id_dosji)->first();

            $filename = explode(';', $daftar->file);

            for ($i = 0; $i < count($filename) - 1; $i++) {
                $getname[] = explode('/', $filename[$i]);
            }
        }

        if ($ulang == null) {
            $mahasiswa2 = tb_mahasiswa::where('id', $id_mhs)->first();
            $dosens2    = [];
            $dosbim2    = [];
            $getname2   = [];
            $filename2  = [];
            $dosji2     = [];
        } else {
            $mahasiswa2 = tb_mahasiswa::where('id', $ulang->id_mhs)->first();
            $dosens     = tb_dosen::all();
            $dosbim2    = $dosens->where('id', $ulang->id_dosen)->first();
            $dosji2     = $dosens->where('id', $ulang->id_dosji)->first();

            $filename2 = explode(';', $ulang->file);

            for ($i = 0; $i < count($filename2) - 1; $i++) {
                $getname2[] = explode('/', $filename2[$i]);
            }
        }

        return view('panitia.verif_sd_daftar', compact('datas', 'daftar', 'dosens', 'dosbim', 'dosji', 'mahasiswa', 'getname', 'filename', 'id_mhs', 'ulang', 'dosbim2', 'dosji2', 'mahasiswa2', 'getname2', 'filename2'));
    }

    public function sidang_vd_s(Request $request, $id)
    {

        if ($request->input('status') == 1) {
            $update = tb_daftar::findOrFail($id);
            $update->set_verif = 1;
            $update->link = $request->input('link');
            $update->id_dosji = $request->input('dosji');
            $update->save();

            return Redirect::Back()->with('success', 'Verfikasi Sidang diterima');
        } else {
            $update = tb_daftar::findOrFail($id)->delete();

            return Redirect::Back()->with('success', 'Verfikasi Sidang ditolak');
        }
    }

    public function sidang_ulang($id)
    {
        $ulang = tb_daftar::findOrFail($id);
        $ulang->set_ulang = 1;
        $ulang->save();

        return Redirect::Back()->with('success', 'Sukses Melakukan Sidang Ulang');
    }

    // DOWNLOAD BAP

    public function bap_filter(Request $request)
    {
        $user        = Auth::user();
        $prodiuser   = tb_panitia::where('id', $user->id_user)->first();
        $datas       = tb_panitia::where('id', $user->id_user)->get();
        $list_daftar = tb_daftar::where('ket', $request->input('ket'))->where('set_verif', 1)->get();
        $data        = [];

        foreach ($list_daftar as $list) {
            $mhs = tb_mahasiswa::where('id', $list->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();

            if ($mhs != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', $request->input('ket'))->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', $request->input('ket'))->where('status', 'moderator')->first();
                $dospem = tb_dosen::where('id', $list->id_dosen)->first();
                $mode   = tb_dosen::where('id', $list->id_moderator)->first();

                if ($mode == null) {
                    $mode   = tb_dosen::where('id', $list->id_dosji)->first();
                }

                if ($nilai_d == null) {
                    $get_nilai_d = 0;
                } else {
                    $get_nilai_d = $nilai_d->id;
                }

                if ($nilai_m == null) {
                    $get_nilai_m = 0;
                } else {
                    $get_nilai_m = $nilai_m->id;
                }

                $data[] = array($mhs->nama, $mhs->nim, $get_nilai_d, $get_nilai_m, $dospem->nama, $mode->nama, $list->file);
            }
        }

        if ($request->input('ket') == 'kl') {
            return view('panitia.download_bap', compact('datas', 'data'));
        } elseif ($request->input('ket') == 'sm') {
            return view('panitia.download_bap_sm', compact('datas', 'data'));
        } elseif ($request->input('ket') == 'sd') {
            return view('panitia.download_bap_sd', compact('datas', 'data'));
        } else {
            return view('panitia.download_bap_sd2', compact('datas', 'data'));
        }
    }

    public function download_bap()
    {
        $user        = Auth::user();
        $prodiuser   = tb_panitia::where('id', $user->id_user)->first();
        $datas       = tb_panitia::where('id', $user->id_user)->get();
        $list_daftar = tb_daftar::where('ket', 'kl')->where('set_verif', 1)->get();
        $data        = [];

        foreach ($list_daftar as $list) {
            $mhs    = tb_mahasiswa::where('id', $list->id_mhs)->where('id_prodi', $prodiuser->id_prodi)->first();

            if ($mhs != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'kl')->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'kl')->where('status', 'moderator')->first();
                $dospem = tb_dosen::where('id', $list->id_dosen)->first();
                $mode   = tb_dosen::where('id', $list->id_moderator)->first();
                $exist_form = tb_form::where('id_mhs', $mhs->id)->where('ket', 'kl')->where('set_verif', 1)->first();
                $exist_004 = tb_form_004::where('kelompok', $mhs->kelompok)->first();
                $exist_015 = tb_form_015::where('kelompok', $mhs->kelompok)->first();

                if ($exist_015 == null) {
                    $get_015 = 0;
                } else {
                    $get_015 = 1;
                }

                if ($exist_004 == null) {
                    $get_004 = 0;
                } else {
                    $get_004 = 1;
                }

                if ($exist_form == null) {
                    $get_form = 0;
                } else {
                    $get_form = 1;
                }

                if ($nilai_d == null) {
                    $get_nilai_d = 0;
                } else {
                    $get_nilai_d = $nilai_d->id;
                }

                if ($nilai_m == null) {
                    $get_nilai_m = 0;
                } else {
                    $get_nilai_m = $nilai_m->id;
                }

                if ($dospem == null) {
                    $nama_dospem = "-";
                } else {
                    $nama_dospem = $dospem->nama;
                }

                if ($mode == null) {
                    $nama_mode = "-";
                } else {
                    $nama_mode = $mode->nama;
                }

                $data[] = array($mhs->nama, $mhs->nim, $get_nilai_d, $get_nilai_m, $nama_dospem, $nama_mode, $mhs->id, $get_form, $get_004, $get_015, $mhs->kelompok);
            }
        }

        return view('panitia.download_bap', compact('datas', 'data'));
    }

    // PENGUMUMAN
    public function pengumuman(Request $request)
    {
        $user      = Auth::user();
        $datas     = tb_panitia::where('id', $user->id_user)->first();

        if ($datas->prodi == "Manajemen Informatika") {
            $info = tb_info::findOrFail(1);
            if ($request->input('info') == null) {
                $info->pengumuman = "";
            } else {
                $info->pengumuman = $request->input('info');
            }
            $info->save();
        } else if ($datas->prodi == "Teknik Komputer") {
            $info = tb_info::findOrFail(2);
            if ($request->input('info') == null) {
                $info->pengumuman = "";
            } else {
                $info->pengumuman = $request->input('info');
            }
            $info->save();
        }
        return Redirect::back()->with('success', 'Pengumuman Berhasil Disimpan');
    }

    public function pengumuman_delete()
    {
        $user      = Auth::user();
        $datas     = tb_panitia::where('id', $user->id_user)->first();


        if ($datas->prodi == "Manajemen Informatika") {
            $info = tb_info::findOrFail(1);
            $info->pengumuman = "";
            $info->save();
        } else if ($datas->prodi == "Teknik Komputer") {
            $info = tb_info::findOrFail(2);
            $info->pengumuman = "";
            $info->save();
        }
        return Redirect::back()->with('success', 'Pengumuman Berhasil Dihapus');
    }

    public function jurnal_harian()
    {
        $user = Auth::user();
        $datas     = tb_panitia::where('id', $user->id_user)->get();
        $panitia = tb_panitia::where('id', $user->id_user)->first();
        $getlist = tb_jurnal::select('id_mhs', 'id_prodi')->distinct()->get();
        $getmhs = $getlist->where('id_prodi', $panitia->id_prodi);
        $file = [];

        foreach ($getmhs as $get) {
            $kegiatan = tb_jurnal::where('id_mhs', $get->id_mhs)->get();
            $list = [];
            foreach ($kegiatan as $getKegiatan) {
                $list[] = array($getKegiatan->id, $getKegiatan->id_mhs, $getKegiatan->id_prodi, $getKegiatan->hari, $getKegiatan->tanggal, $getKegiatan->waktu_mulai, $getKegiatan->waktu_selesai, $getKegiatan->kegiatan);
            }
            $file[] = array($get->id_mhs, $list);
        }

        // dd($file);

        return view('panitia.jurnal_harian', compact('datas', 'getmhs', 'file'));
    }

    public function kartu_bimbingan()
    {
        $user = Auth::user();
        $dosen = tb_dosen::all();
        $datas = tb_panitia::where('id', $user->id_user)->get();
        $panitia = tb_panitia::where('id', $user->id_user)->first();
        $kaprodi = tb_prodi::where('id', $panitia->id_prodi)->first();
        $getlist = tb_bimbingan::select('id_mhs', 'id_prodi')->distinct()->get();
        $getmhs = $getlist->where('id_prodi', $panitia->id_prodi);
        $file = [];

        foreach ($getmhs as $get) {
            $kegiatan = tb_bimbingan::where('id_mhs', $get->id_mhs)->get();
            $list = [];
            foreach ($kegiatan as $getKegiatan) {
                $list[] = array($getKegiatan->id, $getKegiatan->id_mhs, $getKegiatan->id_prodi, $getKegiatan->tanggal, $getKegiatan->kegiatan);
            }
            $file[] = array($get->id_mhs, $list);
        }

        // dd($file);

        return view('panitia.kartu_bimbingan', compact('datas', 'getmhs', 'file', 'kaprodi', 'dosen'));
    }

    public function laporan_periodik()
    {
        $user = Auth::user();
        $datas     = tb_panitia::where('id', $user->id_user)->get();
        $panitia = tb_panitia::where('id', $user->id_user)->first();
        $getlist = tb_periodik::select('id_mhs', 'id_prodi')->distinct()->get();
        $getmhs = $getlist->where('id_prodi', $panitia->id_prodi);
        $file = [];

        foreach ($getmhs as $get) {
            $kegiatan = tb_periodik::where('id_mhs', $get->id_mhs)->get();
            $list = [];
            foreach ($kegiatan as $getKegiatan) {
                $list[] = array($getKegiatan->id, $getKegiatan->id_mhs, $getKegiatan->id_prodi, $getKegiatan->periode, $getKegiatan->tanggal, $getKegiatan->informasi, $getKegiatan->kendala, $getKegiatan->catatan);
            }
            $file[] = array($get->id_mhs, $list);
        }

        // dd($file);

        return view('panitia.laporan_periodik', compact('datas', 'getmhs', 'file'));
    }

    public function export_kolokium()
    {
        return Excel::download(new ExportExcelKolokium, 'Rekap_Kolokium.xlsx');
    }

    public function set_mahasiswa()
    {
        $user = Auth::user();
        $datas  = tb_panitia::where('id', $user->id_user)->get();
        $panitia = tb_panitia::where('id', $user->id_user)->first();
        $all    = tb_mahasiswa::where('id_prodi', $panitia->id_prodi)->get();
        $dosens = tb_dosen::all();

        return view('panitia.set_mahasiswa', compact('datas', 'all', 'dosens'));
    }

    public function mahasiswa_reset($id)
    {
        $user         = user::where('username', $id)->first();
        $db           = user::find($user->id);
        $db->password = bcrypt($user->username);
        $db->save();

        return redirect()->route('set-mahasiswa')->with('success-reset', 'Berhasil mereset password mahasiswa');
    }

    public function set_kaprodi(Request $request){
        $user = Auth::user();
        $panitia = tb_panitia::where('id', $user->id_user)->first();
        $kaprodi = tb_prodi::findOrFail($panitia->id_prodi);
        $kaprodi->id_kaprodi = $request->input('kaprodi');
        $kaprodi->save();

        return Redirect::Back()->with('success', 'Sukses Set Kaprodi');        
    }
}
