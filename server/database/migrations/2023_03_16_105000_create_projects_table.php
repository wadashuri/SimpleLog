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
            $table->dateTime('date')->nullable()->comment('日付');
            $table->unsignedTinyInteger('progress')->nullable()->comment('進捗');
            $table->string('name')->nullable()->comment('プロジェクト名');
            $table->string('customer_manager')->nullable()->comment('顧客担当者');
            $table->bigInteger('cost')->comment('仕入額');
            $table->bigInteger('gross_profit')->comment('粗利');
            $table->text('description')->nullable()->comment('説明');
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
