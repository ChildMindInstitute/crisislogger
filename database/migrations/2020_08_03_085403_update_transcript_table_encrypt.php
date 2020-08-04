<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTranscriptTableEncrypt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transcriptions', function (Blueprint $table) {
            if (!Schema::hasColumn('transcriptions', 'encrypted')) {
                $table->boolean('encrypted')->default(0)->nullable();
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
        Schema::table('transcriptions', function (Blueprint $table) {
            if (Schema::hasColumn('transcriptions', 'encrypted')) {
                $table->removeColumn('encrypted');
            }
        });
    }
}
