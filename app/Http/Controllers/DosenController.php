<?php

namespace App\Http\Controllers;

use App\Models\tb_dosen;
use App\Models\tb_mahasiswa;
use App\Models\tb_daftar;
use App\Models\tb_panitia;
use App\Models\tb_nilai_bap;
use App\Models\tb_masterform;
use App\Models\tb_form;
use App\Models\tb_form_004;
use App\Models\tb_form_015;
use App\Models\tb_supervisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Models\tb_kartu_seminar;
use App\Models\tb_nilai_forum;
use App\Models\tb_nilai_pembahas;

class DosenController extends Controller
{

    public function __construct()
    {
        set_time_limit(10000000);
    }

    public function dashboard_d()
    {
        $user  = Auth::user();
        $datas = tb_dosen::where('id', $user->id_user)->get();
        // $mhs   = tb_mahasiswa::where('id_dospem1', $user->id_user)->orWhere('id_dospem2', $user->id_user)->get();
        $mhs   = tb_mahasiswa::where('id_dospem1', $user->id_user)->get();
        $mhs2  = tb_mahasiswa::where('id_dospem2', $user->id_user)->get();
        $forms = tb_masterform::all();

        foreach ($forms as $getall) {
            $get_form[] = $getall->nama;
        }

        if (count($mhs) == 0) {
            $kolo[] = 0;
            $semi[] = 0;
            $sida[] = 0;
            $status = [];
        } else {
            foreach ($mhs as $maha) {
                $get_kl  = tb_daftar::where('ket', 'kl')->where('id_mhs', $maha->id)->where('set_verif', 1)->first();
                $get_sm  = tb_daftar::where('ket', 'sm')->where('id_mhs', $maha->id)->where('set_verif', 1)->first();
                $get_sd  = tb_daftar::where('ket', 'sd')->where('id_mhs', $maha->id)->where('set_verif', 1)->first();

                if ($get_kl != null) {
                    $kolo[] = $get_kl->set_verif;
                } else {
                    $kolo[] = 0;
                }

                if ($get_sm != null) {
                    $semi[] = $get_sm->set_verif;
                } else {
                    $semi[] = 0;
                }

                if ($get_sd != null) {
                    $sida[] = $get_sd->set_verif;
                } else {
                    $sida[] = 0;
                }

                foreach ($forms as $form) {
                    $files    = tb_form::where('id_form', $form->id)->where('id_mhs', $maha->id)->get();
                    if (count($files) == 0) {
                        $file[]  = array(count($files));
                    } else {
                        foreach ($files as $get) {
                            $file[]  = array(count($files), $get->set_verif, $get->set_failed);
                        }
                    }
                }

                $status[] = array($maha->nama, $file);
                $file = [];
            }
        }

        if (count($mhs2) == 0) {
            $kolo[] = 0;
            $semi[] = 0;
            $sida[] = 0;
            $status = [];
        } else {
            foreach ($mhs2 as $maha2) {
                $get_kl  = tb_daftar::where('ket', 'kl')->where('id_mhs', $maha2->id)->where('set_verif', 1)->first();
                $get_sm  = tb_daftar::where('ket', 'sm')->where('id_mhs', $maha2->id)->where('set_verif', 1)->first();
                $get_sd  = tb_daftar::where('ket', 'sd')->where('id_mhs', $maha2->id)->where('set_verif', 1)->first();

                if ($get_kl != null) {
                    $kolo[] = $get_kl->set_verif;
                } else {
                    $kolo[] = 0;
                }

                if ($get_sm != null) {
                    $semi[] = $get_sm->set_verif;
                } else {
                    $semi[] = 0;
                }

                if ($get_sd != null) {
                    $sida[] = $get_sd->set_verif;
                } else {
                    $sida[] = 0;
                }

                foreach ($forms as $form) {
                    $files    = tb_form::where('id_form', $form->id)->where('id_mhs', $maha2->id)->get();
                    if (count($files) == 0) {
                        $file[]  = array(count($files));
                    } else {
                        foreach ($files as $get) {
                            $file[]  = array(count($files), $get->set_verif, $get->set_failed);
                        }
                    }
                }

                $status[] = array($maha2->nama, $file);
                $file = [];
            }
        }

        return view('dosen.dashboard', compact('datas', 'get_form', 'mhs', 'mhs2', 'kolo', 'semi', 'sida', 'forms', 'status'));
    }

    public function reset_d()
    {
        $user  = Auth::user();
        $datas = tb_dosen::where('id', $user->id_user)->get();

        return view('dosen.reset_pwd', compact('datas'));
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

        return redirect()->route('dashboard-d')->with('success', 'Password changed successfully!');
    }

    public function biodata_d()
    {
        $user  = Auth::user();
        $datas = tb_dosen::where('id', $user->id_user)->get();

        return view('dosen.biodata', compact('datas'));
    }

    public function form_kesediaan()
    {
        $user  = Auth::user();
        $datas = tb_dosen::where('id', $user->id_user)->get();

        return view('dosen.form_kesediaan', compact('datas', 'user'));
    }

    public function form_ttd()
    {
        $user  = Auth::user();
        $datas = tb_dosen::where('id', $user->id_user)->get();
        $mahas = tb_mahasiswa::where('id_dospem1', $user->id_user)->get();

        if (count($mahas) == 0) {
            $form = [];
        } else {
            foreach ($mahas as $mhs) {
                $get = tb_form::where('id_mhs', $mhs->id)->where('id_form', 16)->where('ttd_dospem', 1)->get();
                $form = [];
                if (count($get) != 0) {
                    foreach ($get as $fr) {
                        $form[] = array($fr->id, $fr->id_mhs, $fr->id_form, $fr->file, $fr->ket, $mhs->getProdi->nama, $mhs->nama, $mhs->nim);
                    }
                }
            }
        }

        return view('dosen.form_ttd', compact('datas', 'user', 'mahas', 'form'));
    }

    public function form_ttd_submit(Request $request, $id)
    {
        $user  = Auth::user();
        $datas = tb_dosen::where('id', $user->id_user)->get();
        $form  = tb_form::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $form->id_mhs)->first();
        $mahas = tb_mahasiswa::where('id', $form->id_mhs)->get();

        $judul   = $form->judul;
        $tanggal = $form->tanggal;
        $pdf     = PDF::loadview('form_pdf.pdf_form_018_d', compact('mahas', 'judul', 'tanggal'))->setPaper('A4', 'portrait');

        $form->set_failed = 0;
        $form->set_verif  = 0;
        $form->ttd_dospem = 0;

        // Check File Exist
        $file             = Storage::disk('local')->exists('pdf/' . $mhs->nim . '/pdf_form_018.pdf');

        // Delete File
        if ($file) {
            Storage::disk('local')->delete('pdf/' . $mhs->nim . '/pdf_form_018.pdf');
        }

        $namadir      = 'pdf/' . $mhs->nim . '/pdf_form_018.pdf';
        $form->file   = $namadir;

        //save to directory
        Storage::disk('local')->put('pdf/' . $mhs->nim . '/pdf_form_018.pdf', $pdf->output());

        $form->save();

        return redirect()->route('form-ttd')->with('success', 'Berhasil Tanda Tangan Form');
    }


    public function biodata_ds(Request $request)
    {
        $user  = Auth::user();
        $datas = tb_dosen::where('id', $user->id_user)->get();

        $bio   = tb_dosen::findOrFail($user->id_user);

        // dd($request->signed);

        if ($request->hasFile('gambar')) {
            $dir      = Storage::disk('local')->put('file_form/data_dosen/', $request->gambar);
            $bio->ttd = $dir;
        } elseif ($request->signed != "") {
            $folderPath     = 'file_form/data_dosen/'; // upload/
            $image_parts    = explode(";base64,", $request->signed); // image/png, sdfghjcnm
            $image_type_aux = explode("image/", $image_parts[0]); // "", png
            $image_type     = $image_type_aux[1]; // png
            $image_base64   = base64_decode($image_parts[1]); // agshgd
            $file           = $folderPath . uniqid() . '.' . $image_type; // upload/12.png

            file_put_contents($file, $image_base64);

            $bio->ttd       = $file;
        }

        $bio->save();

        return redirect()->route('biodata-d')->with('success', 'Sukses Menyimpan Data');
    }

    public function kolokium_d()
    {
        $user    = Auth::user();
        $datas   = tb_dosen::where('id', $user->id_user)->get();

        $dospem  = tb_daftar::where('ket', 'kl')->where('set_verif', 1)->where('id_dosen', $user->id_user)->where('set_bap_d', 0)->get();
        $history = tb_daftar::where('ket', 'kl')->where('id_dosen', $user->id_user)->where('set_bap_d', 1)->get();

        if (count($dospem) == 0) {
            $mhs = [];
        } else {
            foreach ($dospem as $dp) {
                $get   = tb_mahasiswa::where('id', $dp->id_mhs)->first();
                $tgl = $dp->tgl . ' ' . $dp->waktu;
                $date = Carbon::parse($tgl);

                if ($date->isPast()) {
                    $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, 'sudah kolokium');
                } else {
                    $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, '');
                }
            }
        }

        $mhs2 = [];
        $mhs3 = [];

        if (count($history) != 0) {
            foreach ($history as $hs) {
                $get    = tb_mahasiswa::where('id', $hs->id_mhs)->first();
                $get2   = tb_nilai_bap::where('id_mhs', $hs->id_mhs)->where('status', 'dosen')->where('ket', 'kl')->first();
                if ($get2->kelayakan == 'ya' && $get2->keputusan == 'proses') {
                    $mhs2[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
                } else {
                    $mhs3[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
                }
            }
        }

        return view('dosen.kolokium_pembimbing', compact('datas', 'mhs', 'mhs2', 'mhs3'));
    }

    public function kolokium_m()
    {
        $user    = Auth::user();
        $datas   = tb_dosen::where('id', $user->id_user)->get();

        $moderator = tb_daftar::where('ket', 'kl')->where('set_verif', 1)->where('id_moderator', $user->id_user)->where('set_bap_m', 0)->get();
        $history   = tb_daftar::where('ket', 'kl')->where('id_moderator', $user->id_user)->where('set_bap_m', 1)->get();

        if (count($moderator) == 0) {
            $mhs = [];
        } else {
            foreach ($moderator as $mode) {
                $get   = tb_mahasiswa::where('id', $mode->id_mhs)->first();
                $tgl = $mode->tgl . ' ' . $mode->waktu;
                $date = Carbon::parse($tgl);

                if ($date->isPast()) {
                    $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, 'sudah kolokium');
                } else {
                    $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, '');
                }
            }
        }

        $mhs2 = [];
        $mhs3 = [];

        if (count($history) != 0) {
            foreach ($history as $hs) {
                $get    = tb_mahasiswa::where('id', $hs->id_mhs)->first();
                $get2   = tb_nilai_bap::where('id_mhs', $hs->id_mhs)->where('status', 'moderator')->where('ket', 'kl')->first();

                if ($get2->kelayakan == 'ya') {
                    $mhs2[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
                } else {
                    $mhs3[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
                }
            }
        }

        return view('dosen.kolokium_moderator', compact('datas', 'mhs', 'mhs2', 'mhs3'));
    }

    public function seminar_d()
    {
        $user    = Auth::user();
        $datas   = tb_dosen::where('id', $user->id_user)->get();

        $dospem  = tb_daftar::where('ket', 'sm')->where('set_verif', 1)->where('id_dosen', $user->id_user)->where('set_bap_d', 0)->get();
        $history = tb_daftar::where('ket', 'sm')->where('id_dosen', $user->id_user)->where('set_bap_d', 1)->get();

        if (count($dospem) == 0) {
            $mhs = [];
        } else {
            foreach ($dospem as $dp) {
                $get  = tb_mahasiswa::where('id', $dp->id_mhs)->first();
                $tgl  = $dp->tgl . ' ' . $dp->waktu;
                $date = Carbon::parse($tgl);

                if ($date->isPast()) {
                    $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, 'sudah seminar');
                } else {
                    $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, '');
                }
            }
        }

        $mhs2 = [];
        $mhs3 = [];
        if (count($history) != 0) {
            foreach ($history as $hs) {
                $get    = tb_mahasiswa::where('id', $hs->id_mhs)->first();
                $get2   = tb_nilai_bap::where('id_mhs', $hs->id_mhs)->where('status', 'dosen')->where('ket', 'sm')->first();
                if ($get2->nilai1 != null && $get2->nilai2 != null && $get2->nilai3 != null) {
                    $mhs2[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
                } else {
                    $mhs3[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
                }
            }
        }

        return view('dosen.seminar_pembimbing', compact('datas', 'mhs', 'mhs2', 'mhs3'));
    }

    public function seminar_m()
    {
        $user    = Auth::user();
        $datas   = tb_dosen::where('id', $user->id_user)->get();

        $moderator = tb_daftar::where('ket', 'sm')->where('set_verif', 1)->where('id_moderator', $user->id_user)->where('set_bap_m', 0)->get();
        $history   = tb_daftar::where('ket', 'sm')->where('id_moderator', $user->id_user)->where('set_bap_m', 1)->get();

        if (count($moderator) == 0) {
            $mhs = [];
        } else {
            foreach ($moderator as $mode) {
                $get   = tb_mahasiswa::where('id', $mode->id_mhs)->first();
                $tgl   = $mode->tgl . ' ' . $mode->waktu;
                $date  = Carbon::parse($tgl);

                if ($date->isPast()) {
                    $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, 'sudah seminar');
                } else {
                    $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, '');
                }
            }
        }

        $mhs2 = [];
        $mhs3 = [];
        if (count($history) != 0) {
            foreach ($history as $hs) {
                $get    = tb_mahasiswa::where('id', $hs->id_mhs)->first();
                $get2   = tb_nilai_bap::where('id_mhs', $hs->id_mhs)->where('status', 'moderator')->where('ket', 'sm')->first();
                if ($get2->nilai1 != null && $get2->nilai2 != null && $get2->nilai3 != null) {
                    $mhs2[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
                } else {
                    $mhs3[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
                }
            }
        }

        return view('dosen.seminar_moderator', compact('datas', 'mhs', 'mhs2', 'mhs3'));
    }

    public function sidang_d()
    {
        $user    = Auth::user();
        $datas   = tb_dosen::where('id', $user->id_user)->get();

        $dospem  = tb_daftar::where('ket', 'sd')->where('set_verif', 1)->where('id_dosen', $user->id_user)->where('set_bap_d', 0)->get();
        $history = tb_daftar::where('ket', 'sd')->where('id_dosen', $user->id_user)->where('set_bap_d', 1)->get();

        $ulang   = tb_daftar::where('ket', 'sd2')->where('set_verif', 1)->where('id_dosen', $user->id_user)->where('set_bap_d', 0)->get();
        $sejarah = tb_daftar::where('ket', 'sd2')->where('id_dosen', $user->id_user)->where('set_bap_d', 1)->get();

        if (count($dospem) == 0) {
            $mhs = [];
        } else {
            foreach ($dospem as $dp) {
                $get   = tb_mahasiswa::where('id', $dp->id_mhs)->first();
                $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama);
            }
        }

        if (count($history) == 0) {
            $mhs2 = [];
        } else {
            foreach ($history as $hs) {
                $get    = tb_mahasiswa::where('id', $hs->id_mhs)->first();
                $get2   = tb_nilai_bap::where('id_mhs', $hs->id_mhs)->where('status', 'dosen')->where('ket', 'sd')->first();
                $mhs2[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
            }
        }

        if (count($ulang) == 0) {
            $mhs3 = [];
        } else {
            foreach ($ulang as $ul) {
                $get   = tb_mahasiswa::where('id', $ul->id_mhs)->first();
                $mhs3[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama);
            }
        }

        if (count($sejarah) == 0) {
            $mhs4 = [];
        } else {
            foreach ($sejarah as $sj) {
                $get    = tb_mahasiswa::where('id', $sj->id_mhs)->first();
                $get2   = tb_nilai_bap::where('id_mhs', $sj->id_mhs)->where('status', 'dosen')->where('ket', 'sd2')->first();
                $mhs4[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
            }
        }

        return view('dosen.sidang_pembimbing', compact('datas', 'mhs', 'mhs2', 'mhs3', 'mhs4'));
    }

    public function sidang_j()
    {
        $user    = Auth::user();
        $datas   = tb_dosen::where('id', $user->id_user)->get();

        $dosji   = tb_daftar::where('ket', 'sd')->where('set_verif', 1)->where('id_dosji', $user->id_user)->where('set_bap_m', 0)->get();
        $history = tb_daftar::where('ket', 'sd')->where('id_dosji', $user->id_user)->where('set_bap_m', 1)->get();

        $ulang   = tb_daftar::where('ket', 'sd2')->where('set_verif', 1)->where('id_dosji', $user->id_user)->where('set_bap_m', 0)->get();
        $sejarah = tb_daftar::where('ket', 'sd2')->where('id_dosji', $user->id_user)->where('set_bap_m', 1)->get();

        if (count($dosji) == 0) {
            $mhs = [];
        } else {
            foreach ($dosji as $dj) {
                $get   = tb_mahasiswa::where('id', $dj->id_mhs)->first();
                $mhs[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama);
            }
        }

        if (count($history) == 0) {
            $mhs2 = [];
        } else {
            foreach ($history as $hs) {
                $get    = tb_mahasiswa::where('id', $hs->id_mhs)->first();
                $get2   = tb_nilai_bap::where('id_mhs', $hs->id_mhs)->where('status', 'moderator')->where('ket', 'sd')->first();
                $mhs2[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
            }
        }

        if (count($ulang) == 0) {
            $mhs3 = [];
        } else {
            foreach ($ulang as $ul) {
                $get   = tb_mahasiswa::where('id', $ul->id_mhs)->first();
                $mhs3[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama);
            }
        }

        if (count($sejarah) == 0) {
            $mhs4 = [];
        } else {
            foreach ($sejarah as $sj) {
                $get    = tb_mahasiswa::where('id', $sj->id_mhs)->first();
                $get2   = tb_nilai_bap::where('id_mhs', $sj->id_mhs)->where('status', 'moderator')->where('ket', 'sd2')->first();
                $mhs4[] = array($get->id, $get->nim, $get->nama, $get->getProdi->nama, $get2->tgl, $get2->id);
            }
        }

        return view('dosen.sidang_penguji', compact('datas', 'mhs', 'mhs2', 'mhs3', 'mhs4'));
    }




    public function kl_bap_d($id)
    {
        $user   = Auth::user();
        $datas  = tb_dosen::where('id', $user->id_user)->get();
        $kode   = tb_daftar::where('id_mhs', $id)->where('ket', 'kl')->first();
        $mhs    = tb_mahasiswa::where('id', $kode->id_mhs)->first();

        return view('dosen.input_kl_bap_d', compact('datas', 'kode', 'mhs'));
    }

    public function kl_bap_m($id)
    {
        $user   = Auth::user();
        $datas  = tb_dosen::where('id', $user->id_user)->get();
        $kode   = tb_daftar::where('id_mhs', $id)->where('ket', 'kl')->first();
        $mhs    = tb_mahasiswa::where('id', $kode->id_mhs)->first();

        return view('dosen.input_kl_bap_m', compact('datas', 'kode', 'mhs'));
    }

    public function sm_bap_d($id)
    {
        $user   = Auth::user();
        $datas  = tb_dosen::where('id', $user->id_user)->get();
        $kode   = tb_daftar::where('id_mhs', $id)->where('ket', 'sm')->first();
        $mhs    = tb_mahasiswa::where('id', $kode->id_mhs)->first();

        return view('dosen.input_sm_bap_d', compact('datas', 'kode', 'mhs'));
    }

    public function sm_bap_m($id)
    {
        $user   = Auth::user();
        $datas  = tb_dosen::where('id', $user->id_user)->get();
        $kode   = tb_daftar::where('id_mhs', $id)->where('ket', 'sm')->first();
        $mhs    = tb_mahasiswa::where('id', $kode->id_mhs)->first();
        $pembahas = tb_mahasiswa::where('id', $kode->id_pembahas)->first();
        $mahasiswas = tb_mahasiswa::where('id', '!=', $user->id_user)->get();
        $kartu_sm = tb_kartu_seminar::where('id_seminar', $kode->id)->get();

        return view('dosen.input_sm_bap_m', compact('datas', 'kode', 'mhs', 'pembahas', 'mahasiswas', 'kartu_sm'));
    }

    public function sd_bap_d($id)
    {
        $user   = Auth::user();
        $datas  = tb_dosen::where('id', $user->id_user)->get();
        $kode   = tb_daftar::where('id_mhs', $id)->where('ket', 'sd')->first();
        $mhs    = tb_mahasiswa::where('id', $kode->id_mhs)->first();

        return view('dosen.input_sd_bap_d', compact('datas', 'kode', 'mhs'));
    }

    public function sd_bap_j($id)
    {
        $user   = Auth::user();
        $datas  = tb_dosen::where('id', $user->id_user)->get();
        $kode   = tb_daftar::where('id_mhs', $id)->where('ket', 'sd')->first();
        $mhs    = tb_mahasiswa::where('id', $kode->id_mhs)->first();

        return view('dosen.input_sd_bap_j', compact('datas', 'kode', 'mhs'));
    }

    public function sd_bap_du($id)
    {
        $user   = Auth::user();
        $datas  = tb_dosen::where('id', $user->id_user)->get();
        $kode   = tb_daftar::where('id_mhs', $id)->where('ket', 'sd2')->first();
        $mhs    = tb_mahasiswa::where('id', $kode->id_mhs)->first();

        return view('dosen.input_sd_bap_du', compact('datas', 'kode', 'mhs'));
    }

    public function sd_bap_ju($id)
    {
        $user   = Auth::user();
        $datas  = tb_dosen::where('id', $user->id_user)->get();
        $kode   = tb_daftar::where('id_mhs', $id)->where('ket', 'sd2')->first();
        $mhs    = tb_mahasiswa::where('id', $kode->id_mhs)->first();

        return view('dosen.input_sd_bap_ju', compact('datas', 'kode', 'mhs'));
    }

    public function kl_bap_sd(Request $request, $id)
    {
        $user    = Auth::user();

        $bap  = new tb_nilai_bap;
        $bap->id_dosen  = $user->id_user;
        $bap->id_mhs    = $request->input('id_mhs');
        $bap->tgl       = $request->input('tgl');
        $bap->kelayakan = $request->input('kelayakan');
        $bap->keputusan = $request->input('keputusan');
        $bap->status    = 'dosen';
        $bap->ket       = 'kl';

        $bap->save();

        $update = tb_daftar::findOrFail($id);
        $update->set_bap_d = 1;
        $update->save();

        return redirect()->route('kolokium-d')->with('success', 'Sukses Input Nilai BAP');
    }

    public function kl_bap_sm(Request $request, $id)
    {
        $user    = Auth::user();

        $bap  = new tb_nilai_bap;
        $bap->id_dosen  = $user->id_user;
        $bap->id_mhs    = $request->input('id_mhs');
        $bap->kelayakan = $request->input('kelayakan');
        $bap->tgl       = $request->input('tgl');
        $bap->status    = 'moderator';
        $bap->ket       = 'kl';

        $bap->save();

        $update = tb_daftar::findOrFail($id);
        $update->set_bap_m = 1;
        $update->save();

        return redirect()->route('kolokium-m')->with('success', 'Sukses Input Nilai BAP');
    }

    public function sm_bap_sd(Request $request, $id)
    {
        $this->validate($request, [
            'nilai1'  => 'required',
            'nilai2'  => 'required',
            'nilai3'  => 'required',

        ]);

        $user    = Auth::user();

        $bap  = new tb_nilai_bap;
        $bap->id_dosen = $user->id_user;
        $bap->id_mhs   = $request->input('id_mhs');
        $bap->nilai1   = $request->input('nilai1');
        $bap->nilai2   = $request->input('nilai2');
        $bap->nilai3   = $request->input('nilai3');
        $bap->tgl      = $request->input('tgl');
        $bap->status   = 'dosen';
        $bap->ket      = 'sm';

        $bap->save();

        $update = tb_daftar::findOrFail($id);
        $update->set_bap_d = 1;
        $update->save();

        return redirect()->route('seminar-d')->with('success', 'Sukses Input Nilai BAP');
    }

    public function sm_bap_sm(Request $request, $id)
    {
        $this->validate($request, [
            'nilai1'  => 'required',
            'nilai2'  => 'required',
            'nilai3'  => 'required',
            'nilai_pembahas'  => 'required',
        ]);

        $user    = Auth::user();

        $bap  = new tb_nilai_bap;
        $bap->id_dosen = $user->id_user;
        $bap->id_mhs   = $request->input('id_mhs');
        $bap->nilai1   = $request->input('nilai1');
        $bap->nilai2   = $request->input('nilai2');
        $bap->nilai3   = $request->input('nilai3');
        $bap->tgl      = $request->input('tgl');
        $bap->status   = 'moderator';
        $bap->ket      = 'sm';
        $bap->save();

        $update = tb_daftar::findOrFail($id);
        $update->set_bap_m = 1;
        $update->save();

        $pembahas = new tb_nilai_pembahas;
        $pembahas->id_seminar = $id;
        $pembahas->id_pembahas = $request->input('pembahas');
        $pembahas->nilai_pembahas = $request->input('nilai_pembahas');
        $pembahas->save();

        $id_hadir = $request->input('id_hadir');
        for ($i = 0; $i < count($id_hadir); $i++) {
            $hadir2   = tb_kartu_seminar::findOrFail($id_hadir[$i]);

            if ($request->input('hadir' . ($id_hadir[$i])) == 1) {
                $hadir2->hadir = 1;
                $hadir2->paraf = 1;
                $hadir2->save();

                if ($request->input('nilai_forum' . ($id_hadir[$i])) != null) {
                    $forum = new tb_nilai_forum;
                    $forum->id_seminar = $id;
                    $forum->id_mhs = $hadir2->id_mhs;
                    $forum->nilai = $request->input('nilai_forum' . ($id_hadir[$i]) . '');
                    $forum->keterangan = $request->input('ket_forum' . ($id_hadir[$i]) . '');
                    $forum->save();
                }
            } else {
                $hadir2->hadir = 0;
                $hadir2->save();
            }
        }

        return redirect()->route('seminar-m')->with('success', 'Sukses Input Form Seminar Moderator');
    }

    public function sd_bap_sd(Request $request, $id)
    {
        $this->validate($request, [
            'nilai1'  => 'required',
            'nilai2'  => 'required',
            'nilai3'  => 'required',

        ]);

        $user    = Auth::user();

        $bap  = new tb_nilai_bap;
        $bap->id_dosen = $user->id_user;
        $bap->id_mhs   = $request->input('id_mhs');
        $bap->nilai1   = $request->input('nilai1');
        $bap->nilai2   = $request->input('nilai2');
        $bap->nilai3   = $request->input('nilai3');
        $bap->tgl      = $request->input('tgl');
        $bap->status   = 'dosen';
        $bap->ket      = $request->input('ket');

        $bap->save();

        $update = tb_daftar::findOrFail($id);
        $update->set_bap_d = 1;
        $update->save();

        return redirect()->route('sidang-d')->with('success', 'Sukses Input Nilai BAP');
    }

    public function sd_bap_sj(Request $request, $id)
    {
        $this->validate($request, [
            'nilai1'  => 'required',
            'nilai2'  => 'required',
            'nilai3'  => 'required',

        ]);

        $user    = Auth::user();

        $bap  = new tb_nilai_bap;
        $bap->id_dosen = $user->id_user;
        $bap->id_mhs   = $request->input('id_mhs');
        $bap->nilai1   = $request->input('nilai1');
        $bap->nilai2   = $request->input('nilai2');
        $bap->nilai3   = $request->input('nilai3');
        $bap->tgl      = $request->input('tgl');
        $bap->status   = 'moderator';
        $bap->ket      = $request->input('ket');

        $bap->save();

        $update = tb_daftar::findOrFail($id);
        $update->set_bap_m = 1;
        $update->save();

        return redirect()->route('sidang-j')->with('success', 'Sukses Input Nilai BAP');
    }


    // EDIT DAN UPDATE

    public function kl_bap_ed($id)
    {
        $user   = Auth::user();
        $datas  = tb_panitia::where('id', $user->id_user)->get();
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();

        return view('dosen.edit_kl_bap_d', compact('datas', 'bap', 'data', 'dosen', 'mhs'));
    }

    public function kl_bap_em($id)
    {
        $user   = Auth::user();
        $datas  = tb_panitia::where('id', $user->id_user)->get();
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();

        return view('dosen.edit_kl_bap_m', compact('datas', 'bap', 'data', 'dosen', 'mhs'));
    }

    public function sm_bap_ed($id)
    {
        $user   = Auth::user();
        $datas  = tb_panitia::where('id', $user->id_user)->get();
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();

        return view('dosen.edit_sm_bap_d', compact('datas', 'bap', 'data', 'dosen', 'mhs'));
    }

    public function sm_bap_em($id)
    {
        $user   = Auth::user();
        $datas  = tb_panitia::where('id', $user->id_user)->get();
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pembahas = tb_mahasiswa::where('id', $data->id_pembahas)->first();
        $mahasiswas = tb_mahasiswa::where('id', '!=', $user->id_user)->get();
        $kartu_sm = tb_kartu_seminar::where('id_seminar', $data->id)->get();
        $nilai_pembahas = tb_nilai_pembahas::where('id_seminar', $data->id)->first();

        foreach ($kartu_sm as $kartu) {
            $list = tb_nilai_forum::where('id_seminar', $kartu->id_seminar)->where('id_mhs', $kartu->id_mhs)->first();
            $maha = tb_mahasiswa::where('id', $kartu->id_mhs)->first();

            if ($list == null) {
                $forum[] = array($kartu->id, $maha->nama, $maha->nim, $kartu->hadir, null);
            } else {
                $forum[] = array($kartu->id, $maha->nama, $maha->nim, $kartu->hadir, $list->id, $list->nilai, $list->keterangan);
            }
        }

        return view('dosen.edit_sm_bap_m', compact('datas', 'bap', 'data', 'dosen', 'mhs', 'pembahas', 'mahasiswas', 'kartu_sm', 'nilai_pembahas', 'forum'));
    }

    public function sd_bap_ed($id)
    {
        $user   = Auth::user();
        $datas  = tb_panitia::where('id', $user->id_user)->get();
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();

        return view('dosen.edit_sd_bap_d', compact('datas', 'bap', 'data', 'dosen', 'mhs'));
    }

    public function sd_bap_ej($id)
    {
        $user   = Auth::user();
        $datas  = tb_panitia::where('id', $user->id_user)->get();
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();

        return view('dosen.edit_sd_bap_j', compact('datas', 'bap', 'data', 'dosen', 'mhs'));
    }

    public function sd_bap_edu($id)
    {
        $user   = Auth::user();
        $datas  = tb_panitia::where('id', $user->id_user)->get();
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();

        return view('dosen.edit_sd_bap_du', compact('datas', 'bap', 'data', 'dosen', 'mhs'));
    }

    public function sd_bap_eju($id)
    {
        $user   = Auth::user();
        $datas  = tb_panitia::where('id', $user->id_user)->get();
        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();

        return view('dosen.edit_sd_bap_ju', compact('datas', 'bap', 'data', 'dosen', 'mhs'));
    }

    //edit update
    public function kl_bap_ud(Request $request, $id)
    {

        $bap            = tb_nilai_bap::findOrFail($id);
        $bap->tgl       = $request->input('tgl');
        $bap->kelayakan = $request->input('kelayakan');
        $bap->keputusan = $request->input('keputusan');

        // if ($request->hasFile('gambar')) {
        //     $dir      = Storage::disk('local')->put('file_form/bap/', $request->gambar);
        //     $bap->ttd = $dir;
        // } else {
        //     $folderPath     = 'file_form/bap/'; // upload/
        //     $image_parts    = explode(";base64,", $request->signed); // image/png, sdfghjcnm
        //     $image_type_aux = explode("image/", $image_parts[0]); // "", png
        //     $image_type     = $image_type_aux[1]; // png
        //     $image_base64   = base64_decode($image_parts[1]); // agshgd
        //     $file           = $folderPath . uniqid() . '.' . $image_type; // upload/12.png

        //     file_put_contents($file, $image_base64);

        //     $bap->ttd       = $file;
        // }

        $bap->save();

        return redirect()->route('kolokium-d')->with('success', 'Sukses Edit Nilai BAP');
    }

    public function kl_bap_um(Request $request, $id)
    {

        $bap            = tb_nilai_bap::findOrFail($id);
        $bap->tgl       = $request->input('tgl');
        $bap->kelayakan = $request->input('kelayakan');

        // if ($request->hasFile('gambar')) {
        //     $dir      = Storage::disk('local')->put('file_form/bap/', $request->gambar);
        //     $bap->ttd = $dir;
        // } else {
        //     $folderPath     = 'file_form/bap/'; // upload/
        //     $image_parts    = explode(";base64,", $request->signed); // image/png, sdfghjcnm
        //     $image_type_aux = explode("image/", $image_parts[0]); // "", png
        //     $image_type     = $image_type_aux[1]; // png
        //     $image_base64   = base64_decode($image_parts[1]); // agshgd
        //     $file           = $folderPath . uniqid() . '.' . $image_type; // upload/12.png

        //     file_put_contents($file, $image_base64);

        //     $bap->ttd       = $file;
        // }

        $bap->save();

        return redirect()->route('kolokium-m')->with('success', 'Sukses Edit Nilai BAP');
    }

    public function sm_bap_ud(Request $request, $id)
    {

        $bap            = tb_nilai_bap::findOrFail($id);
        $bap->nilai1    = $request->input('nilai1');
        $bap->nilai2    = $request->input('nilai2');
        $bap->nilai3    = $request->input('nilai3');
        $bap->tgl       = $request->input('tgl');

        $bap->save();

        return redirect()->route('seminar-d')->with('success', 'Sukses Edit Nilai BAP');
    }

    public function sm_bap_um(Request $request, $id)
    {

        $bap            = tb_nilai_bap::findOrFail($id);
        $bap->nilai1    = $request->input('nilai1');
        $bap->nilai2    = $request->input('nilai2');
        $bap->nilai3    = $request->input('nilai3');
        $bap->tgl       = $request->input('tgl');
        $bap->save();

        $daftar = tb_daftar::where('ket', 'sm')->where('id_mhs', $bap->id_mhs)->where('id_moderator', $bap->id_dosen)->first();

        $pembahas = tb_nilai_pembahas::where('id_seminar', $daftar->id)->first();
        $pembahas->nilai_pembahas = $request->input('nilai_pembahas');
        $pembahas->save();

        $id_hadir = $request->input('id_hadir');

        for ($i = 0; $i < count($id_hadir); $i++) {
            $hadir2   = tb_kartu_seminar::findOrFail($id_hadir[$i]);

            if ($request->input('hadir' . ($id_hadir[$i])) == 1) {
                $hadir2->hadir = 1;
                $hadir2->paraf = 1;
                $hadir2->save();

                if ($request->input('nilai_forum' . ($id_hadir[$i])) != null) {
                    $forum = tb_nilai_forum::where('id_seminar', $hadir2->id_seminar)->where('id_mhs', $hadir2->id_mhs)->first();

                    if ($forum == null) {
                        $forum = new tb_nilai_forum;
                        $forum->id_seminar = $hadir2->id_seminar;
                        $forum->id_mhs = $hadir2->id_mhs;
                        $forum->nilai = $request->input('nilai_forum' . ($id_hadir[$i]) . '');
                        $forum->keterangan = $request->input('ket_forum' . ($id_hadir[$i]) . '');
                        $forum->save();
                    } else {
                        $forum->id_mhs = $hadir2->id_mhs;
                        $forum->nilai = $request->input('nilai_forum' . ($id_hadir[$i]) . '');
                        $forum->keterangan = $request->input('ket_forum' . ($id_hadir[$i]) . '');
                        $forum->save();
                    }
                } else {
                    $forum = tb_nilai_forum::where('id_seminar', $hadir2->id_seminar)->where('id_mhs', $hadir2->id_mhs)->first();

                    if ($forum != null) {
                        $forum->delete();
                    }
                }
            } else {
                $hadir2->hadir = 0;
                $hadir2->paraf = 0;
                $hadir2->save();

                if ($request->input('nilai_forum' . ($id_hadir[$i])) != null) {
                    $forum = tb_nilai_forum::where('id_seminar', $hadir2->id_seminar)->where('id_mhs', $hadir2->id_mhs);
                    if ($forum != null) {
                        $forum->delete();
                    }
                }
            }
        }

        return redirect()->route('seminar-m')->with('success', 'Sukses Edit Form Seminar');
    }

    public function sd_bap_ud(Request $request, $id)
    {

        $bap            = tb_nilai_bap::findOrFail($id);
        $bap->nilai1    = $request->input('nilai1');
        $bap->nilai2    = $request->input('nilai2');
        $bap->nilai3    = $request->input('nilai3');
        $bap->tgl       = $request->input('tgl');

        if ($request->hasFile('gambar')) {
            $dir      = Storage::disk('local')->put('file_form/bap/', $request->gambar);
            $bap->ttd = $dir;
        } else {
            $folderPath     = 'file_form/bap/'; // upload/
            $image_parts    = explode(";base64,", $request->signed); // image/png, sdfghjcnm
            $image_type_aux = explode("image/", $image_parts[0]); // "", png
            $image_type     = $image_type_aux[1]; // png
            $image_base64   = base64_decode($image_parts[1]); // agshgd
            $file           = $folderPath . uniqid() . '.' . $image_type; // upload/12.png

            file_put_contents($file, $image_base64);

            $bap->ttd       = $file;
        }

        $bap->save();

        return redirect()->route('sidang-d')->with('success', 'Sukses Edit Nilai BAP');
    }

    public function sd_bap_uj(Request $request, $id)
    {

        $bap            = tb_nilai_bap::findOrFail($id);
        $bap->nilai1    = $request->input('nilai1');
        $bap->nilai2    = $request->input('nilai2');
        $bap->nilai3    = $request->input('nilai3');
        $bap->tgl       = $request->input('tgl');

        if ($request->hasFile('gambar')) {
            $dir      = Storage::disk('local')->put('file_form/bap/', $request->gambar);
            $bap->ttd = $dir;
        } else {
            $folderPath     = 'file_form/bap/'; // upload/
            $image_parts    = explode(";base64,", $request->signed); // image/png, sdfghjcnm
            $image_type_aux = explode("image/", $image_parts[0]); // "", png
            $image_type     = $image_type_aux[1]; // png
            $image_base64   = base64_decode($image_parts[1]); // agshgd
            $file           = $folderPath . uniqid() . '.' . $image_type; // upload/12.png

            file_put_contents($file, $image_base64);

            $bap->ttd       = $file;
        }

        $bap->save();

        return redirect()->route('sidang-j')->with('success', 'Sukses Edit Nilai BAP');
    }

    public function sd_bap_udu(Request $request, $id)
    {

        $bap            = tb_nilai_bap::findOrFail($id);
        $bap->nilai1    = $request->input('nilai1');
        $bap->nilai2    = $request->input('nilai2');
        $bap->nilai3    = $request->input('nilai3');
        $bap->tgl       = $request->input('tgl');

        if ($request->hasFile('gambar')) {
            $dir      = Storage::disk('local')->put('file_form/bap/', $request->gambar);
            $bap->ttd = $dir;
        } else {
            $folderPath     = 'file_form/bap/'; // upload/
            $image_parts    = explode(";base64,", $request->signed); // image/png, sdfghjcnm
            $image_type_aux = explode("image/", $image_parts[0]); // "", png
            $image_type     = $image_type_aux[1]; // png
            $image_base64   = base64_decode($image_parts[1]); // agshgd
            $file           = $folderPath . uniqid() . '.' . $image_type; // upload/12.png

            file_put_contents($file, $image_base64);

            $bap->ttd       = $file;
        }

        $bap->save();

        return redirect()->route('sidang-d')->with('success', 'Sukses Edit Nilai BAP');
    }

    public function sd_bap_uju(Request $request, $id)
    {

        $bap            = tb_nilai_bap::findOrFail($id);
        $bap->nilai1    = $request->input('nilai1');
        $bap->nilai2    = $request->input('nilai2');
        $bap->nilai3    = $request->input('nilai3');
        $bap->tgl       = $request->input('tgl');

        if ($request->hasFile('gambar')) {
            $dir      = Storage::disk('local')->put('file_form/bap/', $request->gambar);
            $bap->ttd = $dir;
        } else {
            $folderPath     = 'file_form/bap/'; // upload/
            $image_parts    = explode(";base64,", $request->signed); // image/png, sdfghjcnm
            $image_type_aux = explode("image/", $image_parts[0]); // "", png
            $image_type     = $image_type_aux[1]; // png
            $image_base64   = base64_decode($image_parts[1]); // agshgd
            $file           = $folderPath . uniqid() . '.' . $image_type; // upload/12.png

            file_put_contents($file, $image_base64);

            $bap->ttd       = $file;
        }

        $bap->save();

        return redirect()->route('sidang-j')->with('success', 'Sukses Edit Nilai BAP');
    }

    public function list_form_004()
    {
        $user    = Auth::user();
        $datas   = tb_dosen::where('id', $user->id_user)->get();

        $getlist  = tb_supervisi::where('set_verif', 1)->where('id_dosen', $user->id_user)->where('set_ulang', 0)->where('set_form004', 0)->get();
        $history = tb_supervisi::where('set_form004', 1)->where('id_dosen', $user->id_user)->get();

        if (count($getlist) == 0) {
            $mhs = [];
            $listmhs = [];
        } else {
            foreach ($getlist as $gt) {
                $get   = tb_mahasiswa::where('id', $gt->id_mhs)->first();
                $getmhs = tb_mahasiswa::where('kelompok', $get->kelompok)->get();
                foreach ($getmhs as $data) {
                    $listmhs[] = array($data->kelompok, $data->nama, $data->nim);
                }
                $mhs[] = array($gt->id, $get->kelompok, $get->getProdi->nama);
            }
        }

        if (count($history) == 0) {
            $mhs2 = [];
            $listmhs2 = [];
        } else {
            foreach ($history as $hs) {
                $get    = tb_mahasiswa::where('id', $hs->id_mhs)->first();
                $getmhs2   = tb_mahasiswa::where('kelompok', $hs->kelompok)->get();
                foreach ($getmhs2 as $data) {
                    $listmhs2[] = array($data->kelompok, $data->nama, $data->nim);
                }
                $mhs2[] = array($hs->id, $get->kelompok, $get->getProdi->nama);
            }
        }

        return view('dosen.Form-004.supervisi_form_004', compact('datas', 'mhs', 'mhs2', 'listmhs', 'listmhs2'));
    }

    public function input_form_004($id)
    {
        $supervisi = tb_supervisi::where('id', $id)->first();
        $user = Auth::user();
        $datas = tb_dosen::where('id', $user->id_user)->get();
        $userData = tb_dosen::where('id', $user->id_user)->first();

        return view('dosen.Form-004.input_form_004', compact('supervisi', 'userData', 'datas'));
    }

    public function submit_form_004(Request $request, $id)
    {
        $supervisi = tb_supervisi::where('id', $id)->first();
        $user = Auth::user();
        $userData = tb_dosen::where('id', $user->id_user)->first();

        $save = new tb_form_004();
        $save->kelompok = $supervisi->kelompok;
        $save->dosen_penjajakan_id = $userData->id;
        $save->bidang_usaha = $supervisi->bidang_usaha;
        $save->tanggal_penjajakan = $request->input('tgl');
        $save->penilaian_1 = $request->value1;

        if ($request->value2 == 'Ada') {
            $save->penilaian_2 = $request->isian_value2;
        } else {
            $save->penilaian_2 = $request->value2;
        }

        $save->penilaian_3 = $request->value3;
        $save->penilaian_4 = $request->value4;
        $save->penilaian_5 = $request->value5;

        if ($request->value6[0] != null) {
            $save->penilaian_6 = implode(',', $request->value6);
        } else {
            $save->penilaian_6 = 'Tidak ada';
        }

        if ($request->value7[0] != null) {
            $save->penilaian_7 = implode(',', $request->value7);
        } else {
            $save->penilaian_7 = 'Tidak ada';
        }

        $save->save();

        $update = tb_supervisi::findOrFail($id);
        $update->set_form004 = 1;
        $update->save();

        return redirect()->route('list-form-004')->with('success', 'Sukses Input Nilai Supervisi');
    }

    public function list_form_015()
    {
        $user    = Auth::user();
        $datas   = tb_dosen::where('id', $user->id_user)->get();

        $getlist  = tb_supervisi::where('set_verif', 1)->where('id_dosen', $user->id_user)->where('set_ulang', 0)->where('set_form015', 0)->get();
        $history = tb_supervisi::where('set_form015', 1)->where('id_dosen', $user->id_user)->get();

        if (count($getlist) == 0) {
            $mhs = [];
            $listmhs = [];
        } else {
            foreach ($getlist as $gt) {
                $get   = tb_mahasiswa::where('id', $gt->id_mhs)->first();
                $getmhs = tb_mahasiswa::where('kelompok', $get->kelompok)->get();
                foreach ($getmhs as $data) {
                    $listmhs[] = array($data->kelompok, $data->nama, $data->nim);
                }
                $mhs[] = array($gt->id, $get->kelompok, $get->getProdi->nama);
            }
        }

        if (count($history) == 0) {
            $mhs2 = [];
            $listmhs2 = [];
        } else {
            foreach ($history as $hs) {
                $get    = tb_mahasiswa::where('id', $hs->id_mhs)->first();
                $getmhs2   = tb_mahasiswa::where('kelompok', $hs->kelompok)->get();
                foreach ($getmhs2 as $data) {
                    $listmhs2[] = array($data->kelompok, $data->nama, $data->nim);
                }
                $mhs2[] = array($hs->id, $get->kelompok, $get->getProdi->nama);
            }
        }

        return view('dosen.Form-015.supervisi_form_015', compact('datas', 'mhs', 'mhs2', 'listmhs', 'listmhs2'));
    }

    public function input_form_015($id)
    {
        $supervisi = tb_supervisi::where('id', $id)->first();
        $user = Auth::user();
        $datas = tb_dosen::where('id', $user->id_user)->get();
        $userData = tb_dosen::where('id', $user->id_user)->first();

        return view('dosen.Form-015.input_form_015', compact('supervisi', 'userData', 'datas'));
    }

    public function submit_form_015(Request $request, $id)
    {
        $supervisi = tb_supervisi::where('id', $id)->first();
        $user = Auth::user();
        $userData = tb_dosen::where('id', $user->id_user)->first();

        $save = new tb_form_015();
        $save->kelompok = $supervisi->kelompok;
        $save->dosen_supervisi_id = $userData->id;
        $save->bidang_usaha = $supervisi->bidang_usaha;
        $save->tanggal_supervisi = $request->input('tgl');
        $save->penilaian_1 = $request->value1;

        if ($request->value2 == 'Ada') {
            $save->penilaian_2 = $request->isian_value2;
        } else {
            $save->penilaian_2 = $request->value2;
        }

        $save->penilaian_3 = $request->value3;
        $save->penilaian_4 = $request->value4;
        $save->penilaian_5 = $request->value5;

        if ($request->value6[0] != null) {
            $save->penilaian_6 = implode(',', $request->value6);
        } else {
            $save->penilaian_6 = 'Tidak ada';
        }

        if ($request->value7[0] != null) {
            $save->penilaian_7 = implode(',', $request->value7);
        } else {
            $save->penilaian_7 = 'Tidak ada';
        }

        if ($request->value8[0] != null) {
            $save->penilaian_8 = implode(',', $request->value8);
        } else {
            $save->penilaian_8 = 'Tidak ada';
        }

        if ($request->value9[0] != null) {
            $save->penilaian_9 = implode(',', $request->value9);
        } else {
            $save->penilaian_9 = 'Tidak ada';
        }

        if ($request->value10[0] != null) {
            $save->penilaian_10 = implode(',', $request->value10);
        } else {
            $save->penilaian_10 = 'Tidak ada';
        }

        $save->save();

        $update = tb_supervisi::findOrFail($id);
        $update->set_form015 = 1;
        $update->save();

        return redirect()->route('list-form-015')->with('success', 'Sukses Input Nilai Supervisi');
    }
}
