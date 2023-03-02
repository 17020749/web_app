<?php

namespace App\Jobs;

use App\Models\Report\ReportDaily;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

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
        if ($data1 && count($data1) > 0) {
            foreach ($data1 as $row) {
                $insertData[] = $row;
                if (count($insertData) >= 100) {
                    ReportDaily::query()->insert($insertData);
                    $insertData = [];
                }
            }
        }
    }

    protected function getDataFromData1() {
        return DB::connection('data1')
            ->select('EXEC [dbo].[SP_DL_HANG_NGAY_Get_PrevDay]');
    }
}
