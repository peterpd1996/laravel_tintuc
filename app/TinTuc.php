<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = 'tintuc';
    protected $fillable = [
        'TieuDe', 'TieuDeKhongDau','TomTat','NoiDung','Hinh','NoiBat','SoLuotXem','idLoaiTin',
    ];

    public function loaitin()
    {
    	// mot tin tuc thuoc mot loai tin
    	/*
			Trong ví dụ trên, Phone model sẽ cố gắng để match cột user_id với 1 giá trị id ở User model. Tuy nhiền , nếu foreign key trên Phone model không phải là user_id, bạn có thể tùy chỉnh bằng cách thêm 1 đối số thứ 2 vào phương thức belongsTo như sau:
			 đối số thứ 3 để thay đổi mặc định của phương thức là đối chiếu với cột id của User model như sau:
		

					public function user()
					{
					    return $this->belongsTo('App\User', 'user_id');
					}
			
    	*/
        return	$this->belongsTo('App\LoaiTin','idLoaiTin','id');
    }
    public function comment()
    {
      return	$this->hasMany('App\Comment','idTinTuc','id');
    }
}
