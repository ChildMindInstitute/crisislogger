<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTextTableHide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('text', function (Blueprint $table) {
            if (!Schema::hasColumn('text', 'rank')) {
                $table->tinyInteger('rank')->nullable();
            }
            if (!Schema::hasColumn('text', 'hide')) {
                $table->tinyInteger('hide')->nullable()->default(1);
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
            if (Schema::hasColumn('text', 'rank')) {
                $table->dropColumn('rank');
            }
            if (Schema::hasColumn('text', 'hide')) {
                $table->dropColumn('hide');
            }
        });
    }
}
