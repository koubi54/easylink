<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tracker;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'link', 'brand', 'colors'
    ];

    public function check(){
        if(!$this->tracker()->exists()){
            return "nullll";
        } else {
            return "fulll";
        }
    }

    public function hit($new_user = 0){
        
        if(!$this->tracker()->exists()){
            $this->tracker()->create([
                'total' => 1,
                'unique_users' => 1
            ]);
        } else {
            $this->tracker()->update([
                'total' => $this->tracker->total + 1,
                'unique_users' => $this->tracker->unique_users + $new_user,
            ]);
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tracker(){
        return $this->hasOne(Tracker::class);
    }
}