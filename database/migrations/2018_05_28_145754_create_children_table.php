<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Grimzy\LaravelMysqlSpatial\Schema\Blueprint;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->smallInteger('gender')->nullable();
            $table->string('photo')->nullable();
            $table->string('special_sign')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->dateTime('lost_since')->nullable();
            $table->dateTime('found_since')->nullable();
            $table->point('last_seen_at')->nullable();
            $table->dateTime('last_seen_on')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
}
