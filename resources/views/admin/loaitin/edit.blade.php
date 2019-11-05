@extends('admin/layouts/index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loai Tin
                            <small>Edit</small>
                        </h1>
                    </div>
                    <div class=" alert alert-danger message"></div>
                   
                    <!-- /.col-lg-12 -->
                    @if(count($errors) > 0 )
                        @foreach($errors as $error)
                            <div class = 'alert alert-warning'> {{ $error }}</div> 
                        @endforeach
                    @endif
                   
                  
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/loaitin/edit" method="POST">
                                @csrf
                        <input type="hidden" name="id" value="{{ $LoaiTin->id }}"> 
                            <div class="form-group">
                                <label>The loai</label>
                                <select class="form-control" name="theloai">
                                    @foreach($theloai as $tl)
                                       @if($LoaiTin->idTheLoai == $tl->id)
                                            <option value="{{ $tl->id }} " selected="selected">{{ $tl->Ten }}</option>
                                        @else
                                            <option value="{{ $tl->id }} " >{{ $tl->Ten }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loai tin</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{ $LoaiTin->Ten }}" />
                            </div>
                            
                            <div class="form-group">
                                <label>Status</label>
                                <label class="radio-inline">

                                <input name="rdoStatus" value="1" @if($LoaiTin->Status == 1) {{ 'checked' }} @endif type="radio">Hien
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="0" type="radio" @if($LoaiTin->Status == 0) {{ 'checked' }} @endif> Ẩn
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Category Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection