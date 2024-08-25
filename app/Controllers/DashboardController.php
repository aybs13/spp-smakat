<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\KelasModel;
use App\Models\JurusanModel;
use App\Models\PembayaranModel;
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('user')) {
            return redirect()->to('/login');
        }

        // Ambil data user dari session
        $user = session()->get('user');

        // Jika user adalah admin, ambil data dari database
        if ($user['role'] == 'admin') {
            // Inisialisasi model
            $userModel = new UserModel();
            $kelasModel = new KelasModel();
            $jurusanModel = new JurusanModel();
            $pembayaranModel = new PembayaranModel();

            // Hitung jumlah siswa
            $jumlahSiswa = $userModel->where('role', 'siswa')->countAllResults();

            // Hitung jumlah kelas
            $jumlahKelas = $kelasModel->countAllResults();

            // Hitung jumlah jurusan
            $jumlahJurusan = $jurusanModel->countAllResults();

            // Hitung total pembayaran (hanya yang sudah dibayar)
            $totalPembayaran = $pembayaranModel->where('status', 'sudah_bayar')->selectSum('jumlah')->get()->getRow()->jumlah;

            // Kirim data ke view
            $data = [
                'jumlahSiswa' => $jumlahSiswa,
                'jumlahKelas' => $jumlahKelas,
                'jumlahJurusan' => $jumlahJurusan,
                'totalPembayaran' => $totalPembayaran,
            ];

            return view('dashboard/admin', $data); // Halaman dashboard admin dengan data
        } 
        // Jika user adalah siswa, tampilkan dashboard siswa
        else if ($user['role'] == 'siswa') {
            return view('dashboard/siswa'); // Halaman siswa
        } 
        else {
            // Jika role tidak diketahui, redirect ke halaman login
            return redirect()->to('/login')->with('error', 'Role tidak valid.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
