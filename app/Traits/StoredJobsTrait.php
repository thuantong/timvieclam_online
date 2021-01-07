<?php

namespace App\Traits;

trait StoredJobsTrait
{
    public function getConfirmText(int $confirmInterger)
    {
        switch ($confirmInterger) {
            case 0:
                return "Chưa xác nhận";
                break;
            case 1:
                return "Đã xác nhận";
                break;
        }
        return null;
    }

    public function getGioiTinhText(int $genderInterger)
    {
        switch ($genderInterger) {
            case 0:
                return "Nữ";
                break;
            case 1:
                return "Nam";
                break;
            case -1:
                return "Tất Cả";
                break;
        }
        return null;
    }

    public function getStatusText(int $statusInterger)
    {
        switch ($statusInterger) {
            case 0:
                return "Tạm dừng";
                break;
            case 1:
                return "Đang hoạt động";
                break;
            case 2:
                return "Chờ xác nhận";
                break;
        }
        return null;
    }

    public function getHotText(int $hotInterger)
    {
            switch ($hotInterger) {
                case 0:
                    return "Tạm dừng";
                    break;
                case 1:
                    return "Đang hoạt động";
                    break;
            }
        return null;
    }

}
