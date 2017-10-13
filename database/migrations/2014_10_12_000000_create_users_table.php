<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
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
    <?php
    namespace App;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    class User extends Authenticatable
    {
        // 其他的 Eloquent 屬性...
    
        /**
         * 取得該使用者的所有任務。
         */
        public function tasks()
        {
            return $this->hasMany(Task::class);
        }
    }
    
}
