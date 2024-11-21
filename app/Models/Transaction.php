<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'category_name',
        'date_transaction',
        'category_is_expense',
        'amount',   
        'note',
        'image',
        'created_by_user_id',

    ];

    public function category(): BelongsTo{

        return $this->belongsTo(Category::class);
    }

    public function scopeExpense($query){
        return $query->whereHas('category',function($query){
            $query->where('is_expense',true);
        });
    }

    public function scopeIncomes($query){
        return $query->whereHas('category',function($query){
            $query->where('is_expense',false);
        });
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
   
    protected static function booted(){
    static::saving(function ($transaction) {
        // Sinkronisasi nama kategori dari relasi
        $transaction->category_name = $transaction->category->name ?? 'Unknown';
        $transaction->category_is_expense = $transaction->category->is_expense ?? false;
    });
}

    protected static ?string $model = Transaction::class;


}


