<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'room',
        'type',
        'image',
        'description',
        'price',
        'username',
        'user_id',
        'status',
        'pmethod',
    ];


    protected $table = 'books'; 

    protected $primaryKey = 'id';

}
