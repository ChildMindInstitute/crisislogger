<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConvertedFieldUploads extends Migration
{
   public function up() {
        Schema::table('uploads', function (Blueprint $table) {
            if (!Schema::hasColumn('uploads', 'converted'))
            {
                $table->boolean('converted')->nullable()->default(false);
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
            if (Schema::hasColumn('uploads', 'converted'))
            {
                $table->dropColumn('converted');
            }
        });
    }
}
