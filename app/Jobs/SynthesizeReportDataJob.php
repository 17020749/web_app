<?php

namespace App\Jobs;

use Illuminate\Bus\Batch;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

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
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->processData1();
        $this->processData2();
        $this->processData3();
    }

    protected function processData1() {
        try {
            // Get tổng số row dữ liệu của ngày hôm qua;
            $totalRowsResult = DB::connection('data1')
                ->select('EXEC [dbo].[SP_DL_HANG_NGAY_countRow]');

            // Check có data trả về từ SP ko?
            if (!$totalRowsResult || !count($totalRowsResult) == 0) return;

            // Check tổng số row data có == 0
            $totalRows = $totalRowsResult[0]->total;
            if ($totalRows == 0) return;

            // Tính tổng số page, 30000 row 1 page
            $totalPage = ceil($totalRows / 30000);

            // Tạo các job nhỏ tổng hợp dữ liệu từng trang
            $batchJobs = [];
            for($p = 1; $p <= $totalPage; $p++) {
                $batchJobs[] = new SynthesizeReportData1Job($p);
            }

            // Thực hiện job theo lô
            Bus::batch($batchJobs)
                ->then(function (Batch $batch) {
                    Log::debug('Process synthesize from data 1: SUCCESS');
                })
                ->catch(function (Batch $batch, Throwable $e) {
                    Log::debug('Process synthesize from data 1: ERROR: ' . $e->getMessage());
                })
                ->finally(function (Batch $batch) {
                    Log::debug('Process synthesize from data 1: END');
                })
                ->name('Synthesize from data 1')
                ->dispatch();
        } catch (Throwable $e) {
            Log::debug('Process synthesize from data 1: ERROR: ' . $e->getMessage());
        }
    }

    protected function processData2() {
        // Viết tương tụ processData1, thay cái class job bằng cái job xử lý data2
    }

    protected function processData3() {
        // Viết tương tụ processData1, thay cái class job bằng cái job xử lý data3
    }
}
