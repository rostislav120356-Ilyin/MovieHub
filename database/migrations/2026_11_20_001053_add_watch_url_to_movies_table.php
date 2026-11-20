<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('movies', 'watch_url')) {
            Schema::table('movies', function (Blueprint $table) {
                $table->text('watch_url')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('movies', 'watch_url')) {
            Schema::table('movies', function (Blueprint $table) {
                $table->dropColumn('watch_url');
            });
        }
    }
};
