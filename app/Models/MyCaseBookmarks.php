<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCaseBookmarks extends Model
{
    use HasFactory;

    protected $table = 'case_bookmarks';

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function myCase(){
        return $this->belongsTo(my_case::class);
    }
}
