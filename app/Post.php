<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public $directory = "/images/";

    protected $dates = ['deleted_at'];
    //by default it is 'id'
    // protected $primaryKey = 'post_id';

    protected $fillable = [

        'title',
        'content',
        'author',
        'path'

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }
}
