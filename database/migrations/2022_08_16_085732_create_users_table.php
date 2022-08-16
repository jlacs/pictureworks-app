<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Users;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->bigInteger('id')
                ->startingValue(2)
                ->nullable(false)
                ->unsigned()
                ->unique()
                ->primary();
            $table->string('name', 255)
                ->nullable()
                ->default('');
            $table->text('comments');
        });

        Users::create([
            'id' => 1,
            'name' => 'John Smith',
            'comments' => 'Director'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
