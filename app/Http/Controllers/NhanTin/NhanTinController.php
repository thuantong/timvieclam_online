<?php

namespace App\Http\Controllers\NhanTin;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use App\Models\TinNhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Fqsen;
use function GuzzleHttp\Psr7\str;

class NhanTinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $tinNhan = TinNhan::query()->where('tai_khoan_id',$request->from)->where('to_tai_khoan_id',$request->to)->orWhere('to_tai_khoan_id',$request->from)->where('tai_khoan_id',$request->to);
        $data = $tinNhan->get()->toArray();
//        dd($data);
        $denTaiKhoan = $request->to;
        return view('NhanTin.index',compact('denTaiKhoan','data'));
    }
    public function nhanTin(Request $request){
        $content = trim($request->content_message);
//        dd($request->all());
        if (strlen($content) > 0){
            $newTin = new TinNhan();
            $newTin->noi_dung = $content;
            $newTin->tai_khoan_id = Auth::user()->id;
            $newTin->to_tai_khoan_id = $request->action_send;
            $newTin->save();
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function danhSach(){
//        dd(Auth::user()->id);
//        $dsTin = TaiKhoan::query()->where('from_tai_khoan_id',Auth::user()->id)->orWhere('to_tai_khoan_id',Auth::user()->id)->get()->toArray();
//        $dsTin = TaiKhoan::query()->find(Auth::user()->id)->getTinNhan()->get()->toArray();
//        $dsTin = TinNhan::query()->where('tai_khoan_id',Auth::user()->id)->orWhere('to_tai_khoan_id',Auth::user()->id)->get()->toArray();
        $dsTin = TinNhan::query()->with('getTaiKhoan')->where('to_tai_khoan_id',Auth::user()->id)->get()->toArray();
//        $dsTin= TaiKhoan::query()->find(Auth::user()->id)->with([
//            'getTinNhan'
//        ])->get()->toArray();
//dd($dsTin);
        $data = collect($dsTin)->unique(['tai_khoan_id'])->toArray();
//        dd($data);
        return view('NhanTin.danhSach',compact('data'));
    }
    //
}
