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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('section_id')->nullable()->constrained('sections')->cascadeOnDelete();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('location')->nullable();
            $table->decimal('reg_fee')->nullable();
            $table->string('description')->nullable();
            $table->string('category')->nullable();
            $table->string('poster')->nullable();
            $table->enum('status', User::$status)->nullable()->default('Active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
