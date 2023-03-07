<?php

namespace App\Jobs;

use App\Models\Report\ReportDaily;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SynthesizeReportDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $insertData = [];
        $data1 = $this->getDataFromData1();
        Log::debug('SynthesizeReportDataJob@handle: $data1', ['count' => count($data1)]);
        if (count($data1) > 0) {

            foreach ($data1 as $row) {
                $insertData[] = [
                    'METER_ID' => $row->METER_ID,
                    'MA_DDO' => $row->MA_DDO,
                    'ACTIVE_KW_INDICATE_TOTAL' => $row->ACTIVE_KW_INDICATE_TOTAL,
                    'SAVEDB_TIME' => $row->SAVEDB_TIME
                ];

                Log::debug('SynthesizeReportDataJob@handle: foreach: $insertData', $insertData);
                if (count($insertData) >= 100) {
                    Log::debug('SynthesizeReportDataJob@handle: $insertData', [$insertData]);
                    $result = ReportDaily::query()->insert($insertData);
                    Log::debug('SynthesizeReportDataJob@handle: $result', [$result]);
                    $insertData = [];
                }
            }
            $result = ReportDaily::query()->insert($insertData);
            Log::debug('SynthesizeReportDataJob@handle: $result', [$result]);
        }
    }

    protected function getDataFromData1() {
        return DB::connection('data1')->select('EXEC [dbo].[SP_DL_HANG_NGAY_Get_PrevDay]');
    }
}
