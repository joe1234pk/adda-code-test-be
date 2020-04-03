<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guid')->nullable();
            $table->string('suburb');
            $table->string('state');
            $table->string('country');
            $table->timestamps();

        });

        Schema::create('analytic_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('units');
            $table->tinyInteger('is_numeric')->default(0);
            $table->integer('num_decimal_places')->nullable();
            $table->timestamps();
        });

        Schema::create('property_analytics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('property_id');
            $table->unsignedInteger('analytic_type_id');
            $table->text('value')->nullable();
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('analytic_type_id')->references('id')->on('analytic_types')->onDelete('cascade')->onUpdate('cascade');
        });


        \Artisan::call('db:seed', [
            '--class' => 'InitDatabaseSeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_analytics');
        Schema::dropIfExists('analytic_types');
        Schema::dropIfExists('properties');
    }
}
