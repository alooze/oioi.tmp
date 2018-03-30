<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->boolean('submit')->default(0);
            $table->text('steps');
            $table->string('title')->nullable();
            $table->string('based_on')->nullable();
            $table->string('country')->nullable();
            $table->string('project_status')->nullable();
            $table->string('genre')->nullable();
            $table->string('pitch_link')->nullable();
            $table->string('pitch_pass')->nullable();
            $table->string('pitch_file')->nullable();
            $table->double('total_budget')->nullable()->default(0);
            $table->double('fin_secured')->nullable()->default(0);
            $table->double('fin_required')->nullable()->default(0);
            $table->text('logline')->nullable();
            $table->text('synopsis')->nullable();
            $table->text('additional')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('artwork')->nullable();
            $table->string('script')->nullable();
            $table->string('fin_plan')->nullable();
            $table->string('detailed_budget')->nullable();
            $table->boolean('terms')->default(0);
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
        Schema::dropIfExists('films');
    }
}
