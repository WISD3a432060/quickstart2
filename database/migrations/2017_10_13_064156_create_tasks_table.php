<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * 執行遷移。
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('name');
            $table->timestamps();
        });
    }
    /**
     * 還原遷移。
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
    $user = App\User::find(1);

foreach ($user->tasks as $task) {
    echo $task->name;
}

}
<?php
namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Task extends Model
{
    /**
     * 這些屬性能被批量賦值。
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * 取得擁有此任務的使用者。
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

