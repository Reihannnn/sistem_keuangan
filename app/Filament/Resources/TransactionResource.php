<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;

use Filament\Tables;
use Filament\Tables\Table;

class TransactionResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $model = Transaction::class;     
    
    public static function form(Form $form): Form
    {
       
        
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
            ->required()
            ->maxLength(255),
            Forms\Components\Select::make('category_id')
            ->relationship('category','name')
            ->required(),
            Forms\Components\DatePicker::make('date_transaction')
            ->required(),
            Forms\Components\TextInput::make('amount')
            ->required()
            ->numeric(),
            Forms\Components\TextInput::make('note')
            ->required()
            ->maxLength(255),
            Forms\Components\FileUpload::make('image')
            ->image()
            ->required(),
            Forms\Components\TextInput::make('created_by_user_id') 
            ->default(auth()->id())
            ->required(),
            
        ]);
    }
    
    public static function table(Table $table): Table
    {

        return $table
        ->columns([
            Tables\Columns\ImageColumn::make('category.image')
            ->sortable(),
            Tables\Columns\TextColumn::make('category.name')    
            ->description(fn(Transaction $record ): string => $record->name)                
            ->label("Name"),
            Tables\Columns\IconColumn::make('category.is_expense')
            ->label("kas")
            ->trueIcon('heroicon-o-arrow-up-circle')
            ->falseIcon('heroicon-o-arrow-down-circle')
            ->trueColor('danger')
            ->falseColor('success')
            ->boolean(),               
            Tables\Columns\TextColumn::make('date_transaction')
            ->label('Date')
            ->date()
            ->sortable(),
            Tables\Columns\TextColumn::make('amount')
            ->numeric()
            ->money('IDR',locale: 'id')
            ->sortable(), 
            Tables\Columns\TextColumn::make('created_at')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
            
            ])
            ->filters([
            // Filter berdasarkan user yang sedang login
            Tables\Filters\SelectFilter::make('Nama')
            ->relationship('user', 'name'),
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                
                    ])
                    ->bulkActions([
                        Tables\Actions\BulkActionGroup::make([
                            Tables\Actions\DeleteBulkAction::make(),
                        ]),
                    ]);
                   
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public function refreshPage(){
        return redirect(request()->url());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    } 


   

    
}
