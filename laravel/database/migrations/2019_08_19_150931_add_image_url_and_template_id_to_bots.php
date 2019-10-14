<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageUrlAndTemplateIdToBots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bots', function (Blueprint $table) {
            $table->string('image_url');
            $table->integer('template_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bots', function (Blueprint $table) {
            $table->dropColumn('image_url');
            $table->dropColumn('template_id');
        });
    }
}
