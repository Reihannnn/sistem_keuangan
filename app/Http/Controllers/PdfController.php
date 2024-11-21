<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Resources\Views\generatetransactionspdf;

class PdfController extends Controller
{
    public function generatePdf(Request $request)
    {
        $query = Transaction::query();
        
        
        // Cek apakah ada filter "Nama" di tableFilters
        if ($request->has('tableFilters.Nama.value')) {
            $userId = $request->input('tableFilters.Nama.value'); // Ambil nilai filter Nama
            $user = User::find($userId);  // Temukan user berdasarkan ID
            $query->where('created_by_user_id', $userId); // Filter berdasarkan ID user
        }
  
        
        // Ambil hasil query
        $transactions = $query->get();
        
        $data = [
            'title' => 'Laporan Keuangan',
            'date' => date('d/m/Y'),
            'user' => $user->name,
            'transactions' => $transactions,
        ];
        
        // Generate PDF
        $pdf = Pdf::loadView('transactions.generatetransactionspdf', $data);
        return $pdf->download('tabeltransactions.pdf');
        $this->emit('$refresh');
        
    }
    
    
}