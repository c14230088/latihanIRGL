<?php

namespace App\Http\Controllers;

use App\Models\mahasiswas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class mahasiswaController extends Controller
{
    function mahasiswa()
    {
        $mahasiswaTable = mahasiswas::all();
        return view('mahasiswa', compact('mahasiswaTable'));
    }
    function crudAdd(Request $reqs)
    {
        $validasi = Validator::make($reqs->all(), [
            'nama_mhs' => 'required',
            'nrp_mhs' => 'required',
            'gpa_mhs' => 'required',
            'sem_mhs' => 'required'
        ], [
            'nama_mhs' => 'Belum mengisi Nama',
            'nrp_mhs' => 'Belum mengisi NRP',
            'gpa_mhs' => 'Belum mengisi GPA',
            'sem_mhs' => 'Belum mengisi Semester'

        ]);
        if ($validasi->fails()) {
            return redirect()->back()->with(['error' => $validasi->errors()->first()])->withInput();
        } else {
            $add = mahasiswas::create([
                'id' => Str::uuid(),
                'nama' =>  $reqs->nama_mhs,
                'nrp' => $reqs->nrp_mhs,
                'gpa' => $reqs->gpa_mhs,
                'semester' => $reqs->sem_mhs
            ]);
            $add->save();
            return redirect()->back()->with('success', 'Berhasil menambah Data');
        }
    }

    function crudEdit(Request $reqs)
    {
        $validasi = Validator::make($reqs->all(), [
            'nama_mhs' => 'required',
            'nrp_mhs' => 'required',
            'gpa_mhs' => 'required',
            'sem_mhs' => 'required'
        ], [
            'nama_mhs' => 'Nama Tidak Bisa Diganti Kosong',
            'nrp_mhs' => 'NRP Tidak Bisa Diganti Kosong',
            'gpa_mhs' => 'GPA Tidak Bisa Diganti Kosong',
            'sem_mhs' => 'Semester Tidak Bisa Diganti Kosong'

        ]);
        if ($validasi->fails()) {
            return redirect()->back()->with(['error' => $validasi->errors()->first()])->withInput();
        } else {
            $edit = mahasiswas::find($reqs->id);
            $edit->id = Str::uuid();
            $edit->nama = $reqs->nama_mhs;
            $edit->nrp = $reqs->nrp_mhs;
            $edit->gpa = $reqs->gpa_mhs;
            $edit->semester = $reqs->sem_mhs;
            $edit->update();
            return redirect()->back()->with('success', 'Berhasil mengubah Data');
        }
    }

    function crudDelete(Request $reqs)
    {

        $ids = $reqs->input('idsDelete', []); // ids akan jadi [] yang diisi oleh input yang ber-name idsDelete !!

        if (empty($ids)) {
            return redirect()->back()->with('error', 'Belum memilih Records untuk Hapus');
        }
        mahasiswas::whereIn('id', $ids)->delete();

        return redirect()->back()->with('success', 'Record yang dipilih telah Dihapus');
    }
}
