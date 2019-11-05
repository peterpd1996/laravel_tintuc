<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    //
    protected $table = 'loaitin';
    protected $fillable = ['idTheLoai','Ten','TenKhongDau','Status'];
    public function theloai()
    {
    	// muon biet xem bang loai tin nay thuoc the loai nao
    	// thuoc cai the loai nao do nen ta dung belongsTo('')
    
    	return $this->belongsTo('App\TheLoai','idTheLoai','id');

    }
    public function tintuc()
    {

    	// muon biet trong loai tin co bao nhieu tic tuc
    	return $this->hasMany('App\TinTuc','idLoaiTin','id');
    }
}
