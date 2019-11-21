<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandPost;
use Illuminate\Http\Request;
use DB;
use App\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //  $data= DB::table('brand')->get();
       //ORM
        $pageSize =config('app.pageSize');


        $word=request()->word;
//            dd($word);
        $where=[];
        if($word){
            $where[]=['brand_name','like',"%$word%"];
        }
        $desc=request()->desc;
        $where=[];
        if($desc){
            $where[]=['brand_desc','like',"%$desc%"];
        }
//        DB::connection()->enableQueryLog();
//        $data =  DB::table('brand')->where($where)->paginate($pageSize);
//        $logs = DB::getQueryLog();
//        dd($logs);

        $data=Brand::where($where)->paginate($pageSize);
        $query = request()->all() ;
//        dump($query);
       return view('admin.brand.Index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //第二种验证
   // public function store(\App\Http\Requests\StoreBrandPost $request)
    public function store(Request $request)
    {
        //第一种验证
//        $request->validate([
//            'brand_name' => 'bail|required|unique:brand',
//            'brand_url' => 'bail|required|unique:brand',
//        ],[
//            'brand_name.required'=>'品牌名称必填',
//            'brand_url.required'=>'品牌网址必填',
//            'brand_name.unique'=>'品牌名称已存在',
//            'brand_url.unique'=>'品牌网址已存在',
//        ]);
        //第二种验证


//        request();
        //接受排除_token的值
        $post=$request->except('_token');

        $validator = \Validator::make($post, [
            'brand_name' => 'bail|required|unique:brand',
            'brand_url' => 'bail|required|unique:brand',
        ],[
            'brand_name.required'=>'品牌名称必填',
            'brand_url.required'=>'品牌网址必填',
            'brand_name.unique'=>'品牌名称已存在',
        ]
            );
        if ($validator->fails()) {
            return redirect('brand/create')
                ->withErrors($validator)
                ->withInput();
        }


        //只接收某个字段的值
      //  $post=$request->only(['brand_name','brand_url']);

        //dump($post);
//        unset($post['_token']);


        //文件上传
        if($request->hasFile('brand_logo')){
           $post['brand_logo'] =$this->upload('brand_logo');
        }
       // dd($post);
        //DB添加
//       $res = DB::table('brand')->insert($post);//返回布尔值
      // $res = DB::table('brand')->insertGetId($post);//返回自增id
      // dd($res);
       //ORM  添加
       $brand= Brand::create($post);
//       echo $brand->brand_id;
//        $brand=new Brand;
//        $brand->brand_name=$post['brand_name'];
//        $brand->brand_url=$post['brand_url'];
//        $brand->brand_logo=$post['brand_logo'];
//        $brand->brand_desc=$post['brand_desc'];
//        $brand->save();
        if ($brand->brand_id){
            return redirect('/brand/Index');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($brand_id)
    {
        if(!$brand_id){
            return;
        }
        //DB 单条查询
     //  $data= DB::table('brand')->where('brand_id',$brand_id)->first();
        //ORm
//        $data=Brand::find($brand_id);
        $data=Brand::where('brand_id',$brand_id)->first();
//        dd($data);
        return view('admin.brand.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandPost $request, $brand_id)
    {

//       echo $brand_id; die;
        //接值
        $post =$request->except('_token');
        //文件上传
         //判断有无文件上传 有 文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo'] =$this->upload('brand_logo');
        }
        //编辑数据库
       $data= Brand::where('brand_id',$brand_id)->update($post);
//        dd($data);

            return redirect('/brand/Index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand_id)
    {
        if(!$brand_id){
            abort(404);
        }
        //DB删除
//        $res=DB::table('brand')->where('brand_id',$brand_id)->delete();
        //ORM 删除
        //$res=Brand::destroy($brand_id);
       $res= Brand::where('brand_id',$brand_id)->delete();
        if($res){
            return redirect('/brand/Index');
        }
    }
}
