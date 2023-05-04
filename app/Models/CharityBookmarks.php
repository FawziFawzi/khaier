<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharityBookmarks extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'charity_id'
        ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function charity(){
        return $this->belongsTo(charity::class);
    }
}
