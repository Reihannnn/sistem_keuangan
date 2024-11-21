<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Transaction;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;   

    protected function getStats(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
        Carbon::parse($this->filters['startDate']) :
        null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
        Carbon::parse($this->filters['endDate']) :
        now();


        $pemasukan = Transaction::incomes()
                    ->get()->whereBetween('date_transaction',[$startDate,$endDate])
                    ->sum('amount');

        $pengeluaran= Transaction::expense()
                    ->get()->whereBetween('date_transaction',[$startDate,$endDate])
                    ->sum('amount');

        $selisih = $pemasukan - $pengeluaran;

        $formatRupiah = function ($value) {
            return 'Rp ' . number_format($value, 0, ',', '.');
        };
        
        return [

            Stat::make('Total Pemasukan',$formatRupiah($pemasukan))
            ->color("success"),    
            Stat::make('Total Pengeluaran', $formatRupiah($pengeluaran))
            ->color("danger"),
            Stat::make('Selisih', $formatRupiah($selisih)),

        ];
    }
}
