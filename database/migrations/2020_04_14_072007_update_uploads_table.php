<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('uploads', 'user_id'))
            {
                $table->integer('user_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('uploads', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
