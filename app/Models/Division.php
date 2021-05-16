<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'collaborators', 'parent_id'];
    public function parent()
    {
        return $this->belongsTo(Division::class);
    }

    public function divisions()
    {
        return $this->hasMany(Division::class, 'parent_id');
    }
}
