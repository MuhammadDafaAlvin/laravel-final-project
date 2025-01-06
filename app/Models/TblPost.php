<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPost extends Model
{
    use HasFactory;

    protected $table = 'tbl_posts'; // Nama tabel di database
    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'content',
        'image',
        'hits',
        'aktif',
        'status'
    ];
}
