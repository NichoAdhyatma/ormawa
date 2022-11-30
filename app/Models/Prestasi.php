<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category'];

    public function category() {
        return $this->belongsTo(CategoryPrestasi::class, 'category_prestasi_id');
    }
}
