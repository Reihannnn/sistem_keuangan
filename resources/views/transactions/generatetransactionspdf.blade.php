<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }

        h1, h2 {
            color: #2c3e50;
        }

        p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
        }

        table thead {
            background-color: #2c3e50;
            color: #fff;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e8f4ff;
        }

        .summary-table {
            width: 50%;
            margin: 0 auto;
        }

        .summary-table thead {
            background-color: #3498db;
        }

        .summary-table td {
            font-weight: bold;
            text-align: center;
        }

        .income {
            color: #27ae60;
        }

        .expense {
            color: #e74c3c;
        }

        .balance {
            color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p><strong>Tanggal:</strong> {{ $date }}</p>
    <p><strong>Pemilik:</strong> {{ $user }}</p>

    <!-- Table Pemasukan -->
    <h2>Pemasukan</h2>
    <table>
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                @if (!$transaction->category_is_expense)
                <tr>
                   
                    <td>{{ $transaction->category_name }}</td>
                    <td>{{ $transaction->date_transaction }}</td>
                    <td class="income">{{ number_format($transaction->amount, 0, ',', '.') }}</td>
                  
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <!-- Table Pengeluaran -->
    <h2>Pengeluaran</h2>
    <table>
        <thead>
            <tr>
                
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                @if ($transaction->category_is_expense)
                <tr>
                   
                    <td>{{ $transaction->category_name }}</td>
                    <td>{{ $transaction->date_transaction }}</td>
                    <td class="expense">{{ number_format($transaction->amount, 0, ',', '.') }}</td>
                    
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <!-- Summary -->
    <h2>Ringkasan</h2>
    <table class="summary-table">
        <thead>
            <tr>
                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Selisih</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalIncome = $transactions->where('category_is_expense', false)->sum('amount');
                $totalExpense = $transactions->where('category_is_expense', true)->sum('amount');
                $balance = $totalIncome - $totalExpense;
            @endphp
            <tr>
                <td class="income">{{ number_format($totalIncome, 0, ',', '.') }}</td>
                <td class="expense">{{ number_format($totalExpense, 0, ',', '.') }}</td>
                <td class="balance">{{ number_format($balance, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
