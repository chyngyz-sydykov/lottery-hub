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
        Schema::create('groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->integer('participant_limit')->nullable();
            $table->timestamp('finishing_date')->nullable();
            $table->boolean('is_archived')->default(false);
            $table->decimal('price', 10, 2);
            $table->decimal('prize_pool', 10, 2)->default(0)->nullable();
            $table->string('status', 20)->default('public');
            $table->timestamps();

            $table->index('finishing_date');
            $table->index('prize_pool');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropIndex(['finishing_date']);
            $table->dropIndex(['prize_pool']);
        });

        Schema::dropIfExists('groups');
    }
};
