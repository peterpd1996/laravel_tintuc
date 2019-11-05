<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    public function tintuc()
    {
    	// xem comment nay thuoc tin tuc nao
    	return $this->belongsTo('App\TinTuc','idTinTuc','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','id_User','id');
    }
}
