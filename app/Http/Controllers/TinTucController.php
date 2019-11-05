<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
class TinTucController extends Controller
{
    public function index()
    {
    	$tintuc = TinTuc::orderBy('id','DESC')->paginate(15);
    	return view('admin/tintuc/index',['tintuc' => $tintuc]);
        
    }
     public function getTheLoai(Request $request)
    {
        $idTL =  $request->get('idTL');
        $loaitin = LoaiTin::where('idTheLoai',$idTL)->get();
        $loaiT = "";
        foreach ($loaitin as $lt) {
            
          echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
                                    
        }
    }
    public function add()
    {
    	$theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
    	return view('admin/tintuc/add',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function saveAdd(Request $request)
    {

        $validatedData = $request->validate([
             // đây là phần đăt điều kiện 
            'loaitin' => 'required',
            'tieude' =>'required|unique:tintuc,TieuDe', // kieemr tra tieu de la duy nhat trong bang tin tuc cot tieu de
            'tomtat' => 'required',
            'noidung' => 'required'
        ],
        [
        // đây là phần lỗi thì trả ra thông báo
            'loaitin.required' => 'Bạn chưa chon loai tin',
            'tieude.required' => 'Ban phai nhap tieu de',
            'tomtat.required' => 'Toi thieu la 100 ki tu ban nhap qua dai roi',
            'noidung.required' => 'Ban chua nhap noi dung',
            'tieude.unique' => 'Tieu de da ton tai',
        ]
        );
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->tieude;
        $tintuc->TieuDeKhongDau = changeTitle($request->tieude);
        $tintuc->TomTat = $request->tomtat;
        $tintuc->NoiDung = $request->noidung;
        $tintuc->NoiBat = $request->rdoNoibat;
        $tintuc->idLoaiTin = $request->loaitin;


        // if($request->hasFile('image'))
        // {
            $file = $request->file('image');
            $hinh = $file->getClientOriginalName();
            $tintuc->Hinh = $hinh;
            $file->move('upload/tintuc',$hinh);
            $isSuccess =  $tintuc->save();

            if($isSuccess == 1)
            {
                return redirect('admin/tintuc/')->with('thongbao','Them moi thanh cong ');
            }
        


        


        // cach 2 
        // $theloai = TheLoai::create([
        //     'Ten' => $request->txtCateName,
        //     'TenKhongDau' => changeTitle($request->txtCateName)
        // ]);
        //return redirect('admin/theloai/')->with('thongbao','Them moi thanh cong !!');
       
        
    }
    public function edit(TinTuc $TinTuc)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
    	return view('admin/tintuc/edit',compact('theloai','loaitin','TinTuc'));
    }
    public function editSave(Request $request,TinTuc $TinTuc)
    {
        if($request->hasFile('image'))
         {
            $file = $request->file('image');
            $hinh = $file->getClientOriginalName();
           $isSuccess =  $TinTuc->update([
                'TinDe' => $request->tieude,
                'TieuDeKhongDau' => changeTitle($request->tieude),
                'Hinh' => $hinh,
                'TomTat' => $request->tomtat,
                'NoiDung' => $request->noidung,
                'NoiBat' => $request->rdoNoibat,
                'idLoaiTin' => $request->loaitin,

            ]);
             unlink('upload/tintuc'.$TinTuc->Hinh);
            $file->move('upload/tintuc',$hinh);

        }
        else
        {
             $isSuccess =  $TinTuc->update([
                'TieuDe' => $request->tieude,
                'TieuDeKhongDau' => changeTitle($request->tieude),
                'TomTat' => $request->tomtat,
                'NoiDung' => $request->noidung,
                'NoiBat' => $request->rdoNoibat,
                'idLoaiTin' => $request->loaitin,

            ]);
        }
        if($isSuccess == 1)
        {
           return  redirect('admin/tintuc/')->with('thongbao','Sua thanh cong !!!');
        }
        else
        {
            echo "sai";
        }
        // $validatedData = $request->validate([
        //      // đây là phần đăt điều kiện 
        //     'loaitin' => 'required',
        //     'tieude' =>'required|unique:tintuc,TieuDe', // kieemr tra tieu de la duy nhat trong bang tin tuc cot tieu de
        //     'tomtat' => 'required',
        //     'noidung' => 'required'
        // ],
        // [
        // // đây là phần lỗi thì trả ra thông báo
        //     'loaitin.required' => 'Bạn chưa chon loai tin',
        //     'tieude.required' => 'Ban phai nhap tieu de',
        //     'tomtat.required' => 'Toi thieu la 100 ki tu ban nhap qua dai roi',
        //     'noidung.required' => 'Ban chua nhap noi dung',
        //     'tieude.unique' => 'Tieu de da ton tai',
        // ]
        // );
        // $tintuc = new TinTuc;
        // $tintuc->TieuDe = $request->tieude;
        // $tintuc->TieuDeKhongDau = changeTitle($request->tieude);
        // $tintuc->TomTat = $request->tomtat;
        // $tintuc->NoiDung = $request->noidung;
        // $tintuc->NoiBat = $request->rdoNoibat;
        // $tintuc->idLoaiTin = $request->loaitin;


        // if($request->hasFile('image'))
        // {
        //     $file = $request->file('image');
        //     $hinh = $file->getClientOriginalName();
        //     $tintuc->Hinh = $hinh;
        //     $file->move('upload/tintuc',$hinh);
        // }
        // else
        // {

        // }
        //     $isSuccess =  $tintuc->update();

        //     if($isSuccess == 1)
        //     {
        //         return redirect('admin/tintuc/')->with('thongbao','Them moi thanh cong ');
        //     }
        
        
    }

    public function delete(TinTuc $TinTuc)
    {
        // cái $TheLoai mình truyền vào thực chất là id lay tu url, mình khai báo kiểu model thi nó sẽ từ tìm kiếm cho mình model minh cần tìm 
         $isSuccess = $TinTuc->delete();
          if ($isSuccess == 1) {
            return redirect('admin/tintuc/')->with('thongbao','Xoa thanh cong !!!');
        }

    }
}
