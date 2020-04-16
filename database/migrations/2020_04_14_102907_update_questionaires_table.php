<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('questionnaires', function (Blueprint $table) {
            if (!Schema::hasColumn('questionnaires', 'user_id'))
            {
                $table->integer('user_id')->nullable();
            }
            if (!Schema::hasColumn('questionnaires', 'fields'))
            {
                $table->longText('fields')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('transcriptions', function (Blueprint $table) {
            if (Schema::hasColumn('questionnaires', 'user_id'))
            {
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('questionnaires', 'fields'))
            {
                $table->dropColumn('fields');
            }
        });
    }
}
