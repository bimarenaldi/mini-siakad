<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\tbl_kelas;

class kelas extends Controller
{
    public function index()
    {
        $model = new tbl_kelas();
        $data['kelas'] = $model->getKelas()->getResult();
        echo view('kelas_view', $data);
    }

    public function save()
    {
        $request = \Config\Services::request();
        $model = new tbl_kelas();
        $data = array(
            'nama_kelas' => $request->getVar('nama_kelas'),
        );
        $model->saveKelas($data);
        return redirect()->to('/kelas');
    }

    public function update()
    {
        $request = \Config\Services::request();
        $model = new tbl_kelas();
        $id = $request->getVar('kelas_id');
        $data = array(
            'nama_kelas' => $request->getVar('nama_kelas'),
        );
        $model->updateKelas($data,$id);
        return redirect()->to('/kelas');
    }

    public function delete()
    {
        $request = \Config\Services::request();
        $model = new tbl_kelas();
        $id = $request->getVar('kelas_id');
        $model->deleteKelas($id);
        return redirect()->to('/kelas');
    }

}