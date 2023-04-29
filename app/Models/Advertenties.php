<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertenties extends Model
{
    protected $fillable = [
        'slug',
        'filename',
        'title',
        'city',
        'state',
        'description',
        'price',
        'lat',
        'lng',
        'user_id',
        'category_id'     
    ];
    protected $table = 'advertenties';
   

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
