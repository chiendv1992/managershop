<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Banner;
use File;
class BannerController extends Controller
{
    public function index()
    {
        $banner = DB::table('banner')->paginate(5);
        return view('admin.banner.list',['banner'=>$banner]);
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    
    public function store(Request $request)
    {
        $file_name ='';
        // lấy tên cua image
        $file_name = $request->file('image')->getClientOriginalName();
//        dd($file_name);
        // cop ảnh luu vao ht
        $image = $request->file('image')->move('upload/images/banner/',$file_name);
        $banner = new Banner();
        $banner->image = $file_name;
        $banner->status =$request->status;
        $banner->save();
        return redirect('banner/list')->with('success','Bạn đã lưu thành công !!');
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit',['banner'=>$banner]);
    }

    
    public function update(Request $request, $id)
    {
        $banner=Banner::find($id);
        $img_curr='upload/images/banner/'.$request->input('img_curr');
        if (!empty($request->file('image')))
        {
            $file_name = $request->file('image')->getClientOriginalName();
            $banner->image=$file_name;
            $request->file('image')->move('upload/images/banner/',$file_name);
            if (File::exists($img_curr)) {
                File::delete($img_curr);
            }
        }
        $banner->status = $request->status;
        $banner->save();
        return redirect('/banner/list')->with('success','Bạn Cập Nhật Thành công !!');
    }

   
    public function destroy($id)
    {
        $banner=Banner::find($id);
        $banner->delete($id);
        return redirect('/banner/list')->with('success','Bạn Đã Xóa Thành Công !!');
    }
}
