<?php

namespace App\Http\Controllers\Api\TiengAnh;

use App\ApiModel\English\Topic;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('topic')){
            $topic = Topic::query()->find($request->topic);
            $data = $this->response(200,$topic ?? []);
            return json_encode($data,true);
        }
        $topic = Topic::all();
        $data = $this->response(200,$topic ?? []);

        return json_encode($data,true);
    }

    public function create(Request $request)
    {
        try {
            $requestJson = $request->all();
            $validateJson = $this->validateTopic($requestJson);
            if ($validateJson->fails()) {
                return response(json_encode($validateJson->getMessageBag(), true));
            }
            $topicNew = new Topic();
            $topicNew->name = $requestJson['name'];
            $topicNew->save();
            $data = json_encode($topicNew, true);
            return response($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function validateTopic(array $array)
    {
        $messageError = [
            'name.required' => 'Truyền :attribute lên',
        ];
        return Validator::make($array, [
            'name' => 'required',
        ], $messageError);
    }

}
