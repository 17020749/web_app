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
use App\Jobs\SynthesizeReportDataJob;

class SynthesizeReportData2Job implements ShouldQueue
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
        Log::debug('SynthesizeReportData2Job@handle');
        // Lấy dữ liệu của page trong DB data2
        $data = $this->getData();
        Log::debug('SynthesizeReportData2Job@handle: totalData = ' . count($data));

        // Check data is empty
        if (count($data) === 0) return;

        // Tạo dữ liệu insert vào DB report
        $insertData = [];
        $insertResults = [];
        foreach ($data as $row) {
            $insertData[] = [
                'METER_ID' => $row->METER_ID,
                'MA_DDO' => $row->MA_DDO,
                'CHI_SO' => $row->CHI_SO,
                'SAVEDB_TIME' => $row->SAVEDB_TIME
            ];

            if(count($insertData) >= 500) {
                $insertResults[] = ReportDaily::query()->insert($insertData);
                $insertData = [];
            }
        }

        // Thực hiện insert data vào bảng HANGNGAY trong DB Report
        $insertResults[] = ReportDaily::query()->insert($insertData);
        Log::debug('SynthesizeReportData2Job@handle: $insertResults[]', $insertResults);
    }

    protected function getData(): array
    {
        return DB::connection('data2')
            ->select('EXEC [dbo].[SP_DL_HANG_NGAY_Get_PrevDay] ?, ?', [$this->page, SynthesizeReportDataJob::ROW_PER_PAGE]);
    }
}
