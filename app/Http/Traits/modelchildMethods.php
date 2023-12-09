<?php

namespace App\Http\Traits;

trait modelchildMethods{

    public static function boot()
    {
        parent::boot();

        // static::creating(function ($model){
        //     $model->forceFill(['type' => static::class]);
        // });

        $closure = function ($model) {
            $model->forceFill(['type' => static::class]);
            $model->makeHidden('type');
        };
        static::saving($closure);
        static::deleting($closure);
        static::retrieved($closure);

        // static::retrieved(function ($model){
        //     $model->makeHidden('type');
        // });
    }

    public static function booted()
    {
        static::addGlobalScope(static::class, function ($builder){
            $builder->where('type', static::class);
        });
    }
}
