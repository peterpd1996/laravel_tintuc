@extends('admin/layouts/index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tuc
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                           @if(count($errors) > 0) 
                        {{-- neu minh bat loi ben kia ma co thi no se day loi sang day
                        voi bien la $errors  --}}
                            @foreach($errors->all() as $err)
                                <div class="alert alert-danger">{{ $err }}</div>
                            @endforeach
                        @endif
                        <form action="admin/tintuc/add" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>The loai</label>
                                <select class="form-control" name="theloai" id="theloai">
                                    
                                    @foreach($theloai as $tl)
                                    <option value="{{ $tl->id }}">{{ $tl ->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loai Tin</label>
                                <select id="loaitin" class="form-control" name="loaitin">
                                     @foreach($loaitin as $lt)
                                    <option value="{{ $lt->id }}">{{ $lt ->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hinh anh</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                          
                            
                            <div class="form-group">
                                <label>Tieu de</label>
                                <textarea class="form-control" rows="7" name="tieude"></textarea>
                            </div>
                              <div class="form-group">
                                <label>Tom tat</label>
                                <textarea class="form-control" rows="7" name="tomtat"></textarea>
                            </div>
                             <div class="form-group">
                                <label>Noi dung</label>
                                <textarea class="form-control ckeditor" rows="7" name="noidung" id="demo"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Noi bat: </label>
                                <label class="radio-inline">
                                    <input name="rdoNoibat" value="1" checked="" type="radio">Co
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoNoibat" value="0" type="radio">Khong
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
                   $('#theloai').change(function(){
                   var idTL = $(this).val();
                   $.ajax({
                    url:'admin/tintuc/getLoaiTinFromIdTheLoai',
                    method:'get',
                    data:{idTL:idTL},
                    success:function(data){
                        $('#loaitin').html(data);
                        
                    }
                   })
                })
        })
    </script>
@endsection 