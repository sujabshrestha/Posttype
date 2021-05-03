<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class GlobalPost extends Model
{

    use Sluggable,SluggableScopeHelpers;
    protected $fillable = [
        'post_author','post_content','title','slug','image','status','position','post_parent','post_type'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
