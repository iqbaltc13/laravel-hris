<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuids;

class Shift extends Model
{
    use HasFactory, SoftDeletes, Uuids;
    protected $guarded = [

    ];
    protected $dates = ['deleted_at'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }
     /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public function MappingShift()
    {
        return $this->hasMany(MappingShift::class);
    }

    public function AutoShift()
    {
        return $this->hasMany(AutoShift::class);
    }

    public function dinasLuar()
    {
        return $this->hasMany(DinasLuar::class);
    }
}
