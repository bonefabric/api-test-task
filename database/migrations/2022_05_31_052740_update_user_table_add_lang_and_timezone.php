<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTableAddLangAndTimezone extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->char('language')->default('ru');
            $table->tinyInteger('timezone')->default(3);
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['language', 'timezone']);
        });
    }
}
