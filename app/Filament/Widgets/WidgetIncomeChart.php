<?php

// namespace App\Filament\Widgets;

// use Illuminate\Support\Carbon;
// use Filament\Widgets\ChartWidget;
// use Flowframe\Trend\Trend;
// use Flowframe\Trend\TrendValue;
// use App\Models\Transaction;
// use Filament\Widgets\Concerns\InteractsWithPageFilters;

// class WidgetIncomeChart extends ChartWidget
// {
//     use InteractsWithPageFilters;
    
//     protected static ?string $heading = 'Pemasukan';
//     protected static string $color = 'success';
    
//     protected function getData(): array
//     {
        
//         $startDate = ! is_null($this->filters['startDate'] ?? null) ?
//         Carbon::parse($this->filters['startDate']) :
//         null;
        
//         $endDate = ! is_null($this->filters['endDate'] ?? null) ?
//         Carbon::parse($this->filters['endDate']) :
//         now();
        
//         $data = Trend::query(Transaction::query()->incomes())
//         ->between(
//             start: $startDate,
//             end: $endDate,
//             )
//             ->perDay()
//             ->sum('amount');
            
//             dd($startDate, $endDate);
//             dd($data->toArray());   
//     return [
//         'datasets' => [
//             [
//                 'label' => 'Blog posts',
//                 'data' => $data->map(fn (TrendValue $value) => $value->aggregate)->toArray(),
//             ],
//         ],
//         'labels' => $data->map(fn (TrendValue $value) => $value->date),
//     ];

//     }

//     protected function getType(): string
//     {
//         return 'line';
//     }
// }
