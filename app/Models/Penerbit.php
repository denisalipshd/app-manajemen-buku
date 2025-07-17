<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $fillable = ['nama'];

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }
}
