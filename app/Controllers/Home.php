<?php

namespace App\Controllers;
use  App\Models\KategoriModel;
use App\Models\ProdukModel;
class Home extends BaseController
{
    // untuk menampilkan halaman dashboard
    public function index(): string
    {
        // deklarasi model
        $modelkategori = new KategoriModel();
        $modelproduk = new ProdukModel();
        // mengambil data kategori 
        $kategori = $modelkategori->findAll();

        // mengambil data produk dengan status tidak bisa dijual
        $produk_tidak_dijual = $modelproduk->join('status', 'status.id_status = produk.status_id')->where('status.nama_status', 'tidak bisa dijual')->findAll();


        // mengambil data produk dengan status bisa dijual
        $produk_dijual = $modelproduk->join('status', 'status.id_status = produk.status_id')->where('status.nama_status', 'bisa dijual')->findAll();
        

        // deklarasi variabel
        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard',
            'count_kategori' => count($kategori),
            'produk_tidak_dijual' => count($produk_tidak_dijual),
            'produk_dijual' => count($produk_dijual)
        ];
        // menampilkan halaman dashboard dengan format view
        return view('dashboard/index' , $data);
    }
}
