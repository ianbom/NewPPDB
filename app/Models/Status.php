<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'status';
    protected $guarded = ['id'];

    public function user(){
        return $this->hasMany(User::class, 'status_id', 'id');
    }
}
