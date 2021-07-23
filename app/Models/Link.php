<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Links must belong to user, created by an user
     **/
    public function user(){
        return $this->belongsTo(User::class);
    }
}
