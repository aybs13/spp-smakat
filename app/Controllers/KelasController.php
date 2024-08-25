<?php

namespace App\Controllers;

use App\Models\KelasModel;
use CodeIgniter\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $model = new KelasModel();
        $data['kelas'] = $model->findAll();
        return view('kelas/index', $data);
    }

    public function create()
    {
        return view('kelas/create');
    }

    public function store()
    {
        $model = new KelasModel();
        $data = ['nama_kelas' => $this->request->getVar('nama_kelas')];
        $model->save($data);
        return redirect()->to('/kelas');
    }

    public function edit($id)
    {
        $model = new KelasModel();
        $data['kelas'] = $model->find($id);
        return view('kelas/edit', $data);
    }

    public function update($id)
    {
        $model = new KelasModel();
        $data = ['nama_kelas' => $this->request->getVar('nama_kelas')];
        $model->update($id, $data);
        return redirect()->to('/kelas');
    }

    public function delete($id)
    {
        $model = new KelasModel();
        $model->delete($id);
        return redirect()->to('/kelas');
    }
}
