<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $table = 'websites';

    protected $fillable=[
        'websitename',
        'siteurl',
        'shortdescription'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function subscribers(){
        return $this->belongsToMany(Subscriber::class,'website_subscriber','website_id','subscriber_id');
    }
}
