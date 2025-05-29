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
        Schema::table('cart_items', function (Blueprint $table) {
            $table->engine('InnoDB');
            $table->boolean('isHit')->default(false);
            $table->tinyInteger('quantity')
                ->unsigned()
                ->default(1)
                ->between(1, 10)
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
