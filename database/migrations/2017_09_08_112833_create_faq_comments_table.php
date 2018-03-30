<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->text('comment_text');
            $table->string('user_name')->default('');
            $table->string('user_email')->default('');
            $table->string('user_role')->default('');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('faq_comments');
    }
}
