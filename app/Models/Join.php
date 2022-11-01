<?php

namespace App\Models;

use App\Models\Organisasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Join extends Model
{
    use HasFactory;
    public $with = ['organisasi'];
    protected $guarded = ['id'];

    public function organisasi() {
        return $this->belongsTo(Organisasi::class, 'organisasi_id');
    }
}
