<?php

namespace App\Models;

use App\Models\Organisasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function organsasi() {
        return $this->hasMany(Organisasi::class);
    }
}
