<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("product_name");
            $table->string("product_id");
            $table->integer("buy_in");
            $table->text("product_url");
            $table->text("product_image_url");
            $table->text("game_link");
            $table->integer("post_id");
            $table->integer("prize");
            $table->integer("status")->default(0);
            $table->integer("check_ins")->default(0);
            $table->string("winner")->nullable();

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
        Schema::dropIfExists('games');
    }
}
