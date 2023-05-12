<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_id')->constrained()->cascadeOnDelete();
            $table->string('name')->comment('カテゴリー名');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
        DB::statement("ALTER TABLE categories comment='カテゴリー'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['master_id']);
            $table->dropIfExists('categories');
        });
    }
}
