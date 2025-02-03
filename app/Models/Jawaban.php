<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'jawaban';
    protected $guarded = ['id'];

    public function pertanyaan(){
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
