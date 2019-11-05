<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = 'theloai';
    protected $fillable = [
        'Ten', 'TenKhongDau',
    ];
    public function loaitin()
    {
    	// ket noi voi bang loai tin
    	return $this->hasMany('App\LoaiTin','idTheLoai','id');
    // 1: khoa ngoai cua bang loaitin 
    // 2:   khoa chinh cua bang theloai
    }
    public function tintuc()
    {
    	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
    	/*
    	 tu bang tin tuc khoa ngoai ket noi sang bang loai tin tu bang loai tin ket noi sang bang the loai
			lien ket tu bang the loai sang thang tin tuc xem co tat ca bao nhieu ban ghi
			1 : table can lay du lieu
			2 : talbe trung gian
			3 : khoa ngoai cua table trung gian
			4 : khoa phu cua bang minh muon lay du lieu o day thi la bang tin tuc
			5 : khoa chinh cua bang minh muon ket noi toi
    	*/ 
    }
}
