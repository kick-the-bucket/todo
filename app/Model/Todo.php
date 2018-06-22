<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo.
 *
 * @property int    $id
 * @property string $task
 * @property string $created_at
 */
class Todo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['task'];
}
