<?php

namespace App\Providers;

use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\DiaDiem;
use App\Models\KieuLamViec;
use App\Models\NganhNghe;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $diaDiem = DiaDiem::all()->toArray();
        // View::share('dia_diem', $diaDiem);
        // $nganhNghe = NganhNghe::all()->toArray();
        // View::share('nganh_nghe', $nganhNghe);
        // $bangCap = BangCap::all()->toArray();
        // View::share('bang_cap', $bangCap);
        // $chucVu = ChucVu::all()->toArray();
        // View::share('chuc_vu', $chucVu);
        // $kieuLamViec = KieuLamViec::all()->toArray();
        // View::share('kieu_lam_viec', $kieuLamViec);
        Blade::directive('money_xu', function ($money) {
            return "<?php echo number_format($money, 0); ?>";
        });
      
    }
}
