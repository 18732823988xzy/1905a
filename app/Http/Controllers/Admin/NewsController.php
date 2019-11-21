<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandPost;
use Illuminate\Http\Request;
use DB;
use App\News;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize =config('app.pageSize');
        $title=request()->title;
        $where=[];
        if($title){
            $where[]=['news_title','like',"%$title%"];
        }
        $cate=request()->cate;
        $where=[];
        if($cate){
            $where[]=['news_cate','like',"%$cate%"];
        }

        $data=News::where($where)->paginate($pageSize);
        $query = request()->all() ;
//        dump($query);
        return view('admin.news.Index',['data'=>$data,'query'=>$query]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $post=$request->except('_token');

        if($request->hasFile('news_logo')){
            $post['news_logo'] =$this->upload('news_logo');
        }
        $brand= News::create($post);
        if ($brand->news_id){
            return redirect('/news/Index');
        }
    }
    function  upload($filename){
        if ( request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('upload');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }



    public function edit($news_id)
    {
        if(!$news_id){
            return;
        }
        $data=News::where('news_id',$news_id)->first();
//        dd($data);
        return view('admin.news.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandPost $request, $news_id)
    {

//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($news_id)
    {
        if(!$news_id){
            abort(404);
        }
        //DB删除
//        $res=DB::table('brand')->where('brand_id',$brand_id)->delete();
        //ORM 删除
        //$res=Brand::destroy($brand_id);
        $res= News::where('news_id',$news_id)->delete();
        if($res){
            return redirect('/news/Index');
        }
    }
}
