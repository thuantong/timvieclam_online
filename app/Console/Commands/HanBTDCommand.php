<?php

namespace App\Console\Commands;

use App\Models\BaiTuyenDung;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HanBTDCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hantuyendung:doitrangthai';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cập nhật quá ngày tuyển dụng mỗi 12h đêm';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $baiTuyenDung = BaiTuyenDung::query()->where('han_bai_viet','<',Carbon::now()->toDateTimeString())->get();
        foreach ($baiTuyenDung as $row){
            $row->status = 4;
            $row->save();
        }
//        BaiTuyenDung::
    }
}
