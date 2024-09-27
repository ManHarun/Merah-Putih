<?php

use App\Models\User;
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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('tanggal_lahir');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('registration_date')->useCurrent();
            $table->foreignId('user_id')->constrained(
                table:'users',
                indexName:'registrations_user_id'
            );
            $table->foreignId('category_id')->constrained(
                table:'categories',
                indexName:'registrations_category_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
