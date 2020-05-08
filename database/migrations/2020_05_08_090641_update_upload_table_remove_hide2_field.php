<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUploadTableRemoveHide2Field extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uploads', function (Blueprint $table) {
            if (Schema::hasColumn('uploads', 'hide')) {
                $table->dropColumn('hide');
            }
            if (Schema::hasColumn('uploads', 'hide2')) {
                $table->renameColumn('hide2', 'hide');
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
        Schema::table('uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('uploads', 'hide')) {
                $table->renameColumn('hide1', 'hide2');
            }
        });
    }
}
