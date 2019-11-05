<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function index()
    {
    	$theloai = TheLoai::all();
    	return view('admin/theloai/index',['theloai' => $theloai]);
    }
    public function add()
    {
    	return view('admin/theloai/add');
    }
    public function saveAdd(Request $request)
    {
        // cach 1
        // $this->validate($request,
        // [
        //     // đây là phần đăt điều kiện 
        //     'txtCateName' =>'required|min:3|max:100'

        // ],
        // [
        //     // đây là phần lỗi thì trả ra thông báo
        //     'txtCateName.required' => 'Bạn chưa nhập tên thể loại',
        //     'txtCateName.min' => 'Ban phai nhap it nhat 3 ki tu',
        //     'txtCateName.max' => 'Toi thieu la 100 ki tu ban nhap qua dai roi',
        // ]);
        // cach 2 doc o trang laravel
        $validatedData = $request->validate([
             // đây là phần đăt điều kiện 
            'txtCateName' => 'required|min:3|max:100',   
        ],
        [
        // đây là phần lỗi thì trả ra thông báo
            'txtCateName.required' => 'Bạn chưa nhập tên thể loại',
            'txtCateName.min' => 'Ban phai nhap it nhat 3 ki tu',
            'txtCateName.max' => 'Toi thieu la 100 ki tu ban nhap qua dai roi',
        ]
        );
        $theloai = new TheLoai;
        $theloai->Ten = $request->txtCateName;
        $theloai->TenKhongDau = changeTitle($request->txtCateName);     
        $theloai->save();
        // cach 2 
        // $theloai = TheLoai::create([
        //     'Ten' => $request->txtCateName,
        //     'TenKhongDau' => changeTitle($request->txtCateName)
        // ]);
        return redirect('admin/theloai/')->with('thongbao','Them moi thanh cong !!');
       
        
    }
    public function edit(TheLoai $TheLoai)
    {
    	return view('admin/theloai/edit',compact('TheLoai'));
    }
    public function editSave()
    {
        $theloai = TheLoai::find(Request()->id);
        $theloaiUpdate =  $theloai->update([
            'Ten' => request()->txtCateName,
            'TenKhongDau' => changeTitle(request()->txtCateName),
        ]);
        if ($theloaiUpdate == 1) {
            return redirect('admin/theloai/')->with('thongbao','Upload thanh cong !!!');
        }
        
    }

    public function delete(TheLoai $TheLoai)
    {
        // cái $TheLoai mình truyền vào thực chất là id lay tu url, mình khai báo kiểu model thi nó sẽ từ tìm kiếm cho mình model minh cần tìm 
         $theloaiDel = $TheLoai->delete();
          if ($theloaiDel == 1) {
            return redirect('admin/theloai/')->with('thongbao','Xoa thanh cong !!!');
        }

    }

}
