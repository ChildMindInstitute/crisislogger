<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQualityTranscriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('uploads', 'transcript_rate')) {
                $table->integer('transcript_rate')->default(0)->nullable();
            }
            if (!Schema::hasColumn('uploads', 'published')) {
                $table->boolean('published')->default(0)->nullable();
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
            if (Schema::hasColumn('uploads', 'transcript_rate')) {
                $table->removeColumn('transcript_rate');
            }
            if (Schema::hasColumn('uploads', 'published')) {
                $table->removeColumn('published');
            }
        });
    }
}
