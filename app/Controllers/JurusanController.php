<?php

namespace App\Controllers;

use App\Models\JurusanModel;
use CodeIgniter\Controller;

class JurusanController extends Controller
{
    public function index()
    {
        $model = new JurusanModel();
        $data['jurusan'] = $model->findAll();
        return view('jurusan/index', $data);
    }

    public function create()
    {
        return view('jurusan/create');
    }

    public function store()
    {
        $model = new JurusanModel();
        $data = ['nama_jurusan' => $this->request->getVar('nama_jurusan')];
        $model->save($data);
        return redirect()->to('/jurusan');
    }

    public function edit($id)
    {
        $model = new JurusanModel();
        $data['jurusan'] = $model->find($id);
        return view('jurusan/edit', $data);
    }

    public function update($id)
    {
        $model = new JurusanModel();
        $data = ['nama_jurusan' => $this->request->getVar('nama_jurusan')];
        $model->update($id, $data);
        return redirect()->to('/jurusan');
    }

    public function delete($id)
    {
        $model = new JurusanModel();
        $model->delete($id);
        return redirect()->to('/jurusan');
    }
}
