<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOriginalNameUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('uploads', 'original_file_name')) {
                $table->string('original_file_name')->nullable();
            }
            if (!Schema::hasColumn('uploads', 'recorded_date')) {
                $table->dateTime('recorded_date')->nullable();
            }
            if (!Schema::hasColumn('uploads', 'video_id')) {
                $table->integer('video_id')->nullable();
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
            if (Schema::hasColumn('uploads', 'original_file_name')) {
                $table->dropColumn('original_file_name');

            }
            if (Schema::hasColumn('uploads', 'recorded_date'))
            {
                $table->dropColumn('recorded_date');
            }
            if (Schema::hasColumn('uploads', 'video_id')) {
                $table->dropColumn('video_id');
            }
        });
    }
}
