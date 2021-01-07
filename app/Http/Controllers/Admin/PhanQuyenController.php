<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhanQuyen;
use App\Models\TacVu;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $data['tac_vu'] = TacVu::query()->orderBy('name','asc')->get()->toArray();
        return view('Admin.PhanQuyen.index');
    }

    public function getLoaiTaiKhoan()
    {
        $data['data'] = PhanQuyen::query()->orderBy('name', 'asc')->get()->toArray();
        return $data;
    }

    /**
     * Lấy tác vụ
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTacVu(Request $request)
    {
        $res = $request->data;
        $phanQuyenGetTacVu = PhanQuyen::query()->find($res['id'])->getTacVu()->get()->pluck('id')->toArray();
//        dd($phanQuyenGetTacVu);
        $data['id'] = $res['id'];
        $data['da_phan_quyen'] = $phanQuyenGetTacVu;
        $data['tac_vu'] = TacVu::query()->orderBy('name', 'asc')->get()->toArray();
        return view('Admin.PhanQuyen.tacVu', compact('data'));
    }

    /**
     * Thêm tác vụ
     * @param Request $request
     * @return array
     */
    public function setTacVu(Request $request)
    {
        $title = "Thêm mới tác vụ";
        $dataAjax = $request->toArray();
        try {
            $tacVu = new TacVu();
            $tacVu->name = $dataAjax['ten'];
            $tacVu->mo_ta = $dataAjax['mo_ta'];
            $tacVu->save();
            $message = "Bạn vừa thêm một chức năng mới thành công!";
            return $this->getResponse($title, 200, $message);
        } catch (\Exception $e) {
            return $this->getResponse($title, 400, $e->getMessage());
        }

    }

    /**
     * @Xóa tác vụ
     * @param Request $request
     * @return array
     */
    public function deleteTacVu(Request $request)
    {
        $title = "Xóa tác vụ";
        $dataAjax = $request->toArray();
        try {
            $tacVu = TacVu::query()->find($dataAjax['action']);
            $tacVu->delete();
            $message = "Bạn vừa xóa tác vụ: " . $tacVu->name . " thành công!";
            return $this->getResponse($title, 200, $message);
        } catch (\Exception $e) {
            return $this->getResponse($title, 400, $e->getMessage());
        }

    }

    /**
     * Thêm quyền
     * @param Request $request
     * @return array
     */
    public function setQuyen(Request $request)
    {
        $title = "Thêm mới quyền";
        $dataAjax = $request->toArray();
        try {
            $phanQuyen = new PhanQuyen();
            $phanQuyen->name = $dataAjax['ten'];
            $phanQuyen->mo_ta = $dataAjax['mo_ta'];
            $phanQuyen->save();
            $message = "Bạn vừa thêm quyền mới thành công!";
            return $this->getResponse($title, 200, $message);
        } catch (\Exception $e) {
            return $this->getResponse($title, 400, $e->getMessage());
        }
    }

    /**
     * Xóa quyền
     * @param Request $request
     * @return array
     */
    public function deleteQuyen(Request $request)
    {
        $title = "Xóa quyền";
        $dataAjax = $request->toArray();
        try {
            $phanQuyen = PhanQuyen::query()->find($dataAjax['action']);
            $phanQuyen->delete();
            $message = "Bạn vừa xóa quyền: " . $phanQuyen->name . " thành công!";
            return $this->getResponse($title, 200, $message);
        } catch (\Exception $e) {
            return $this->getResponse($title, 400, $e->getMessage());
        }

    }

    /**
     * Phân quyền theo role
     * @param Request $request
     * @return array
     */
    public function setQuyenRole(Request $request)
    {
        $title = "Phân quyền";
        $dataAjax = $request->toArray();
//        return $dataAjax;
        try {
            $id = $dataAjax['action'];
            $tacVu = $dataAjax['action_data'];
            $phanQuyen = PhanQuyen::query()->find($id);
            $phanQuyen->getTacVu()->detach();
            $phanQuyen->getTacVu()->attach($tacVu);

            $message = "Bạn vừa phân quyền cho: " . $phanQuyen->name . " thành công!";
            return $this->getResponse($title, 200, $message);
        } catch (\Exception $e) {
            return $this->getResponse($title, 400, $e->getMessage());
        }

    }
}
