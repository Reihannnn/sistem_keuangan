<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #007bff;
            margin: 30px 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Card Styles */
        .card {
            background-color: #fff;
            width: 100%;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #007bff;
        }

        .card p {
            font-size: 1.1rem;
            margin-bottom: 8px;
        }

        .card strong {
            font-weight: bold;
            color: #555;
        }

        /* Grid Layout */
        .grid {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 12px 20px;
            font-size: 1.1rem;
            text-align: center;
            color: #fff;
            background-color: #007bff;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #28a745;
        }

        .btn-secondary:hover {
            background-color: #218838;
        }

        /* Footer Styles */
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 1rem;
            color: #777;
        }

        /* Media Queries for Mobile Responsiveness */
        @media (max-width: 768px) {
            .grid {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 2rem;
            }
        }

        
    </style>
</head>
<body>

    <div class="container">
        <!-- Dashboard Header -->
        <h1>Dashboard Pengguna</h1>

        <!-- User Info Card -->
        <div class="card">
            <h3>Informasi Pengguna</h3>
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <!-- Income and Expense Cards -->
        <div class="grid">
            <div class="card" style="background-color: #e6f7ff; color:green;">
                <h3 style="color:green;">Total Pemasukan</h3>
                <p>{{ number_format($incomes, 2) }}</p>
            </div>

            <div class="card" style="background-color: #fff4e6;">
                <h3 style="color:red;">Total Pengeluaran</h3>
                <p style="color:red;">{{ number_format($expenses, 2) }}</p>
            </div>
        </div>

        <!-- Balance Card -->
        <div class="card" style="background-color: #f0f9ff;">
            <h3>Selisih</h3>
            <p>{{ number_format($balance, 2) }}</p>
        </div>

        <!-- Action Buttons -->
        <div class="grid">
            <a href="http://127.0.0.1:8000/dashboard/categories" class="btn">Category</a>
            <a href="http://127.0.0.1:8000/dashboard/transactions" class="btn btn-secondary">Transaction</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2024 Dashboard</p>
        </div>
    </div>

</body>
</html>
