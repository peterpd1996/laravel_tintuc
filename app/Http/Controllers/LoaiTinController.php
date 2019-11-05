<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    public function index()
    {
    	$loaitin = LoaiTin::all();
    	return view('admin/loaitin/index',['loaitin' => $loaitin]);
    }
    public function add()
    {
        $theloai = TheLoai::all();
    	return view('admin/loaitin/add',compact('theloai'));
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
        // $theloai = new TheLoai;
        // $theloai->Ten = $request->txtCateName;
        // $theloai->TenKhongDau = changeTitle($request->txtCateName);     
        // $theloai->save();
      
        $loaitin = LoaiTin::create([
            'idTheLoai' => $request->theloai,
            'Ten' => $request->txtCateName,
            'TenKhongDau' => changeTitle($request->txtCateName),
            'Status' => $request ->rdoStatus
        ]);
 
        if ($loaitin) {
             return redirect('admin/loaitin/')->with('thongbao','Them moi thanh cong !!');
        }
       
       
        
    }
    public function edit(LoaiTin $LoaiTin)
    {
        $theloai = TheLoai::all();
    	return view('admin/loaitin/edit',compact('LoaiTin','theloai'));
    }
    public function editSave(Request $request)
    {
        $loaitin = LoaiTin::find($request->id);

        $loaitinUpdate =  $loaitin->update([
            'idTheLoai' => $request->theloai,
            'Ten' => $request->txtCateName,
            'TenKhongDau' => changeTitle($request->txtCateName),
            'Status' => $request ->rdoStatus
        ]);
        if ($loaitinUpdate == 1) {
            return redirect('admin/loaitin/')->with('thongbao','Upload thanh cong !!!');
        }
        
    }

    public function delete(LoaiTin $LoaiTin)
    {
        // cái $TheLoai mình truyền vào thực chất là id lay tu url, mình khai báo kiểu model thi nó sẽ từ tìm kiếm cho mình model minh cần tìm 
         $theloaiDel = $LoaiTin->delete();
          if ($theloaiDel == 1) {
            return redirect('admin/loaitin/')->with('thongbao','Xoa thanh cong !!!');
        }

    }
}
