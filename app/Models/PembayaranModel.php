<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $allowedFields = ['user_id', 'bulan', 'tahun_ajaran', 'jumlah', 'status', 'midtrans_order_id', 'midtrans_transaction_id'];
}
