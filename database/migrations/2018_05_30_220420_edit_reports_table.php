<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Grimzy\LaravelMysqlSpatial\Schema\Blueprint;


class EditReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->integer('user_id')->nullable(false)->change();
            $table->string('name')->nullable()->default('غير معروف');
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('photo')->nullable();
            $table->string('special_sign')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();            
            $table->date('lost_since')->nullable();
            $table->date('found_since')->nullable();
            $table->string('last_seen_at')->nullable();
            $table->point('location')->nullable();
            $table->date('last_seen_on')->nullable();
            $table->boolean('is_found')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
