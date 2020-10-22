<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('pages.home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us'
        ];
        return view('pages.about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Komplek Ciwastra Indah E 20',
                    'kota' => 'Bandung'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'jln. pajajaran no 123',
                    'kota' => 'Bandung'
                ]
            ]
        ];
        return view('pages.contact', $data);
    }
}
