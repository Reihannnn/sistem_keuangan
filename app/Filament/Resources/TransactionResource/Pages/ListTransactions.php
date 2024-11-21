<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;


class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('generatePdf')
            ->label('Generate PDF')  // Label tombol
            ->icon('heroicon-o-document')  // Ikon untuk tombol
            ->color('primary')  // Warna tombol
            ->url(fn () => url('/transactions/generate-pdf?' . http_build_query(request()->query()))) // Konversi query menjadi string
        ];
    }
}
