<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'pertanyaan';
    protected $guarded = ['id'];

    public function jawaban(){
        return $this->hasMany(Jawaban::class, 'pertanyaan_id', 'id');
    }


}
