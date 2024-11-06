<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Blok;
use App\Lantai;
use App\Tarif;
use App\Pengguna;
use App\Lokasi;
use App\Transaksi;
use DateTime;
use Carbon\Carbon;

class AdminC extends Controller {

    // constructor

    // var
    public $rulePengguna = [
        'username' => 'required',
        'password' => 'required',
        'akses' => 'required',
        'nama' => 'required',
        'mail' => 'required',
        'tlp' => 'required',
    ];
    public $messagePengguna = [
        'username.required' => 'Username wajib diisi',
        'password.required' => 'Password wajib diisi',
        'akses.required' => 'Akses wajib diisi',
        'nama.required' => 'Nama wajib diisi',
        'mail.required' => 'Email wajib diisi',
        'tlp.required' => 'Tlp wajib diisi',
    ];

    // dashboard
    public function Dashboard()
    {

        $masuk = Transaksi::whereDate('waktu_masuk', Carbon::today())
                    ->get()->count();
        $keluar = Transaksi::where('status', 2 )
                    ->whereDate('waktu_keluar', Carbon::today())
                    ->get()->count();
        $lokasi = Lokasi::get()->count();
        $tersedia = Lokasi::where('status', 0 )->get()->count();
        $terisi = Lokasi::where('status', 1 )->get()->count();

        return view('admin.dashboard', ['lokasi'=> $lokasi, 'tersedia'=> $tersedia, 'terisi'=> $terisi, 'masuk'=>$masuk, 'keluar'=>$keluar]);
    }

    // master BLOK
    public function MasterBlok()
    {
        $datas = Blok::orderBy('nama', 'asc')->get();
        return view('admin.blok.index', ['Bloks'=> $datas]);
    }
    public function SimpanBlok(Request $request)
    {
        // validasi

        // save
        $data = new Blok([
            'nama' => $request->get('nama'),
            'keterangan'=> $request->get('keterangan'),
        ]);
        $data->save();

        return redirect('admin/master/blok');
    }
    public function EditBlok($id)
    {
        $data = Blok::find($id);
        return view('admin.blok.edit', ['blok'=> $data]);
    }
    public function UpdateBlok(Request $request)
    {
        $data = Blok::find($request->id);
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect('admin/master/blok');
    }
    public function HapusBlok($id)
    {
        Blok::find($id)->delete();
        return redirect('admin/master/blok');
    }
    public function CariBlok(Request $request)
    {
        $key = $request->key;
        $datas = Blok::where('nama', 'like', '%' . $key . '%' )
                    ->orWhere('keterangan', 'like', '%' . $key . '%')
                    ->orderBy('id', 'desc')->get();

                    return view('admin.blok.index', ['Bloks'=> $datas]);
    }

    // master lantai
    public function MasterLantai()
    {
        $datas = Lantai::orderBy('nama', 'asc')->get();
        return view('admin.lantai.index',['Lantais'=>$datas]);
    }
    public function SimpanLantai(Request $request)
    {
        // validasi

        // save
        $data = new Lantai([
            'nama' => $request->nama,
            'keterangan'=> $request->keterangan,
        ]);
        $data->save();

        return redirect('admin/master/lantai');
    }
    public function EditLantai($id)
    {
        $data = Lantai::find($id);
        return view('admin.lantai.edit', ['lantai'=> $data]);
    }
    public function UpdateLantai(Request $request)
    {
        $data = Lantai::find($request->id);
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect('admin/master/lantai');
    }
    public function HapusLantai($id)
    {
        Lantai::find($id)->delete();
        return redirect('admin/master/lantai');
    }
    public function CariLantai(Request $request)
    {
        $key = $request->key;
        $datas = Lantai::where('nama', 'like', '%' . $key . '%' )
                    ->orWhere('keterangan', 'like', '%' . $key . '%')
                    ->orderBy('id', 'desc')->get();

                    return view('admin.lantai.index', ['Lantais'=> $datas]);
    }

    // master lokasi
    public function MasterLokasi()
    {
        $datas = Lokasi::with('lantai')
                    ->with('blok')
                    ->orderBy('nomor', 'asc')->get();
        return view('admin.lokasi.index', ['datas'=> $datas]);
    }
    public function TambahLokasi()
    {
        $lantai = Lantai::get();
        $blok = Blok::get();
        return view('admin.lokasi.add',
        [
            'lantai'=> $lantai,
            'blok'=> $blok
        ]);
    }
    public function SimpanLokasi(Request $request)
    {
        // validasi

        // save
        $data = new Lokasi([
            'id_lantai' => $request->id_lantai,
            'id_blok' => $request->id_blok,
            'nomor' => $request->nomor,
            'status' => $request->status
        ]);
        $data->save();

        return redirect('admin/master/lokasi-parkir');
    }
    public function EditLokasi($id)
    {
        $data = Lokasi::find($id);
        $lantai = Lantai::get();
        $blok = Blok::get();
        return view('admin.lokasi.edit', 
        [
            'data'=> $data,
            'lantai'=> $lantai,
            'blok'=> $blok
        ]);
    }
    public function UpdateLokasi(Request $request)
    {
        $data = Lokasi::find($request->id);
        $data->id_lantai = $request->id_lantai;
        $data->id_blok = $request->id_blok;
        $data->nomor = $request->nomor;
        $data->status = $request->status;
        $data->save();

        return redirect('admin/master/lokasi-parkir');
    }
    public function HapusLokasi($id)
    {
        Lokasi::find($id)->delete();
        return redirect('admin/master/lokasi-parkir');
    }
    public function CariLokasi(Request $request)
    {
        if ($request->key == '') {
            $datas = Lokasi::with('lantai')
                    ->with('blok')
                    ->orderBy('id', 'desc')->get();
        } else {
            $key = explode("/", $request->key);
            $datas = Lokasi::with('lantai')
                ->with('blok')
                ->whereHas('lantai', function($q) use ($key){
                    $q->where('nama', 'like', '%' . $key[0] . '%');
                })
                ->whereHas('blok', function($q) use ($key){
                    $q->where('nama', 'like', '%' . $key[1] . '%');
                })
                ->where('nomor', 'like', '%' . $key[2] . '%' ) 
                ->orderBy('id', 'desc')->get();
        }
        
        return view('admin.lokasi.index', ['datas'=> $datas]);
    }


    // master tarif
    public function MasterTarif()
    {
        $datas = Tarif::orderBy('batas_jam', 'asc')->get();
        return view('admin.tarif.index',['datas'=>$datas]);
    }
    public function SimpanTarif(Request $request)
    {
        // validasi

        // save
        $data = new Tarif([
            'batas_jam' => $request->batas_jam,
            'biaya' => $request->biaya,
            'keterangan'=> $request->keterangan,
        ]);
        $data->save();

        return redirect('admin/master/tarif');
    }
    public function EditTarif($id)
    {
        $data = Tarif::find($id);
        return view('admin.tarif.edit', ['tarif'=> $data]);
    }
    public function UpdateTarif(Request $request)
    {
        $data = Tarif::find($request->id);
        $data->batas_jam = $request->batas_jam;
        $data->biaya = $request->biaya;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect('admin/master/tarif');
    }
    public function HapusTarif($id)
    {
        Tarif::find($id)->delete();
        return redirect('admin/master/tarif');
    }

    // master petugas
    public function MasterPetugas()
    {
        $datas = Pengguna::orderBy('username', 'asc')->get();
        return view('admin.petugas.index', ['datas' => $datas]);
    }
    public function SimpanPetugas(Request $request)
    {
        // validasi
        $validator = Validator::make($request->all(),
        $this->rulePengguna,
        $this->messagePengguna
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);                        
        }

        // save
        $data = new Pengguna([
            'username' => $request->username,
            'password' => $request->password,
            'akses' => $request->akses,
            'nama' => $request->nama,
            'mail' => $request->mail,
            'tlp' => $request->tlp,
        ]);
        $data->save();

        return redirect('admin/master/petugas');
    }
    public function EditPetugas($id)
    {
        $data = Pengguna::find($id);
        return view('admin.petugas.edit', ['data'=> $data]);
    }
    public function UpdatePetugas(Request $request)
    {

        // validasi
        $validator = Validator::make($request->all(),
        $this->rulePengguna,
        $this->messagePengguna
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);                        
        }

        $data = Pengguna::find($request->id);
        $data->username = $request->username;
        $data->password = $request->password;
        $data->akses = $request->akses;
        $data->nama = $request->nama;
        $data->mail = $request->mail;
        $data->tlp = $request->tlp;
        $data->save();

        return redirect('admin/master/petugas');
    }
    public function HapusPetugas($id)
    {
        Pengguna::find($id)->delete();
        return redirect('admin/master/petugas');
    }
    public function CariPetugas(Request $request)
    {
        $key = $request->key;
        $datas = Pengguna::where('nama', 'like', '%' . $key . '%' )
                    ->orWhere('username', 'like', '%' . $key . '%')
                    ->orWhere('mail', 'like', '%' . $key . '%')
                    ->orWhere('tlp', 'like', '%' . $key . '%')
                    ->orderBy('id', 'desc')->get();

                    return view('admin.petugas.index', ['datas'=> $datas]);
    }
    public function DetailPetugas($id)
    {
        $data = Pengguna::find($id);
        return view('admin.petugas.detail', ['data'=> $data]);
    }

    // parkir masuk
    public function FormMasuk()
    {
        return view('admin.masuk.form');
    }
    public function SimpanMasuk(Request $request)
    {
        $user = json_decode(Session::get('user'));
        // validasi

        // lokasi yang terkecil dan kosong
        $lokasi = Lokasi::where('status', 0)->orderBy('nomor', 'asc')->first();
        if($lokasi == null){
            return redirect('admin/parkir/kelola-masuk')->with('false','Parkir Penuh');
        }

        $data = new Transaksi([
            'nota' => $request->plat_nomor.'/'.date('dm/Hi'),
            'plat_nomor' => $request->plat_nomor,
            'status' => 0,
            'waktu_masuk' => date('Y-m-d H:i:s'),
            'petugas_masuk' => $user->id,
            'id_lokasi' => $lokasi->id
        ]);
        $data->save();

        // update status lokasi
        $lokasi = Lokasi::find($lokasi->id);
        $lokasi->status = 1;
        $lokasi->save();

        return redirect('admin/parkir/masuk-struk/'.$data->id);
    }

    public function KelolaMasuk()
    {
        $datas = Transaksi::with('lokasi')->where('status',0)->orderBy('id', 'desc')->get();
        return view('admin.masuk.index', ['datas'=>$datas]);
    }

    public function CariMasuk(Request $request)
    {
        $key = $request->key;
        $datas = Transaksi::where('nota', 'like', '%' . $key . '%' )
                    ->orWhere('plat_nomor', 'like', '%' . $key . '%')
                    ->orderBy('id', 'desc')->get();

        return view('admin.masuk.index', ['datas'=> $datas]);
    }

    public function HapusMasuk($id)
    {

        $transaksi = Transaksi::find($id);

        // update lokasi
        $lokasi = Lokasi::find($transaksi->id_lokasi);
        $lokasi->status = 0;
        $lokasi->save();

        $transaksi->delete();
        return redirect('admin/parkir/kelola-masuk');
        
    }

    public function EditMasuk($id)
    {
        $data = Transaksi::find($id);
        return view('admin.masuk.edit',['data'=>$data]);
    }

    public function UpdateMasuk(Request $request)
    {
        $user = json_decode(Session::get('user'));
        
        $data = Transaksi::find($request->id);
        $data->nota = $request->plat_nomor.'/'.date('dm/Hi');
        $data->plat_nomor = $request->plat_nomor;
        $data->waktu_masuk = date('Y-m-d H:i:s');
        $data->petugas_masuk = $user->id;
        $data->save();

        return redirect('admin/parkir/masuk-struk/'.$data->id);
    }

    public function StrukMasuk($id)
    {
        $data = Transaksi::with('lokasi')->where('id', $id)->first();
        return view('admin.masuk.struk', ['data'=> $data]);
    }

    public function CetakMasuk($id)
    {
        $data = Transaksi::with('lokasi')->where('id', $id)->first();
        return view('admin.masuk.print', ['data'=> $data]);
    }

    // --
    
    public function KelolaKeluar()
    {
        $datas = Transaksi::with('lokasi')
                    ->with('tarif')
                    ->whereIn('status', [1,2])->orderBy('waktu_keluar', 'desc')->get();
        return view('admin.keluar.index',['datas'=>$datas]);
    } 

    public function FormKeluar()
    {
        return view('admin.keluar.form');
    }
    
    public function StrukKeluar(Request $request)
    {
        $data = Transaksi::with('lokasi')->where('nota', $request->nota)->first();

        // durasi
        $masuk = new DateTime($data->waktu_masuk);
        $keluar = new DateTime(date('Y-m-d H:i:s'));
        $durasi = $masuk->diff($keluar);
        $totalMenit =  ($durasi->d*1440)+($durasi->h*60)+$durasi->i;

        // tarif (durasi <= mulai dari yg terkecil)
        $tarifs = Tarif::orderBy('batas_jam', 'asc')->get();
        foreach ($tarifs as $tarif) {
            if($totalMenit <= ($tarif->batas_jam*60)){
                $data->id_tarif = $tarif->id;
                $data->biaya = $tarif->biaya;
                break;
            }
        };
        // jika paling besar, tentukan biaya
        if($data->id_tarif == null){
            $overMenit = $totalMenit - ($tarifs[sizeof($tarifs)-1]['batas_jam']*60);
            $biaya = $tarifs[sizeof($tarifs)-1]['biaya'] + (10000*ceil($overMenit/60));
            $data->biaya = $biaya;
        }

        $user = json_decode(Session::get('user'));

        // PARKIR KELUAR
        $data->durasi = (($durasi->d*24)+$durasi->h).':'.$durasi->i;
        $data->status = 1;
        $data->waktu_keluar = date('Y-m-d H:i:s');
        $data->petugas_keluar = $user->id;
        $data->save();

        $transaksi = $data;
        return redirect('admin/parkir/keluar-struk/'.$data->id);
    }

    public function LihatStrukKeluar($id)
    {
        $data = Transaksi::where('id', $id)->first();
        // echo json_encode($data);
        return view('admin.keluar.struk', ['data'=> $data]);
    }

    public function BayarKeluar($id)
    {
        $data = Transaksi::find($id);   
        $data->status = 2;
        $data->save();
     
        // update lokasi
        $lokasi = Lokasi::find($data->id_lokasi);
        $lokasi->status = 0;
        $lokasi->save();

        return redirect('admin/parkir/keluar-cetak/'.$id);
        // $datas = Transaksi::whereIn('status', [1,2])->orderBy('id', 'desc')->get();
        // return view('admin.keluar.index',['datas'=>$datas]);
        // return redirect('admin/parkir/keluar-cetak/'.$data->id);
    }
    public function CetakKeluar($id)
    {
        $data = Transaksi::where('id', $id)->first();
        return view('admin.keluar.print', ['data'=> $data]);
    }
    public function CariKeluar(Request $request)
    {
        $key = $request->key;
        $datas = Transaksi::where(function ($q) use($key)
                {
                    $q->where('nota', 'like', '%' . $key . '%')
                      ->orWhere('plat_nomor', 'like', '%' . $key . '%');
                })
                ->where(function ($q)
                {
                    $q->whereIn('status', [1,2]);
                })
                ->orderBy('id', 'desc')->get();

        return view('admin.keluar.index', ['datas'=> $datas]);
    }
    public function HapusKeluar($id)
    {

        $transaksi = Transaksi::find($id);

        // update lokasi
        $lokasi = Lokasi::find($transaksi->id_lokasi);
        $lokasi->status = 0;
        $lokasi->save();

        $transaksi->delete();
        return redirect('admin/parkir/kelola-keluar');
        
    }


    //LAPORAN 

    public function KelolaLaporan()
    {

        $key = '';
        $awal = Carbon::today()->subWeek()->toDateString();
        $akhir = Carbon::today()->addDays(1)->toDateString();

        $datas = Transaksi::where('status', 2 )
                    ->where('plat_nomor', 'like', '%' . $key . '%')
                    ->whereBetween('waktu_keluar', [$awal, $akhir])
                    ->with('lokasi')
                    ->with('tarif')
                    ->orderBy('waktu_keluar', 'desc')
                    ->get();

        $total = Transaksi::where('status', 2 )
                    ->where('plat_nomor', 'like', '%' . $key . '%')
                    ->whereBetween('waktu_keluar', [$awal, $akhir])
                    ->sum('biaya');

        return view('admin.laporan.index', ['datas'=> $datas, 'total'=> $total, 'key'=>$key, 'awal'=>$awal, 'akhir'=>$akhir]);
    } 
    public function FilterLaporan(Request $request)
    {
        $datas = Transaksi::where('status', 2 )
                    ->where('plat_nomor', 'like', '%' . $request->key . '%')
                    ->whereBetween('waktu_keluar', [$request->awal, $request->akhir])
                    ->with('lokasi')
                    ->with('tarif')
                    ->orderBy('waktu_keluar', 'desc')
                    ->get();

        $total = Transaksi::where('status', 2 )
                    ->where('plat_nomor', 'like', '%' . $request->key . '%')
                    ->whereBetween('waktu_keluar', [$request->awal, $request->akhir])
                    ->sum('biaya');

        $key = $request->key;
        $awal = $request->awal;
        $akhir = $request->akhir;

        return view('admin.laporan.index', ['datas'=> $datas, 'total'=> $total, 'key'=>$key, 'awal'=>$awal, 'akhir'=>$akhir]);
    }
    public function CetakLaporan($awal, $akhir, $key='')
    {
        $datas = Transaksi::where('status', 2 )
                    ->where('plat_nomor', 'like', '%' . $key . '%')
                    ->whereBetween('waktu_keluar', [$awal, $akhir])
                    ->with('lokasi')
                    ->with('tarif')
                    ->orderBy('waktu_keluar', 'desc')
                    ->get();

        $total = Transaksi::where('status', 2 )
                    ->where('plat_nomor', 'like', '%' . $key . '%')
                    ->whereBetween('waktu_keluar', [$awal, $akhir])
                    ->sum('biaya');

        $awal = Carbon::parse($awal)->format('d-m-Y');
        $akhir = Carbon::parse($akhir)->format('d-m-Y');

        return view('admin.laporan.print', ['datas'=> $datas, 'total'=> $total, 'key'=>$key, 'awal'=>$awal, 'akhir'=>$akhir]);
    }

    public function AkunSaya()
    {
        $user = json_decode(Session::get('user'));

        $data = Pengguna::find($user->id);
        return view('admin.myAkun',['data'=> $data]);
    }
    public function AkunEdit($id)
    {
        $data = Pengguna::find($id);
        return view('admin.editAkun', ['data'=>$data]);
    } 
    public function AkunUpdate(Request $request)
    {

        // validasi
        $validator = Validator::make($request->all(),
        $this->rulePengguna,
        $this->messagePengguna
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);                        
        }

        $data = Pengguna::find($request->id);
        $data->username = $request->username;
        $data->password = $request->password;
        $data->akses = $request->akses;
        $data->nama = $request->nama;
        $data->mail = $request->mail;
        $data->tlp = $request->tlp;
        $data->save();

        // update session
        $user = Pengguna::where('username', $request->username)
                        ->where('password', $request->password)
                        ->first();
        $request->session()->put('user', json_encode($user));

        return redirect('admin/akun-saya')->with('success','Data Berhasil Diupdate');
    }
    public function AkunEditPassword($id)
    {
        $data = Pengguna::find($id);
        return view('admin.editPassword', ['data'=>$data]);
    }
    public function AkunUpdatePassword(Request $request)
    {
        $data = Pengguna::find($request->id);

        // konfirmasi password
        if ($data->password == $request->password_lama) {
            $data->password = $request->password_baru;
            $data->save();

             // update session
                $user = Pengguna::where('username', $request->username)
                        ->where('password', $request->password_baru)
                        ->first();
                $request->session()->put('user', json_encode($user));

            // kirim pesan
            return redirect('admin/akun-saya')->with('success','Data Berhasil Diupdate');
        } else {
            // password salah
            // kirim pesan
            return redirect('admin/akun-saya')->with('error','Ulangi kembali ada kesalahan');
        }
        
        
    }

    
    public function Login()
    {
        return view('admin.login');
    } 
    public function LoginCek(Request $request)
    {
        // $valid = $request->validate([
        //     'username' => 'required',
        //     'password'=>'required',
        // ]);
        
        $validator = Validator::make($request->all(),
        [
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]
        );
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }

        // cek user
        $user = Pengguna::where('username', $request->username)
                        ->where('password', $request->password)
                        ->first();

        if($user != null){
            // store session
            $user = json_encode($user);
            // var_dump($user);
            $request->session()->put('user', $user);
            return redirect('admin/dashboard')->with('true', 'Login berhasil');
        }else{
            return redirect('/')->with('false', 'Login tidak berhasil, periksa data Anda.');
        }
    }
    public function Logout()
    {
        Session::forget(['user']);
        return redirect('/');
    }  
}
