<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOpenhumansToUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('users', function (Blueprint $table) {
			$table->string('openhumans_access_token', 100);
			$table->string('openhumans_refresh_token', 100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('openhumans_access_token');
			$table->dropColumn('openhumans_refresh_token');
		});
	}
}
