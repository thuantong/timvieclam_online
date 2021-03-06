<?php

namespace App\Http\Controllers\Api\Posts;

use App\Api\Posts\Posts as PostsPosts;
use App\ApiModel\Posts\Posts;
use App\Http\Controllers\Controller;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index()
    {
        try {
            $query = DB::table('post_blog')->select('*')->get();
            $data = json_encode($query, true);
            return response($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function create(Request $request)
    {
        try {
            $requestJson = $request->all();
            $validateJson = $this->validatePost($requestJson);
            if ($validateJson->fails()) {
                return response(json_encode($validateJson->getMessageBag(), true));
            }
            $postNew = new Posts();
            $postNew->title = $requestJson['title'];
            $postNew->sub_content = $requestJson['sub_content'];
            $postNew->content = $requestJson['content'];
            $postNew->save();

            $data = json_encode($postNew, true);
            return response($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $requestJson = $request->all();
            $validateJson = $this->validatePost($requestJson);
            if ($validateJson->fails()) {
                return response(json_encode($validateJson->getMessageBag(), true));
            }
            $query = Posts::query()->find($id);
            $query->title = $requestJson['title'];
            $query->sub_content = $requestJson['sub_content'];
            $query->content = $requestJson['content'];
            $query->save();
            $data = json_encode($query,true);
            return response($data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try{
            $query = Posts::query()->find($id);
            $query->delete();
            return response("ok");
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function validatePost(array $array)
    {
        $messageError = [
            'title.required' => 'Truyền :attribute lên',
            'title.max' => 'Tối đa :max ký tự',
            'sub_content.required' => 'Truyền :attribute lên',
            'sub_content.max' => 'Tối đa :max ký tự',
            'content.required' => 'Truyền :attribute lên',
            'content.max' => 'Tối đa :max ký tự',

        ];

        return Validator::make($array, [
            'title' => 'required|max:255',
            'sub_content' => 'required|max:255',
            'content' => 'required|max:255',
        ], $messageError);
    }
}
