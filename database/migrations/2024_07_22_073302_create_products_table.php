<?php

use App\Enums\DiscountTypes;
use App\Enums\ProductSource;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('barcode')
                ->nullable();
            $table->boolean('active')
                ->default(false);
            $table->enum('source', ProductSource::getAllValues())
                ->default(ProductSource::MANUAL->value);
            $table->float('cost');
            $table->float('price');
            $table->float('discount')->nullable();
            $table->enum('discount_type', DiscountTypes::getAllValues())->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('locale');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->timestamps();

            $table->unique(['product_id', 'locale']);
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('is_main')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_translations');
        Schema::dropIfExists('products');
    }
};
