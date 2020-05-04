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
            if (!Schema::hasColumn('uploads', 'audio_generated'))
            {
                $table->enum('status', ['draft','processing', 'finished', 'failed'])->default('processing');
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
            if (Schema::hasColumn('uploads', 'status'))
            {
                $table->dropColumn('status');
            }
        });
    }
}
