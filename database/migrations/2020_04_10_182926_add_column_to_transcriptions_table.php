<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTranscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transcriptions', function (Blueprint $table) {
		$table->integer('upload_id');
		$table->string('text');
           	
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
            $table->dropColumn('upload_id');
		$table->dropColumn('text');
        });
    }
}
