<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrangModel;

class Orang extends Controller
{
    protected $orangModel;

    public function __construct()
    {
        $this->orangModel = new OrangModel();
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $orang = $this->orangModel->searchOrang($keyword);
        } else {
            $orang = $this->orangModel->getAll();
        }
        $data = [
            'title' => 'Daftar Orang',
            'orang' => $orang->paginate(5),
        ];

        return view('orang.index', $data);
    }
}
