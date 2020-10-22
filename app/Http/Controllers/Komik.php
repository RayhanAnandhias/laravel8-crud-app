<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomikModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Komik extends Controller
{
    protected $komikModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        return view('komik.index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        if (empty($data['komik'])) {
            return abort(404);
        }
        return view('komik.detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Komik',
        ];

        return view('komik.create', $data);
    }

    public function save(Request $request)
    {

        //validasi input
        $rules = [
            'judul' => 'required|unique:komik,judul',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => 'max:1024|image|mimetypes:image/jpg,image/jpeg,image/png'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/komik/create')->withErrors($validator)->withInput();
        }

        //ambil file gambar nya
        $fileGambar = $request->file('sampul');

        //jika tidak ada gambar yg diupload,
        //maka gunakan file gamabr default.jpg
        if (empty($fileGambar)) {
            $fileName = 'default.jpg';
        } else {
            $fileName = $fileGambar->hashName();

            //pindahkan gambar ke folder /img
            $fileGambar->move('img', $fileName);
        }

        $slugName = Str::of($request->input('judul'))->slug('-');

        $this->komikModel->judul = $request->input('judul');
        $this->komikModel->slug = $slugName;
        $this->komikModel->penulis = $request->input('penulis');
        $this->komikModel->penerbit = $request->input('penerbit');
        $this->komikModel->sampul = $fileName;
        $this->komikModel->save();

        $request->session()->flash('pesan', 'Data berhasil ditambahkan.');

        return redirect('/komik');
    }

    public function delete(Request $request, $id)
    {
        $sampulName = $this->komikModel->all()->find($id)['sampul'];
        $this->komikModel->destroy($id);
        if ($sampulName != 'default.jpg') {
            unlink('img/' . $sampulName);
        }
        $request->session()->flash('pesan', 'Data berhasil dihapus.');
        return redirect('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        if (empty($data['komik'])) {
            return abort(404);
        }

        return view('komik.edit', $data);
    }

    public function update(Request $request, $id)
    {
        //validasi input
        $rules = [
            'judul' => 'required|unique:komik,judul,' . $id . ',id',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => 'max:1024|image|mimetypes:image/jpg,image/jpeg,image/png'
        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/komik/edit/' . $request->input('slug'))->withErrors($validator)->withInput();
        }

        //ambil file gambar nya
        $fileGambar = $request->file('sampul');

        //jika tidak ada gambar yg diupload,
        //maka gunakan file gamabr default.jpg
        if (empty($fileGambar)) {
            $fileName = $request->input('oldSampul');
        } else {
            $fileName = $fileGambar->hashName();

            //pindahkan gambar ke folder /img
            $fileGambar->move('img', $fileName);
            if ($request->input('oldSampul') != 'default.jpg') {
                unlink('img/' . $request->input('oldSampul'));
            }
        }

        $slugName = Str::of($request->input('judul'))->slug('-');
        $komik = $this->komikModel->all()->find($id);
        $komik->judul = $request->input('judul');
        $komik->slug = $slugName;
        $komik->penulis = $request->input('penulis');
        $komik->penerbit = $request->input('penerbit');
        $komik->sampul = $fileName;
        $komik->save();

        $request->session()->flash('pesan', 'Data berhasil diupdate.');
        return redirect('/komik/' . $slugName);
    }
}
