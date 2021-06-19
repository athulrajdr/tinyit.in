<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->text('long_url');
            $table->string('url_slug', 150)->unique();
            $table->bigInteger('clicks_count')->default(0);
            $table->string('session_temp_key', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('link_clicks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_id');
            $table->dateTime('clicked_at')->nullable();
            $table->string('ip', 17)->nullable();
            $table->timestamps();
            $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clicks');
        Schema::dropIfExists('links');
    }
}
