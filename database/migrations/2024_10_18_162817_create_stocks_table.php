<?php

use App\Enums\StockUnit;
use App\Enums\StockTypes;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredient_id');
            $table->integer('stock');
            $table->boolean('stock_alert')->default(0);
            $table->enum('unit', StockUnit::getAllValues())
                ->default(StockUnit::KG->value);
            $table->enum('stock_type', StockTypes::getAllValues())
                ->default(StockTypes::IN->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
