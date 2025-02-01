<?php

namespace App\Controllers;
use  App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\StatusModel;

class ProductController extends BaseController
{
    // untuk menampilkan halaman produk
    public function index(): string
    {
        // dd($_GET['filter']);
        // deklarasi model
        $modelproduk = new ProdukModel();
        // jika ada filter dapat di jual
        if(isset($_GET['filter']) && $_GET['filter'] == 'dapat di jual'){
            $data['produk'] = $modelproduk->join('status', 'status.id_status = produk.status_id')->where('status.nama_status', 'bisa dijual')
            ->join('kategori', 'kategori.id_kategori = produk.kategori_id')
            ->orderBy('id_produk', 'DESC')
            ->paginate(10);

            $data['filter'] = 'dapat di jual';
        }else if(isset($_GET['filter']) && $_GET['filter'] == 'tidak dapat di jual'){
            // jika ada filter tidak dapat di jual
            $data['produk'] = $modelproduk->join('status', 'status.id_status = produk.status_id')->where('status.nama_status', 'tidak bisa dijual')
            ->join('kategori', 'kategori.id_kategori = produk.kategori_id')
            ->orderBy('id_produk', 'DESC')
            ->paginate(10);

            $data['filter'] = 'tidak dapat di jual';        
        }else{
            // jika tidak ada filter maka tampilkan semua data produk
            $data['produk'] = $modelproduk->join('kategori', 'kategori.id_kategori = produk.kategori_id')
            ->join('status', 'status.id_status = produk.status_id')
            ->orderBy('id_produk', 'DESC')
            ->paginate(10);

            $data['filter'] = 'semua';
        }
        

        // deklarasi variabel
        $data = [
            'title' => 'Produk',
            'page' => 'Produk',
            'produk' => $data['produk'],
            'filter' => $data['filter'],
            'pager' => $modelproduk->pager
            
        ];
        // menampilkan halaman produk dengan format view
        return view('dashboard/produk' , $data);
    }

    public function create() : string
    {
        // deklarasi model
        $modelkategori = new KategoriModel();
        $modelstatus = new StatusModel();
        // deklarasi variabel
        $data = [
            'title' => 'Tambah Produk',
            'page' => 'dashboard',
            'kategori' => $modelkategori->findAll(),
            'status' => $modelstatus->findAll()
        ];
        // menampilkan halaman produk dengan format view
        return view('dashboard/addproduk' , $data);
    }

    public function store()
    {    
        // deklarasi model
        $modelproduk = new ProdukModel();
        
        // deklarasi variabel
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => intval($this->request->getPost('harga_produk')),
            'status_id' => intval($this->request->getPost('status_produk')),
            'kategori_id' => intval($this->request->getPost('kategori_produk')),
        ];
        // insert data produk
        $modelproduk->insert($data);
        
        // set flash data
        session()->setFlashdata('message', 'Data Produk Berhasil Ditambahkan');
        // redirect ke halaman produk
        return redirect()->to('/produk');

    }

    public function edit($id)
    {
        // deklarasi model
        $modelproduk = new ProdukModel();
        $modelkategori = new KategoriModel();
        $modelstatus = new StatusModel();

        // deklarasi variabel berdasarkan id
        $produkid = $modelproduk->join('status', 'status.id_status = produk.status_id')
        ->join('kategori', 'kategori.id_kategori = produk.kategori_id')
        ->where('produk.id_produk', $id)
        ->first();

        // deklarasi variabel
        $data = [
            'title' => 'Edit Produk',
            'page' => 'Edit Produk',
            'produk' => $produkid,
            'kategori' => $modelkategori->findAll(),
            'status' => $modelstatus->findAll()
        ];
        // menampilkan halaman produk dengan format view
        return view('dashboard/editproduk' , $data);
    }

    public function update()
    {   
        try{
            // deklarasi model
            $modelproduk = new ProdukModel();

            // check apakah id produk ada atau tidak
            $produk = $modelproduk->find($this->request->getPost('id_produk'));
            if (!$produk) {
                // set flash data
                session()->setFlashdata('message', 'Data Produk Tidak Ditemukan');
                // redirect ke halaman produk

                return redirect()->to('/produk');
            }
            // deklarasi variabel

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
                // set flash data
                session()->setFlashdata('message', 'Data Produk Tidak Ada Perubahan');
                // redirect ke halaman produk
                return redirect()->to('/produk');
            }else{
                // update data
                $modelproduk->update($data['id_produk'], $data);
                // set flash data
                session()->setFlashdata('message', 'Data Produk Berhasil Diubah');
                // redirect ke halaman produk
                return redirect()->to('/produk');
            }
        
        }catch(\Exception $e){
            // set flash data
            session()->setFlashdata('message', 'Data Produk Gagal Diubah');
            // redirect ke halaman produk
            return redirect()->to('/produk');
        }
    }

    public function delete()
    {
        try{
            // deklarasi model
            $modelproduk = new ProdukModel();
            // delete data produk berdasarkan id
            $modelproduk->delete($this->request->getPost('id_produk'));
            // set flash data
            session()->setFlashdata('message', 'Data Produk Berhasil Dihapus');
            // redirect ke halaman produk
            return redirect()->to('/produk');
        }catch(\Exception $e){
            // set flash data
            session()->setFlashdata('message', 'Data Produk Gagal Dihapus');
            // redirect ke halaman produk
            return redirect()->to('/produk');
        }
    }
}
