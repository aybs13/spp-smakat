<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\KelasModel;
use App\Models\JurusanModel;

class UserController extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function profil()
    {
        // Ambil data siswa dari session
        $siswa = session()->get('user'); 

        // Jika data siswa tidak ditemukan, redirect ke login
        if (!$siswa) {
            return redirect()->to('/login');
        }

        // Tampilkan profil siswa
        return view('users/profil', ['siswa' => $siswa]);
    }

    public function create()
    {
        // Ambil data kelas dan jurusan dari model
        $kelasModel = new KelasModel();
        $jurusanModel = new JurusanModel();

        $data['kelas'] = $kelasModel->findAll();
        $data['jurusan'] = $jurusanModel->findAll();

        return view('users/create', $data); // Kirim data ke view
    }

    public function store()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'name' => $this->request->getVar('name'),
            'nisn' => $this->request->getVar('nisn'),
            'role' => $this->request->getVar('role'),
            'class' => $this->request->getVar('class'),
            'jurusan' => $this->request->getVar('jurusan'),
            'birth_place' => $this->request->getVar('birth_place'),
            'birth_date' => $this->request->getVar('birth_date'),
            'address' => $this->request->getVar('address'),
            'gender' => $this->request->getVar('gender'),
        ];

        $model->save($data);
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'name' => $this->request->getVar('name'),
            'nisn' => $this->request->getVar('nisn'),
            'role' => $this->request->getVar('role'),
            'class' => $this->request->getVar('class'),
            'jurusan' => $this->request->getVar('jurusan'),
            'birth_place' => $this->request->getVar('birth_place'),
            'birth_date' => $this->request->getVar('birth_date'),
            'address' => $this->request->getVar('address'),
            'gender' => $this->request->getVar('gender'),
        ];

        $model->update($id, $data);
        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users');
    }
}
