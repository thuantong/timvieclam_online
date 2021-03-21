<?php

namespace App\Http\Controllers\Api\TiengAnh;

use App\ApiModel\English\Question;
use App\ApiModel\English\Topic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('topic')) {
            $question = Topic::query()->where('id', $request->topic)->with('getQuestion')->get();
            $data = $this->response(200, $question);
            return response(json_encode($data, true));
        }
        if ($request->has('question')) {
            $question = Question::query()->find($request->question);
            $data = $this->response(200, $question);
            return response(json_encode($data, true));
        }
        $question = Question::query()->orderBy('id', 'desc')->get();
        return json_encode($question ?? [], true);
    }
    public function create(Request $request)
    {
        $question = new Question();
        $question->name = $request->name;
        $question->a = $request->a;
        $question->b = $request->b;
        $question->c = $request->c;
        $question->d = $request->d;
        $question->correct = $request->correct;
        $question->name_trans = $request->name_trans;
        $question->a_trans = $request->a_trans;
        $question->b_trans = $request->b_trans;
        $question->c_trans = $request->c_trans;
        $question->d_trans = $request->d_trans;
        $question->descipt = $request->descipt;
        $question->image = $this->uploadImage($request->image);
        $question->audio = $this->uploadAudio($request->audio);
        $question->topic_id = $request->topic_id;
        $question->part_id = $request->part_id;
        $question->save();

        $data = $this->response(200, $question);

        return response(json_encode($data, true));
    }


    public function update(Request $request)
    {
        $question = Question::query()->find($request->id);
        $question->name = $request->name;
        $question->a = $request->a;
        $question->b = $request->b;
        $question->c = $request->c;
        $question->d = $request->d;
        $question->correct = $request->correct;
        $question->name_trans = $request->name_trans;
        $question->a_trans = $request->a_trans;
        $question->b_trans = $request->b_trans;
        $question->c_trans = $request->c_trans;
        $question->d_trans = $request->d_trans;
        $question->descipt = $request->descipt;
        $question->image = $this->uploadImage($request->image);
        $question->audio = $this->uploadAudio($request->audio);
        $question->topic_id = $request->topic_id;
        $question->part_id = $request->part_id;
        $question->save();
        $data = $this->response(200, $question);

        return response(json_encode($data, true));
    }

    public function uploadImage($requestImage): string
    {
        if (!isset($requestImage)) {
            return "";
        }
        $image_64 = $requestImage;
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        $image = str_replace($replace, '', $image_64);
        $image = str_replace(' ', '+', $image);
        // $imageName = Str::random(15).time().'.'.$extension;
        $imageName = Str::random(15) . time() . '.png';
        $path = public_path() . '/images/' . $imageName;
        file_put_contents($path, base64_decode($image));
        return URL::to('/') . "/images/" . $imageName;
    }
    public function uploadAudio($requestAudio): string
    {
        if (!isset($requestAudio)) {
            return "";
        }
        $audio_64 = $requestAudio;
        $extension = explode('/', explode(':', substr($audio_64, 0, strpos($audio_64, ';')))[1])[1];
        $replace = substr($audio_64, 0, strpos($audio_64, ',') + 1);
        $audio = str_replace($replace, '', $audio_64);
        $audio = str_replace(' ', '+', $audio);
        $audioName = Str::random(15) . time() . '.mp3';
        $path = public_path() . '/audios/' . $audioName;
        file_put_contents($path, base64_decode($audio));
        // return array();
        return URL::to('/') . "/audios/" . $audioName;
    }
    public function delete($id)
    {
        $question = Question::query()->find($id);
        $question->delete();
    }
}
