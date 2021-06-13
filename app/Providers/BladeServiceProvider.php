<?php

namespace App\Providers;

use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\DiaDiem;
use App\Models\KieuLamViec;
use App\Models\KinhNghiem;
use App\Models\NganhNghe;
use App\Models\QuyMoNhanSu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    public function variBlade()
    {
        // $bladeDiaDiem = DiaDiem::all()->toArray();
        // View::share('dia_diem', $bladeDiaDiem);
        // $bladeNganhNghe = NganhNghe::all()->toArray();
        // View::share('nganh_nghe', $bladeNganhNghe);
        // $bladeBangCap = BangCap::all()->toArray();
        // View::share('bang_cap', $bladeBangCap);
        // $bladeChucVu = ChucVu::all()->toArray();
        // View::share('chuc_vu', $bladeChucVu);
        // $bladeKieuLamViec = KieuLamViec::all()->toArray();
        // View::share('kieu_lam_viec', $bladeKieuLamViec);
        // $bladeQuy_mo_nhan_su = QuyMoNhanSu::all()->toArray();
        // View::share('quy_mo_nhan_su', $bladeQuy_mo_nhan_su);
        // $bladeKinhNghiem = KinhNghiem::all()->toArray();
        // View::share('kinh_nghiem', $bladeKinhNghiem);
        // dd('cc');
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $value = Cache::remember('bladeVari', 60*60, function () {
            return $this->variBlade();
        });
        // $this->variBlade();
        Blade::directive('money_xu', function ($money) {
            return "<?php echo number_format($money, 0); ?>";
        });
      
    }
}
