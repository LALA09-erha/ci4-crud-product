<?php

namespace App\Controllers;
use  App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\StatusModel;

class ProductController extends BaseController
{
    public function index(): string
    {
        // dd($_GET['filter']);
        $modelproduk = new ProdukModel();
        if(isset($_GET['filter']) && $_GET['filter'] == 'dapat di jual'){
            $data['produk'] = $modelproduk->join('status', 'status.id_status = produk.status_id')->where('status.nama_status', 'bisa dijual')
            ->join('kategori', 'kategori.id_kategori = produk.kategori_id')
            ->orderBy('id_produk', 'DESC')
            ->paginate(10);

            $data['filter'] = 'dapat di jual';
        }else if(isset($_GET['filter']) && $_GET['filter'] == 'tidak dapat di jual'){
            $data['produk'] = $modelproduk->join('status', 'status.id_status = produk.status_id')->where('status.nama_status', 'tidak bisa dijual')
            ->join('kategori', 'kategori.id_kategori = produk.kategori_id')
            ->orderBy('id_produk', 'DESC')
            ->paginate(10);

            $data['filter'] = 'tidak dapat di jual';        
        }else{
            $data['produk'] = $modelproduk->join('kategori', 'kategori.id_kategori = produk.kategori_id')
            ->join('status', 'status.id_status = produk.status_id')
            ->orderBy('id_produk', 'DESC')
            ->paginate(10);

            $data['filter'] = 'semua';
        }
        


        $data = [
            'title' => 'Produk',
            'page' => 'Produk',
            'produk' => $data['produk'],
            'filter' => $data['filter'],
            'pager' => $modelproduk->pager
            
        ];
        return view('dashboard/produk' , $data);
    }

    public function create() : string
    {
        $modelkategori = new KategoriModel();
        $modelstatus = new StatusModel();

        $data = [
            'title' => 'Tambah Produk',
            'page' => 'dashboard',
            'kategori' => $modelkategori->findAll(),
            'status' => $modelstatus->findAll()
        ];
        return view('dashboard/addproduk' , $data);
    }

    public function store()
    {
        $modelproduk = new ProdukModel();
        
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => intval($this->request->getPost('harga_produk')),
            'status_id' => intval($this->request->getPost('status_produk')),
            'kategori_id' => intval($this->request->getPost('kategori_produk')),
        ];

        $modelproduk->insert($data);
        
        session()->setFlashdata('message', 'Data Produk Berhasil Ditambahkan');
        return redirect()->to('/produk');

    }

    public function edit($id)
    {
        $modelproduk = new ProdukModel();
        $modelkategori = new KategoriModel();
        $modelstatus = new StatusModel();

        $produkid = $modelproduk->join('status', 'status.id_status = produk.status_id')
        ->join('kategori', 'kategori.id_kategori = produk.kategori_id')
        ->where('produk.id_produk', $id)
        ->first();

        $data = [
            'title' => 'Edit Produk',
            'page' => 'Edit Produk',
            'produk' => $produkid,
            'kategori' => $modelkategori->findAll(),
            'status' => $modelstatus->findAll()
        ];

        return view('dashboard/editproduk' , $data);
    }

    public function update()
    {
        try{
            $modelproduk = new ProdukModel();

            // check apakah id produk ada atau tidak
            $produk = $modelproduk->find($this->request->getPost('id_produk'));
            if (!$produk) {
                session()->setFlashdata('message', 'Data Produk Tidak Ditemukan');
                return redirect()->to('/produk');
            }

            $data = [
                'id_produk' => $this->request->getPost('id_produk'),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'harga' => intval($this->request->getPost('harga_produk')),
                'status_id' => intval($this->request->getPost('status_produk')),
                'kategori_id' => intval($this->request->getPost('kategori_produk')),
            ];

            // check apakah ada perubahan data
            if( 
                $data['nama_produk'] == $produk['nama_produk'] &&
                $data['harga'] == $produk['harga'] &&
                $data['status_id'] == $produk['status_id'] &&
                $data['kategori_id'] == $produk['kategori_id']
            ){
                session()->setFlashdata('message', 'Data Produk Tidak Ada Perubahan');
                return redirect()->to('/produk');
            }else{
                $modelproduk->update($data['id_produk'], $data);
                session()->setFlashdata('message', 'Data Produk Berhasil Diubah');
                return redirect()->to('/produk');
            }
        
        }catch(\Exception $e){
            session()->setFlashdata('message', 'Data Produk Gagal Diubah');
            return redirect()->to('/produk');
        }
    }

    public function delete()
    {
        try{
            $modelproduk = new ProdukModel();
            $modelproduk->delete($this->request->getPost('id_produk'));
            session()->setFlashdata('message', 'Data Produk Berhasil Dihapus');
            return redirect()->to('/produk');
        }catch(\Exception $e){
            session()->setFlashdata('message', 'Data Produk Gagal Dihapus');
            return redirect()->to('/produk');
        }
    }
}
