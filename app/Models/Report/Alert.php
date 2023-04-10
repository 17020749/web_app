<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;
    // protected $primaryKey = 'ID';
    // public $incrementing = true;
    // protected $keyType = 'integer';
    // public $timestamps = false;
    protected $fillable = [
        'METER_NO',
        'MA_DDO',
        'TEN_KHANG',
        'DIA_CHI',
        'DON_VI',
        'ALERT_TIME',
        'STT',              
    ];

    // protected $guarded = ['ID'];

    // protected $casts = [
    //     'METER_NO' => 'integer'        
    // ];
}
