<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
//public $name,$content;
    protected $fillable = [
        'name',
        'content'
    ];
    /**
     * @var mixed
     */


    /**
     * @var mixed
     */

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
