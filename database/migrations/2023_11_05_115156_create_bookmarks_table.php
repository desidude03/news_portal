<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmarksTable extends Migration
{
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('article_id');
            $table->timestamps();

            // Define a unique constraint on user_id and article_id
            $table->unique(['user_id', 'article_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
}
