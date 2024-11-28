<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Inisialisasi query untuk mengambil transaksi berdasarkan ID pengguna yang sedang login
        $query = Transaction::where('created_by_user_id', $userId);

        // Cek apakah ada filter "Nama" di tableFilters
        if ($request->has('tableFilters.Nama.value')) {
            $filterUserId = $request->input('tableFilters.Nama.value'); // Ambil nilai filter Nama
            $user = User::find($filterUserId);  // Temukan user berdasarkan ID
            $query->where('created_by_user_id', $filterUserId); // Filter berdasarkan ID user
        }

        // Ambil hasil query
        $transactions = $query->get();

        // Inisialisasi variabel untuk menyimpan total pemasukan dan pengeluaran
        $incomes = 0;
        $expenses = 0;

        // Loop untuk menghitung pemasukan dan pengeluaran
        foreach ($transactions as $transaction) {
            
            if ($transaction->category_is_expense == 0) {
                // Pemasukan
                $incomes += $transaction->amount;
            } else {
                // Pengeluaran
                $expenses += $transaction->amount;
            }
        }

        // Hitung selisih
        $balance = $incomes - $expenses;

        // Ambil data pengguna yang sedang login
        $user = Auth::user();
        

        // Tampilkan view dengan data transaksi dan data user
        return view('dashboard', [
            'user' => $user,
            'incomes' => $incomes,
            'expenses' => $expenses,
            'balance' => $balance
        ]);
    }
}
