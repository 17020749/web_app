<?php

namespace App\Models\Report;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertDaily extends Model
{
    use HasFactory;
    protected $connection = 'report';
    protected $table = 'ALERT';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = false;

    protected $fillable = [
        'METER_ID',
        'MA_DDO'              
    ];

    protected $guarded = ['ID'];

    protected $casts = [
        'METER_ID' => 'integer'        
    ];
}
