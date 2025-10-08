<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'description',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
