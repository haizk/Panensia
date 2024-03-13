<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function index()
    {
        $title = 'Panensia';
        $status = 'active';
        return view('index/dashboard', ['title' => $title, 'status' => $status]);
    }
    public function kontak()
    {
        $title = 'Kontak - Panensia';
        return view('index/page/kontak', ['title' => $title]);
    }
    public function berita()
    {
        $title = 'Berita - Panensia';
        return view('index/page/berita', ['title' => $title]);
    }
}
