<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\UserModel;
use Config\Midtrans;


class PembayaranController extends BaseController
{
    public function index()
{
    $userId = session()->get('user')['id'];
    $pembayaranModel = new PembayaranModel();

    // Ambil tahun dan bulan saat ini
    $currentYear = date('Y');
    $currentMonth = date('m');

    // Daftar bulan SPP (misalnya dari Januari hingga Desember)
    $daftarBulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
        '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
        '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    // Cek daftar pembayaran SPP yang sudah ada di database
    $pembayaranExist = $pembayaranModel->where('user_id', $userId)
                                       ->where('tahun_ajaran', $currentYear)
                                       ->findAll();

    // Buat array untuk menyimpan pembayaran otomatis
    $dataPembayaran = [];

    // Generate daftar pembayaran otomatis berdasarkan bulan yang belum ada di database
    foreach ($daftarBulan as $bulanKey => $bulanName) {
        $isExist = false;
        foreach ($pembayaranExist as &$exist) {
            if ($exist['bulan'] == $bulanKey) {
                $isExist = true;
                // Tambahkan nama bulan ke pembayaran yang sudah ada
                $exist['bulan_name'] = $bulanName;
                $dataPembayaran[] = $exist; // Pembayaran yang sudah ada
            }
        }

        // Jika pembayaran belum ada, tambahkan ke daftar pembayaran
        if (!$isExist && $bulanKey <= $currentMonth) {
            $newPayment = [
                'user_id' => $userId,
                'bulan' => $bulanKey,
                'bulan_name' => $bulanName,
                'tahun_ajaran' => $currentYear,
                'jumlah' => 250000, // Sesuaikan jumlah SPP
                'status' => 'belum_bayar'
            ];

            // Simpan ke database pembayaran yang baru dibuat
            $newPaymentId = $pembayaranModel->insert($newPayment);
            $newPayment['id'] = $newPaymentId;  // Dapatkan ID yang baru dimasukkan

            $dataPembayaran[] = $newPayment;
        }
    }

    // Kirim data pembayaran ke view
    return view('pembayaran/index', ['pembayaran' => $dataPembayaran]);
}

public function bayar($id)
{
    $model = new PembayaranModel();
    $pembayaran = $model->find($id);

    if (!$pembayaran || $pembayaran['status'] == 'sudah_bayar') {
        return redirect()->back()->with('error', 'Pembayaran tidak valid atau sudah dibayar.');
    }

    // Daftar bulan
    $daftarBulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
        '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
        '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    // Ambil nama bulan berdasarkan kode bulan
    $bulanName = $daftarBulan[$pembayaran['bulan']] ?? 'Bulan Tidak Diketahui';

    // Konfigurasi Midtrans
    Midtrans::config();

    // Data transaksi
    $transactionDetails = [
        'order_id' => 'ORDER-' . time(),
        'gross_amount' => $pembayaran['jumlah']
    ];

    $itemDetails = [
        [
            'id' => $pembayaran['id'],
            'price' => $pembayaran['jumlah'],
            'quantity' => 1,
            'name' => 'Pembayaran SPP Bulan ' . $bulanName
        ]
    ];

    $customerDetails = [
        'first_name' => session()->get('user')['name'],
    ];

    // SNAP Token
    $snapToken = \Midtrans\Snap::getSnapToken([
        'transaction_details' => $transactionDetails,
        'item_details' => $itemDetails,
        'customer_details' => $customerDetails
    ]);

    // Pastikan bulan_name dikirim ke view
    $data = [
        'snapToken' => $snapToken,
        'pembayaran' => $pembayaran,
        'bulan_name' => $bulanName  // Tambahkan bulan_name di sini
    ];

    return view('pembayaran/bayar', $data);
}


    public function selesai()
    {
        $model = new PembayaranModel();

        // Simpan transaksi setelah pembayaran selesai
        $data = [
            'status' => 'sudah_bayar',
            'midtrans_order_id' => $this->request->getVar('order_id'),
            'midtrans_transaction_id' => $this->request->getVar('transaction_id')
        ];

        $model->update($this->request->getVar('pembayaran_id'), $data);

        return redirect()->to('/pembayaran')->with('success', 'Pembayaran berhasil.');
    }

    public function riwayat()
    {
        $userId = session()->get('user')['id'];
        $model = new PembayaranModel();
        $data['pembayaran'] = $model->where('user_id', $userId)->where('status', 'sudah_bayar')->findAll();

        return view('pembayaran/riwayat', $data);
    }

    public function laporan()
    {
        $model = new PembayaranModel();
        
        // Ambil tahun ajaran yang dipilih (jika ada)
        $selected_year = $this->request->getVar('tahun_ajaran') ?? ''; // Default value to empty string
        
        // Ambil daftar tahun ajaran yang tersedia secara unik
        $available_years = $model->select('tahun_ajaran')->distinct()->orderBy('tahun_ajaran', 'desc')->findAll();
        
        // Query untuk mengambil data pembayaran
        $query = $model->select('pembayaran.*, users.name as nama_siswa')
                        ->join('users', 'users.id = pembayaran.user_id')
                        ->where('status', 'sudah_bayar');
        
        // Filter berdasarkan tahun ajaran yang dipilih
        if ($selected_year) {
            $query->where('tahun_ajaran', $selected_year);
        }
        
        $pembayaran = $query->findAll();
        
        // Daftar bulan
        $daftarBulan = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];
    
        // Tambahkan nama bulan ("bulan_name") ke setiap pembayaran
        foreach ($pembayaran as &$item) {
            if (isset($item['bulan']) && array_key_exists($item['bulan'], $daftarBulan)) {
                $item['bulan_name'] = $daftarBulan[$item['bulan']];
            } else {
                $item['bulan_name'] = 'Bulan Tidak Diketahui'; // Default value jika bulan tidak ada
            }
        }
        
        $data['pembayaran'] = $pembayaran;
        $data['available_years'] = $available_years;
        $data['selected_year'] = $selected_year; // Pastikan ini dikirim ke view
        
        return view('pembayaran/laporan', $data);
    }
    
}
