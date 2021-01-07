<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TacVuSeeder::class,
            PhanQuyenSeeder::class,
            TacVuPhanQuyenSeeder::class,
            NganhNgheSeeder::class,
            DiaDiemSeeder::class,
            ChucVuSeeder::class,
            KieuLamViecSeeder::class,
            BangCapSeeder::class,
            LoaiTheSeeder::class,
            HangMucThanhToanSeeder::class,
            KinhNghiemSeeder::class,
            QuyMoNhanSuSeeder::class
//            LoaiTaiKhoanSeeder::class
        ]);
        // $this->call(UserSeeder::class);
    }
}
