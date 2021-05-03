<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class PostType extends Model
{

    use Sluggable,SluggableScopeHelpers;

    protected $table = 'post_types';

    protected $fillable = [
        'title','slug','description','has_archive','position','status','icon','feature_image','editor'
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
