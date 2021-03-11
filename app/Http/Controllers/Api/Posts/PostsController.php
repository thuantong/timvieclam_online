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
    public function index(Request $request)
    {
        try {
            $page = $request->get('page') ?? 0;
            $limit = $request->get('limit') ?? 1000;
            $start= ($page - 1)*$limit;
            $query = DB::table('post_blog')->select('*');

            if($request->exists('post_id')){
                $query->where('id',$request->get('post_id'));
            }
            
            $object= clone $query;
            $total_record = $object->count();
            $total_page = ceil($total_record/$limit);
                $result = $query->offset($start)->limit($limit)->orderBy('created_at','desc')->get();
                $data = $this->response(200,$result);
            // $data['data'] = ;
	    $data['pagination'] = array(
		'page'=>$page,'limit'=>$limit,'total_page'=>$total_page
		);
           
            $data = json_encode($data, true);
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
