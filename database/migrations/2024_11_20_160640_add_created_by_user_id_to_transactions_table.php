<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->foreignId('created_by_user_id') // Kolom foreign key
                    ->nullable() // Jika diperlukan, bisa dijadikan nullable
                    ->constrained('users') // Menghubungkan ke tabel users
                    ->onDelete('cascade'); // Hapus transaction jika user dihapus
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            Schema::table('transactions', function (Blueprint $table) {
                $table->dropForeign(['created_by_user_id']); // Hapus foreign key
                $table->dropColumn('created_by_user_id'); // Hapus kolom
            });
        });
    }
};
