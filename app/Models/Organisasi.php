<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organisasi extends Model
{
    use HasFactory;
    public $with = ['category'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
