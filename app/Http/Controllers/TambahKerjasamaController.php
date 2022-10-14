<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ExcelImports;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Models\TambahKerjasama;
use App\Models\PerjanjianKerjasama;
use App\Models\MoU;
use App\Models\MoA;
use App\Models\JenisMitra;
use App\Models\LingkupKerja;
use App\Models\AdminViewUser;

class TambahKerjasamaController extends Controller
{
    public function index() // untuk view hal Kerjasama
    {
        $kerjasama = TambahKerjasama::all();
        $mou = MoU::all();
        $moa = MoA::all();
        return view('Kerjasama')->with('kerjasama', $kerjasama)
            ->with('mou', $mou)
            ->with('moa', $moa);
    }

    public function create() // untuk view hal Tambah Kerjasama
    {
        $jenismitra = JenisMitra::all();
        $lingkup = LingkupKerja::all();
        $user = AdminViewUser::all(); //define d sini kalo mau ambil data dari tabel lain

        return view('TambahKerja')->with('jm', $jenismitra)
            ->with('lk', $lingkup)
            ->with('users', $user);
    }

    public function store(Request $req) // store input dari hal Tambah Kerjasama
    {
        $user = new TambahKerjasama;

        $user->status = $req['status'];
        $user->namamitra = $req['namamitra'];
        $user->jenismitra = $req['jenismitra'];
        $user->lingkupkerja = $req['lingkupkerja'];
        $user->alamat = $req['alamat'];
        $user->negara = $req['negara'];
        $user->notelpmitra = $req['notelpmitra'];
        $user->website = $req['website'];
        $user->bulaninput = $req['bulaninput'];
        $user->narahubung = $req['narahubung'];
        $user->notelpnara = $req['notelpnara'];
        $user->emailnara = $req['emailnara'];
        $user->notelppic = $req['notelppic'];
        $user->emailpic = $req['emailpic'];
        $user->assignuserakun = $req['pic'];

        $user->save();
        
        if (isset($req['path_mou'])) 
        {
            $mou = new MoU;
            $mou->judul = $req['judul_mou'];
            $mou->tglmulai = $req['tglmulai_mou'];
            $mou->tglselesai = $req['tglselesai_mou'];

            foreach ($req['path_mou'] as $file) {
                $namafilemou = $req['judul_mou'] . '_' .  time()  . '_' . rand(1, 1000) . '.' . $file->extension();
                $path_mou = $namafilemou;

                $file->move(public_path('files'), $namafilemou);
            }
            
            $mou->path = $path_mou;

            $user->mous()->save($mou);
        }

        //jika ada path, jalankan code. jika tidak ada, skip code.
        if (isset($req['path_moa'])) 
        {
            $moa = new MoA;
            $moa->judul = $req['judul_moa'];
            $moa->tglmulai = $req['tglmulai_moa'];
            $moa->tglselesai = $req['tglselesai_moa'];
            $moa->nilaikontrak = $req['nilaikontrak'];

            foreach ($req['path_moa'] as $file) {
                $namafilemoa = $req['judul_moa'] . '_' .  time()  . '_' . rand(1, 1000) . '.' . $file->extension();
                $path_moa = $namafilemoa;

                $file->move(public_path('files'), $namafilemoa);
            }
            
            $moa->path = $path_moa;

            $user->moas()->save($moa);
        }

        return redirect('/Kerjasama');
    }

    public function edit($id)
    {
        $tambahkerjasama = TambahKerjasama::find($id);
        $mou = MoU::where('tambah_kerjasama_id', $id)->first();
        $moa = MoA::where('tambah_kerjasama_id', $id)->first();
        $jenismitra = JenisMitra::all();
        $lingkup = LingkupKerja::all();
        $user = AdminViewUser::all();

        // var_dump($tambahkerjasama->path_moa);die;

        return view('EditKerja')->with('tks', $tambahkerjasama)
            ->with('jm', $jenismitra)
            ->with('lk', $lingkup)
            ->with('users', $user)
            ->with('mou', $mou)
            ->with('moa', $moa);
    }

    public function update(Request $req, $id)
    {
        $user = TambahKerjasama::find($id);

        $user->status = $req['status'];
        $user->namamitra = $req['namamitra'];
        $user->jenismitra = $req['jenismitra'];
        $user->lingkupkerja = $req['lingkupkerja'];
        $user->alamat = $req['alamat'];
        $user->negara = $req['negara'];
        $user->notelpmitra = $req['notelpmitra'];
        $user->website = $req['website'];
        $user->bulaninput = $req['bulaninput'];
        $user->narahubung = $req['narahubung'];
        $user->notelpnara = $req['notelpnara'];
        $user->emailnara = $req['emailnara'];
        $user->assignuserakun = $req['pic'];
        $user->notelppic = $req['notelppic'];
        $user->emailpic = $req['emailpic'];

        $user->save();

        if($req['check1'] == 1)
        {
            $user->tglselesai_mou = null;
        }

        if ($req['check2'] == 1) 
        {
            $user->tglselesai_moa = null;
        }
        

        $mou = MoU::where('tambah_kerjasama_id',$id)->first();
        if( $mou == null)
        {
            $mou = new MoU;
        }

        $mou->judul = $req['judul_mou'];
        $mou->tglmulai = $req['tglmulai_mou'];
        $mou->tglselesai = $req['tglselesai_mou'];
        $mou->path = $mou->path;

        if(isset($req['path_mou']))
        {
            $mou->judul = $req['judul_mou'];
            $mou->tglmulai = $req['tglmulai_mou'];
            $mou->tglselesai = $req['tglselesai_mou'];

            foreach ($req['path_mou'] as $file) {
                $namafilemou = $req['judul_mou'] . '_' .  time()  . '_' . rand(1, 1000) . '.' . $file->extension();
                $path_mou = $namafilemou;
                $file->move(public_path('files'), $namafilemou);
            }

            $mou->path = $path_mou;
        }
        $user->mous()->save($mou);


        $moa = MoA::where('tambah_kerjasama_id',$id)->first();
        if( $moa == null)
        {
            $moa = new MoA;
        }

        $moa->judul = $req['judul_moa'];
        $moa->tglmulai = $req['tglmulai_moa'];
        $moa->tglselesai = $req['tglselesai_moa'];
        $moa->nilaikontrak = $req['nilaikontrak'];
        $moa->path = $moa->path;

        //jika ada path, jalankan code. jika tidak ada, skip code.
        if (isset($req['path_moa'])) 
        {
            $moa = MoA::where('tambah_kerjasama_id',$id)->first();
            
            if( $moa == null)
            {
                $moa = new MoA;
            }

            $moa->judul = $req['judul_moa'];
            $moa->tglmulai = $req['tglmulai_moa'];
            $moa->tglselesai = $req['tglselesai_moa'];
            $moa->nilaikontrak = $req['nilaikontrak'];

            foreach ($req['path_moa'] as $file) 
            {
                $namafilemoa = $req['judul_moa'] . '_' .  time()  . '_' . rand(1, 1000) . '.' . $file->extension();
                $path_moa = $namafilemoa;
                $file->move(public_path('files'), $namafilemoa);
            }

            $moa->path = $path_moa;
        }
        $user->moas()->save($moa);
        

        return redirect('/Kerjasama');
    }

    public function delete($id)
    {
        TambahKerjasama::destroy($id);
        return back();
    }

    public function perjanjiankerjasama()
    {
        return $this->hasMany(PerjanjianKerjasama::class);
    }

    //untuk import file excel
    public function importExcel()
    {
        return view('Kerjasama');
    }

    public function uploadExcel(Request $request)
    {
        /*$request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        $path = $request->file('file');

        Excel::import(new ExcelImports, $path);*/

        //dd($request);
        //Excel::import(new ExcelImports, $request->file('test1.csv'));

        $array = Excel::toArray(new ExcelImports, $request->file('path_excel'), 's3', \Maatwebsite\Excel\Excel::XLSX);

        $i = 0;
        //dd($array[0]);
        foreach ($array[0] as $value) {
            if ($i > 0) {
                $kerjasama = new TambahKerjasama;
                $kerjasama->namamitra = $value[0];
                $kerjasama->jenismitra = $value[1];
                // $kerjasama->judulkerjasama = $value[2];
                $kerjasama->lingkupkerja = $value[2];
                $kerjasama->alamat = $value[3];
                $kerjasama->negara = $value[4];
                $kerjasama->notelpmitra = $value[5];
                $kerjasama->website = $value[6];
                $kerjasama->bulaninput = $value[7];
                // $kerjasama->nilaikontrak = $value[9];
                // $kerjasama->judul_mou = $value[10];
                // $kerjasama->tglmulai_mou = $value[11];
                // $kerjasama->tglselesai_mou = $value[12];
                // $kerjasama->path_mou = $value[13];
                // $kerjasama->judul_moa = $value[14];
                // $kerjasama->tglmulai_moa = $value[15];
                // $kerjasama->tglselesai_moa = $value[16];
                // $kerjasama->path_moa = $value[17];
                $kerjasama->narahubung = $value[8];
                $kerjasama->notelpnara = $value[9];
                $kerjasama->emailnara = $value[10];
                $kerjasama->assignuserakun = $value[11];
                $kerjasama->notelppic = $value[12];
                $kerjasama->emailpic = $value[13];
                $kerjasama->status = $value[14];

                $kerjasama->save();
            }

            $i++;
        }

        return redirect()->back();
    }
}
