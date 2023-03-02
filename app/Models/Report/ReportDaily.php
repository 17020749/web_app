<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDaily extends Model
{
    use HasFactory;
    protected $connection = 'report';
    protected $table = 'HANG_NGAY';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'METER_ID',
        'MA_DDO',
        'ACTIVE_KW_INDICATE_TOTAL',
        'SAVEDB_TIME',
        'TEN_KHANG',
        'DIA_CHI'
    ];

    protected $casts = [
        'ID' => 'integer',
        'METER_ID' => 'integer',
        'ACTIVE_KW_INDICATE_TOTAL' => 'integer',
        'SAVEDB_TIME' => 'datetime'
    ];
}
