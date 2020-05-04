<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAudioGeneratedUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('uploads', 'audio_generated'))
            {
                $table->boolean('audio_generated')->nullable()->default(false);
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
            if (Schema::hasColumn('uploads', 'audio_generated'))
            {
                $table->dropColumn('audio_generated');
            }
        });
    }
}
