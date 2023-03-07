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
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = false;

    protected $fillable = [
        'METER_ID',
        'MA_DDO',
        'ACTIVE_KW_INDICATE_TOTAL',
        'SAVEDB_TIME',
        'TEN_KHANG',
        'DIA_CHI'
    ];

    protected $guarded = ['ID'];

    protected $casts = [
        'METER_ID' => 'integer',
        'ACTIVE_KW_INDICATE_TOTAL' => 'integer',
        'SAVEDB_TIME' => 'datetime'
    ];
}
