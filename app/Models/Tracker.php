<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Link;

class Tracker extends Model
{
    use HasFactory;

    protected $fillable = ['link_id', 'total', 'unique_users'];

    public function link(){
        return $this->belongsTo(Link::class);
    }
}