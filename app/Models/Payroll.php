<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model
{
    use HasFactory, SoftDeletes;

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

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function jumlahHadir($user_id, $bulan, $tahun, $status)
    {
       return MappingShift::where('user_id', $user_id)->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->where('status_absen', $status)->count();
    }

    public function jumlahTelat($user_id, $bulan, $tahun)
    {
       $telat = MappingShift::where('user_id', $user_id)->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->where('telat', '>', 0)->count();
       $pulpat = MappingShift::where('user_id', $user_id)->whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->where('pulang_cepat', '>', 0)->count();
       $jumlah = $telat + $pulpat;
       return $jumlah;
    }

    public function ptkp()
    {
        return $this->belongsTo(StatusPtkp::class, 'status_id');
    }

}
