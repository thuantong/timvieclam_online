<?php

namespace App\Http\Controllers\Api\TiengAnh;

use App\ApiModel\English\Part;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartController extends Controller
{
    public function index()
    {
        $part = Part::all();
        return json_encode($part ?? [],true);
    }

    public function create(Request $request)
    {
        try {
            $requestJson = $request->all();
            $validateJson = $this->validatePart($requestJson);
            if ($validateJson->fails()) {
                return response(json_encode($validateJson->getMessageBag(), true));
            }
            $partNew = new Part();
            $partNew->name = $requestJson['name'];
            $partNew->save();
            $data = json_encode($partNew, true);
            return response($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function validatePart(array $array)
    {
        $messageError = [
            'name.required' => 'Truyền :attribute lên',
        ];
        return Validator::make($array, [
            'name' => 'required',
        ], $messageError);
    }
}
