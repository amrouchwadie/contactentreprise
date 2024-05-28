<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function organisation()
    {
        return $this->belongsTo(organisation::class);
    }
}
