<?php

namespace App\Http\Controllers;

use App\Models\tb_akademik;
use App\Models\tb_daftar;
use App\Models\tb_dosen;
use App\Models\tb_mahasiswa;
use App\Models\tb_nilai_bap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Carbon\Carbon;

class AkademikController extends Controller
{
    public function dashboard_a()
    {
        $user  = Auth::user();
        $datas = tb_akademik::where('id', $user->id_user)->get();

        $kl_daftar_inf = tb_daftar::where('ket', 'kl')->where('id_prodi', 1)->count();
        $kl_daftar_tek = tb_daftar::where('ket', 'kl')->where('id_prodi', 2)->count();

        $sm_daftar_inf = tb_daftar::where('ket', 'sm')->where('id_prodi', 1)->count();
        $sm_daftar_tek = tb_daftar::where('ket', 'sm')->where('id_prodi', 2)->count();

        $sd_daftar_inf = tb_daftar::where('ket', 'sd')->where('id_prodi', 1)->count();
        $sd_daftar_tek = tb_daftar::where('ket', 'sd')->where('id_prodi', 2)->count();

        $kolos_inf = tb_daftar::where('ket', 'kl')->where('id_prodi', 1)->get();
        $kolos_tek = tb_daftar::where('ket', 'kl')->where('id_prodi', 2)->get();

        $semis_inf = tb_daftar::where('ket', 'sm')->where('id_prodi', 1)->get();
        $semis_tek = tb_daftar::where('ket', 'sm')->where('id_prodi', 2)->get();

        $sidas_inf = tb_daftar::where('ket', 'sd')->where('id_prodi', 1)->get();
        $sidas_tek = tb_daftar::where('ket', 'sd')->where('id_prodi', 2)->get();

        $kl_sudah1 = [];
        $kl_belum1 = [];
        $kl_sudah2 = [];
        $kl_belum2 = [];

        $sm_sudah1 = [];
        $sm_belum1 = [];
        $sm_sudah2 = [];
        $sm_belum2 = [];

        $sd_sudah1 = [];
        $sd_belum1 = [];
        $sd_sudah2 = [];
        $sd_belum2 = [];

        // KOLO
        if (count($kolos_inf) > 0) {
            foreach ($kolos_inf as $inf) {
                $tgl = $inf->tgl . ' ' . $inf->waktu;
                $date = Carbon::parse($tgl);

                if ($date->isPast()) {
                    $kl_sudah1[] = array($inf->id);
                } else {
                    $kl_belum1[] = array($inf->id);
                }
            }
        }

        if (count($kolos_tek) > 0) {
            foreach ($kolos_tek as $tek) {
                $tgl2 = $tek->tgl . ' ' . $tek->waktu;
                $date2 = Carbon::parse($tgl2);

                if ($date2->isPast()) {
                    $kl_sudah2[] = array($tek->id);
                } else {
                    $kl_belum2[] = array($tek->id);
                }
            }
        }

        // SEMI
        if (count($semis_inf) > 0) {
            foreach ($semis_inf as $inf) {
                $tgl = $inf->tgl . ' ' . $inf->waktu;
                $date = Carbon::parse($tgl);

                if ($date->isPast()) {
                    $sm_sudah1[] = array($inf->id);
                } else {
                    $sm_belum1[] = array($inf->id);
                }
            }
        }

        if (count($semis_tek) > 0) {
            foreach ($semis_tek as $tek) {
                $tgl2 = $tek->tgl . ' ' . $tek->waktu;
                $date2 = Carbon::parse($tgl2);

                if ($date2->isPast()) {
                    $sm_sudah2[] = array($tek->id);
                } else {
                    $sm_belum2[] = array($tek->id);
                }
            }
        }

        // SIDA
        if (count($sidas_inf) > 0) {
            foreach ($sidas_inf as $inf) {
                $tgl = $inf->tgl . ' ' . $inf->waktu;
                $date = Carbon::parse($tgl);

                if ($date->isPast()) {
                    $sd_sudah1[] = array($inf->id);
                } else {
                    $sd_belum1[] = array($inf->id);
                }
            }
        }

        if (count($sidas_tek) > 0) {
            foreach ($sidas_tek as $tek) {
                $tgl2 = $tek->tgl . ' ' . $tek->waktu;
                $date2 = Carbon::parse($tgl2);

                if ($date2->isPast()) {
                    $sd_sudah2[] = array($tek->id);
                } else {
                    $sd_belum2[] = array($tek->id);
                }
            }
        }

        $kl_sudah_inf = count($kl_sudah1);
        $kl_belum_inf = count($kl_belum1);
        $kl_sudah_tek = count($kl_sudah2);
        $kl_belum_tek = count($kl_belum2);

        $sm_sudah_inf = count($sm_sudah1);
        $sm_belum_inf = count($sm_belum1);
        $sm_sudah_tek = count($sm_sudah2);
        $sm_belum_tek = count($sm_belum2);

        $sd_sudah_inf = count($sd_sudah1);
        $sd_belum_inf = count($sd_belum1);
        $sd_sudah_tek = count($sd_sudah2);
        $sd_belum_tek = count($sd_belum2);

        return view('akademik.dashboard', compact(
            'datas',
            'kl_daftar_inf',
            'kl_sudah_inf',
            'kl_belum_inf',
            'kl_daftar_tek',
            'kl_sudah_tek',
            'kl_belum_tek',

            'sm_daftar_inf',
            'sm_sudah_inf',
            'sm_belum_inf',
            'sm_daftar_tek',
            'sm_sudah_tek',
            'sm_belum_tek',

            'sd_daftar_inf',
            'sd_sudah_inf',
            'sd_belum_inf',
            'sd_daftar_tek',
            'sd_sudah_tek',
            'sd_belum_tek',
        ));
    }

    public function reset_a()
    {
        $user  = Auth::user();
        $datas = tb_akademik::where('id', $user->id_user)->get();

        return view('akademik.reset_pwd', compact('datas'));
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

        return redirect()->route('dashboard-a')->with('success', 'Password changed successfully!');
    }

    public function download_bap_kolokium()
    {
        $user        = Auth::user();
        $datas       = tb_akademik::where('id', $user->id_user)->get();
        $list_daftar = tb_daftar::where('ket', 'kl')->where('set_verif', 1)->get();
        $data        = [];

        foreach ($list_daftar as $list) {
            $mhs = tb_mahasiswa::where('id', $list->id_mhs)->first();

            if ($mhs != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'kl')->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'kl')->where('status', 'moderator')->first();

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

                $data[] = array($mhs->nama, $mhs->nim, $mhs->getProdi->nama, $get_nilai_d, $get_nilai_m, $mhs->id, $list->tgl);
            }
        }

        return view('akademik.bap_kolokium', compact('datas', 'data'));
    }

    public function prodi_filter_kl(Request $request)
    {
        $user        = Auth::user();
        $prodi       = $request->input('prodi');
        $datas       = tb_akademik::where('id', $user->id_user)->get();
        $list_daftar = tb_daftar::where('ket', 'kl')->where('set_verif', 1)->get();
        $data        = [];

        foreach ($list_daftar as $list) {
            $mhs = tb_mahasiswa::where('id', $list->id_mhs)->where('id_prodi', $prodi)->first();

            if ($mhs != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'kl')->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'kl')->where('status', 'moderator')->first();

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

                $data[] = array($mhs->nama, $mhs->nim, $mhs->getProdi->nama, $get_nilai_d, $get_nilai_m, $list->file, $list->tgl);
            }
        }

        return view('akademik.bap_kolokium', compact('datas', 'data'));
    }

    //Seminar

    public function download_bap_seminar()
    {
        $user        = Auth::user();
        $datas       = tb_akademik::where('id', $user->id_user)->get();
        $list_daftar = tb_daftar::where('ket', 'sm')->where('set_verif', 1)->get();
        $data        = [];

        foreach ($list_daftar as $list) {
            $mhs = tb_mahasiswa::where('id', $list->id_mhs)->first();

            if ($mhs != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'sm')->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'sm')->where('status', 'moderator')->first();

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

                $data[] = array($mhs->nama, $mhs->nim, $mhs->getProdi->nama, $get_nilai_d, $get_nilai_m, $list->file);
            }
        }

        return view('akademik.bap_seminar', compact('datas', 'data'));
    }

    public function prodi_filter_sm(Request $request)
    {
        $user        = Auth::user();
        $prodi       = $request->input('prodi');
        $datas       = tb_akademik::where('id', $user->id_user)->get();
        $list_daftar = tb_daftar::where('ket', 'sm')->where('set_verif', 1)->get();
        $data        = [];

        foreach ($list_daftar as $list) {
            $mhs = tb_mahasiswa::where('id', $list->id_mhs)->where('id_prodi', $prodi)->first();

            if ($mhs != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'sm')->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'sm')->where('status', 'moderator')->first();

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

                $data[] = array($mhs->nama, $mhs->nim, $mhs->getProdi->nama, $get_nilai_d, $get_nilai_m, $list->file);
            }
        }

        return view('akademik.bap_seminar', compact('datas', 'data'));
    }


    //Sidang

    public function download_bap_sidang()
    {
        $user         = Auth::user();
        $datas        = tb_akademik::where('id', $user->id_user)->get();
        $list_daftar  = tb_daftar::where('ket', 'sd')->where('set_verif', 1)->get();
        $list_daftar2 = tb_daftar::where('ket', 'sd2')->where('set_verif', 1)->get();
        $data         = [];
        $data2        = [];

        foreach ($list_daftar as $list) {
            $mhs = tb_mahasiswa::where('id', $list->id_mhs)->first();

            if ($mhs != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'sd')->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'sd')->where('status', 'moderator')->first();

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

                $data[] = array($mhs->nama, $mhs->nim, $mhs->getProdi->nama, $get_nilai_d, $get_nilai_m, $list->file);
            }
        }

        foreach ($list_daftar2 as $ulang) {
            $mhs2 = tb_mahasiswa::where('id', $ulang->id_mhs)->first();

            if ($mhs2 != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs2->id)->where('ket', 'sd2')->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs2->id)->where('ket', 'sd2')->where('status', 'moderator')->first();

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

                $data2[] = array($mhs2->nama, $mhs2->nim, $mhs2->getProdi->nama, $get_nilai_d, $get_nilai_m, $ulang->file);
            }
        }

        return view('akademik.bap_sidang', compact('datas', 'data', 'data2'));
    }

    public function prodi_filter_sd(Request $request)
    {
        $user         = Auth::user();
        $prodi        = $request->input('prodi');
        $datas        = tb_akademik::where('id', $user->id_user)->get();
        $list_daftar  = tb_daftar::where('ket', 'sd')->where('set_verif', 1)->get();
        $list_daftar2 = tb_daftar::where('ket', 'sd2')->where('set_verif', 1)->get();
        $data         = [];
        $data2        = [];

        foreach ($list_daftar as $list) {
            $mhs = tb_mahasiswa::where('id', $list->id_mhs)->where('id_prodi', $prodi)->first();

            if ($mhs != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'sd')->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs->id)->where('ket', 'sd')->where('status', 'moderator')->first();

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

                $data[] = array($mhs->nama, $mhs->nim, $mhs->getProdi->nama, $get_nilai_d, $get_nilai_m, $list->file);
            }
        }

        foreach ($list_daftar2 as $ulang) {
            $mhs2 = tb_mahasiswa::where('id', $ulang->id_mhs)->where('id_prodi', $prodi)->first();

            if ($mhs2 != null) {
                $nilai_d = tb_nilai_bap::where('id_mhs', $mhs2->id)->where('ket', 'sd2')->where('status', 'dosen')->first();
                $nilai_m = tb_nilai_bap::where('id_mhs', $mhs2->id)->where('ket', 'sd2')->where('status', 'moderator')->first();

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

                $data2[] = array($mhs2->nama, $mhs2->nim, $mhs2->getProdi->nama, $get_nilai_d, $get_nilai_m, $list->file);
            }
        }

        return view('akademik.bap_sidang', compact('datas', 'data', 'data2'));
    }

    public function download_bap_kolokium_d($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_kolokium_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Kolokium Dospem ' . $mhs->nim . '.pdf');
    }

    public function download_bap_kolokium_m($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_kolokium_m', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Kolokium Moderator ' . $mhs->nim . '.pdf');
    }

    public function download_bap_seminar_d($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_seminar_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP seminar Dospem ' . $mhs->nim . '.pdf');
    }

    public function download_bap_seminar_m($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sm')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_seminar_m', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP seminar Moderator ' . $mhs->nim . '.pdf');
    }

    public function download_bap_sidang_d($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Sidang Dospem ' . $mhs->nim . '.pdf');
    }

    public function download_bap_sidang_j($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_j', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Sidang Penguji ' . $mhs->nim . '.pdf');
    }


    public function download_bap_sidang_du($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Sidang Dospem ' . $mhs->nim . '.pdf');
    }

    public function download_bap_sidang_ju($id)
    {

        $bap   = tb_nilai_bap::where('id', $id)->first();
        $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
        $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'sd2')->first();
        $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
        $pdf   = PDF::loadview('bap.pdf_sidang_j', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');

        return $pdf->download('BAP Sidang Penguji ' . $mhs->nim . '.pdf');
    }

    public function download_zip_a(Request $request) //for now kolokium
    {
        $nilai = tb_nilai_bap::where('id_mhs', $request->input('id'))->where('ket', 'kl')->get();

        $dir = 'file_form/zip';
        $zipFileName = 'Zipfile_BAP_' . $request->input('nama') . '.zip';

        $zip = new ZipArchive;
        if ($zip->open($dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            // Add File in ZipArchive 
            foreach ($nilai as $nilai_mhs) {

                if ($nilai_mhs->status == 'dosen') {
                    $bap   = tb_nilai_bap::where('id', $nilai_mhs->id)->first();
                    $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
                    $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
                    $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
                    $pdf   = PDF::loadview('bap.pdf_kolokium_d', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');
                    Storage::disk('local')->put('file_form/bap/' . $mhs->nim . '/BAP_Kolokium_Pembimbing.pdf', $pdf->output());

                    $zip->addFile('file_form/bap/' . $mhs->nim . '/BAP_Kolokium_Pembimbing.pdf', 'BAP_Pembimbing_' . $mhs->nim . '_' . $mhs->nama . '.pdf');
                } else {
                    $bap   = tb_nilai_bap::where('id', $nilai_mhs->id)->first();
                    $mhs   = tb_mahasiswa::where('id', $bap->id_mhs)->first();
                    $data  = tb_daftar::where('id_mhs', $mhs->id)->where('ket', 'kl')->first();
                    $dosen = tb_dosen::where('id', $bap->id_dosen)->first();
                    $pdf   = PDF::loadview('bap.pdf_kolokium_m', compact('bap', 'data', 'dosen', 'mhs'))->setPaper('A4', 'portrait');
                    Storage::disk('local')->put('file_form/bap/' . $mhs->nim . '/BAP_Kolokium_Moderator.pdf', $pdf->output());

                    $zip->addFile('file_form/bap/' . $mhs->nim . '/BAP_Kolokium_Moderator.pdf', 'BAP_Moderator_' . $mhs->nim . '_' . $mhs->nama . '.pdf');
                }
            }
            $zip->close();
        }

        \File::deleteDirectory('file_form/bap/' . $mhs->nim);

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
}
