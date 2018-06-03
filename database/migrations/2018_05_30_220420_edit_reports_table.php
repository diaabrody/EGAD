<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->smallInteger('gender')->nullable();
            $table->string('photo')->nullable();
            $table->string('special_sign')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->date('lost_since')->nullable();
            $table->date('found_since')->nullable();
            $table->point('last_seen_at')->nullable();
            $table->dateTime('last_seen_on')->nullable();
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
