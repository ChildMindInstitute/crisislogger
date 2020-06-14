<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUploadsTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('uploads', 'where_from')) {
                $table->string('where_from')->nullable();
            }
        });
        Schema::table('text', function (Blueprint $table) {
            if (!Schema::hasColumn('text', 'where_from')) {
                $table->string('where_from')->nullable();
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
        //
        Schema::table('uploads', function (Blueprint $table) {
            if (Schema::hasColumn('uploads', 'where_from')) {
                $table->removeColumn('where_from');
            }
        });
        Schema::table('text', function (Blueprint $table) {
            if (Schema::hasColumn('text', 'where_from')) {
                $table->removeColumn('where_from');
            }
        });
    }
}
