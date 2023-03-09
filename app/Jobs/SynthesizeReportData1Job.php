<?php

namespace App\Jobs;

use App\Models\Report\ReportDaily;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SynthesizeReportData1Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    /***
     * The page of data
     * @var int
     */
    protected int $page;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $page)
    {
        $this->page = $page;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Lấy dữ liệu của paage trong DB data1
        $data = $this->getData();
        Log::debug('SynthesizeReportData1Job@handle: totalData = ' . count($data));

        // Check data is empty
        if (count($data) === 0) return;

        // Tạo dữ liệu insert vào DB report
        $insertData = [];
        foreach ($data as $row) {
            $insertData[] = [
                'METER_ID' => $row->METER_ID,
                'MA_DDO' => $row->MA_DDO,
                'ACTIVE_KW_INDICATE_TOTAL' => $row->ACTIVE_KW_INDICATE_TOTAL,
                'SAVEDB_TIME' => $row->SAVEDB_TIME
            ];
        }

        // Thực hiện insert data vào bản HANG_NGAY trong DB Report
        $result = ReportDaily::query()->insert($insertData);
        Log::debug('SynthesizeReportData1Job@handle: $result', [$result]);
    }

    protected function getData(): array
    {
        return DB::connection('data1')
            ->select('EXEC [dbo].[SP_DL_HANG_NGAY_Get_PrevDay](?)', [$this->page]);
    }
}
