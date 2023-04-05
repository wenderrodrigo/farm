<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->string('active_principle', 100)->after('bar_code'); // Ordenado após a coluna "name";
            $table->string('dosage', 50)->after('active_principle');
            $table->string('pharmaceutical_form', 100)->after('dosage');
            $table->boolean('doctors_prescription')->after('pharmaceutical_form');
            $table->string('use_restrictions', 200)->after('doctors_prescription');
            $table->string('product_image', 200)->after('use_restrictions');
            $table->string('records', 200)->after('product_image');
            $table->string('weight_or_volume', 20)->after('records');
            $table->string('nutritional_information', 200)->after('weight_or_volume');
            $table->string('certifications', 200)->after('nutritional_information');
            $table->string('storage_information', 200)->after('certifications');
            $table->string('packing_form', 200)->after('storage_information');
            $table->string('online_sales_information', 200)->after('packing_form');
            $table->string('tax_identification', 200)->after('online_sales_information');
            $table->decimal('profit_margin', 10, 2)->after('tax_identification');
            $table->decimal('minimum_stock', 10, 2)->after('profit_margin');
            $table->decimal('maximum_stock', 10, 2)->after('minimum_stock');
            $table->decimal('promotions', 10, 2)->after('maximum_stock');
            
            $table->unsignedBigInteger('countries_id')->after('promotions');
            $table->foreign('countries_id')->references('id')->on('countries');
            
            $table->unsignedBigInteger('manufacturers_id')->after('countries_id');
            $table->foreign('manufacturers_id')->references('id')->on('manufacturer_products');
            
            $table->unsignedBigInteger('product_category_id')->after('manufacturers_id');
            $table->foreign('product_category_id')->references('id')->on('product_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['countries_id']);
            $table->dropForeign(['manufacturers_id']);
            $table->dropForeign(['product_category_id']);
        });
    }
};
