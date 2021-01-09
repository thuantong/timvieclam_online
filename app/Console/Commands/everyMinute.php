<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use App\Models\BaiTuyenDung;
use App\Models\NguoiTimViec;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gửi thông báo đến Người tìm viêc';

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
        $nguoiTimViecALL = NguoiTimViec::query()->with([
            'getTaiKhoan'
        ])->where('status_job',1)->get()->toArray();
        $index = 0;
        $data = array();
        foreach ($nguoiTimViecALL as $row){
            if ($row['vi_tri_tim'] != null){
                $baiTuyenDung = BaiTuyenDung::query()
                    ->with([
                        'getNhaTuyenDung' => function ($subquery) {
                            $subquery->select('id', 'tai_khoan_id')->with(
                                [
                                    'getTaiKhoan' => function ($q) {
                                        $q->select('id', 'ho_ten');
                                    },
                                    'getCongTy'=>function($q){
                                        $q->select('id','logo','name');
                                    }
                                ]
                            );
                        },
                        'getDonHang' => function ($subquery) {
                            $subquery->select('id', 'so_luong as so_ngay_bai_dang', 'bai_tuyen_dung_id');
                        },
                        'getDiaDiem' => function ($subquery) {
//                            if ($request->exists('dia_diem') && $request->get('dia_diem') != "") {
//                                $subquery->select('id', 'name')->where('id', $request->get('dia_diem'));
//                            } else {
                                $subquery;
//                            }

                        },
                        'getCongTy' => function ($subquery) {
                            $subquery->select('id', 'name', 'logo');
                        },
                        'getNganhNghe' =>function($q){
//                            if ($request->exists('nganh_nghe') && $request->get('nganh_nghe') != "") {
//                                $q->where('nganh_nghe_id',$request->get('nganh_nghe'));
//                            }else{
                                $q;
//                            }

                        }
                    ])
                    ->where('tieu_de','like','%'.$row['vi_tri_tim'].'%')->orWhere('kieu_lam_viec_id',$row['kieu_lam_viec_id'])->where('status',1)->distinct('id')->get()->toArray();

            }else{
                $baiTuyenDung = array();
            }

            $data[$index] = $row;
            if (count($baiTuyenDung) > 0){
                $data[$index]['tin_goi_y'] = $baiTuyenDung;
            }
            $index++;
        }
//        dd($data);

        foreach ($data as $row){
            if (array_key_exists('tin_goi_y',$row) == true){
                $dataEmail = array(
                    'subject' => ucwords('Gợi ý việc làm'),
                    'view' => 'goi_y.index',
                    'data' => $row
                );
                if (count($row['tin_goi_y']) > 0){
                    Mail::to($row['get_tai_khoan']['email'])->send(new SendEmail($dataEmail));
                }

            }
        }
//        $nguoiTimViecALL = NguoiTimViec::query()->with([
//            'getTaiKhoan'
//        ])->get()->toArray();
//
//        foreach ($nguoiTimViecALL as $row){
//            $dataEmail = array(
//                'subject' => ucwords('Gợi ý việc làm'),
//                'view' => 'goi_y.index',
//                'data' => $row
//            );
//            Mail::to($row['get_tai_khoan']['email'])->send(new SendEmail($dataEmail));
//        }

//        $nguoiTimViecALL = NguoiTimViec::query()->getTaiKhoan
//        return 0;
    }
}
