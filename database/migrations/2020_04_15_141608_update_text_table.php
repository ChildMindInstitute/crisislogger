<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text', function (Blueprint $table) {
            if (Schema::hasColumn('text', 'user_id'))
            {
                $table->integer('user_id')->nullable()->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text', function (Blueprint $table) {
            if (Schema::hasColumn('text', 'user_id'))
            {
                $table->integer('user_id')->change();
            }
        });
    }
}
