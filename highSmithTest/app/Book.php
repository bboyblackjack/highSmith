<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
           $model->created_at = $model->freshTimestamp();
        });
    }
}
