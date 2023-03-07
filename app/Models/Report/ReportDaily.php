<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDaily extends Model
{
    use HasFactory;
    protected $connection = 'report';
    protected $table = 'HANGNGAY';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = false;

    protected $fillable = [
        'METER_ID',
        'MA_DDO',
        'CHI_SO',
        'SAVEDB_TIME'        
    ];

    protected $guarded = ['ID'];

    protected $casts = [
        'METER_ID' => 'integer',
        'CHI_SO' => 'integer',
        'SAVEDB_TIME' => 'datetime'
    ];
}
