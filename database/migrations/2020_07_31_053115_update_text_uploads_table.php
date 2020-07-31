<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTextUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::table('uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('uploads', 'privacy_update_date')) {
                $table->dateTime('privacy_update_date')->useCurrent()->nullable();
            }
        });
        Schema::table('text', function (Blueprint $table) {
            if (!Schema::hasColumn('text', 'privacy_update_date')) {
                $table->dateTime('privacy_update_date')->useCurrent()->nullable();
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
        //
        Schema::table('uploads', function (Blueprint $table) {
            if (Schema::hasColumn('uploads', 'privacy_update_date')) {
                $table->removeColumn('privacy_update_date');
            }
        });
        Schema::table('text', function (Blueprint $table) {
            if (Schema::hasColumn('text', 'privacy_update_date')) {
                $table->removeColumn('privacy_update_date');
            }
        });
    }
}
