<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('admin_id')->constrained()->cascadeOnDelete();
            $table->string('name')->index()->nullable()->comment('プロジェクト名');
            $table->string('description')->index()->nullable()->comment('説明');
            $table->unsignedTinyInteger('progress')->comment('進捗');
            $table->bigInteger('cost')->comment('仕入額');
            $table->unsignedTinyInteger('status')->comment('完了:3 確認待ち:2 作業中:1 予告:0');
            $table->string('customer_manager')->index()->nullable()->comment('顧客担当者');
            $table->dateTime('date')->nullable()->comment('日付');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
        DB::statement("ALTER TABLE projects comment='プロジェクト'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['admin_id']);
            $table->dropIfExists('projects');
        });
    }
}
