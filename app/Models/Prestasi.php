<?php

namespace App\Models;

use App\Http\Controllers\CategoryController;
use App\Models\User;
use App\Models\CategoryPrestasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestasi extends Model
{
    use HasFactory;

    protected $with = ['category', 'user'];
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(CategoryPrestasi::class, 'category_prestasi_id');
    }

}
