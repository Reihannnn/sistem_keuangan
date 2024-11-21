<?php

namespace App\Observers;


use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;


class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Category::create([
            'user_id' => $user->id,
            'name' => 'Default Category', // atau sesuai kebutuhan Anda
        ]);

        Transaction::create([
            'user_id' => $user->id,
            'amount' => 0,  // atau sesuai kebutuhan Anda
            'description' => 'Initial transaction',  // atau sesuai kebutuhan
        ]);

    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
