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
        'category',
        'lat',
        'lng',
        'views',
        'user_id'     
    ];
    protected $table = 'advertenties';
   

    public function user(){
        return $this->belongsTo(User::class);
    }


    public static function boot()
    {
        parent::boot();
    
        static::retrieved(function ($table) {
            $table->increment('views');
        });
    }
    
   

    use HasFactory;
}
