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
        Schema::table('users', function (Blueprint $table) {
            $table->string('created_by')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_default_password_changed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('is_active');
            $table->dropColumn('is_default_password_changed');
        });
    }
};
