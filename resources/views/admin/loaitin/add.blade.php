@extends('admin/layouts/index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loai Tin
                            <small>Add</small>
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
                        <form action="admin/loaitin/add" method="POST">
                                @csrf
                            <div class="form-group">
                                <label>The loai</label>
                                <select class="form-control" name="theloai">
                                    @foreach($theloai as $tl)
                                    <option value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loai tin</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
                            </div>
                            
                            <div class="form-group">
                                <label>Status</label>
                                <label class="radio-inline">
                                <input name="rdoStatus" value="1" checked="" type="radio">Hiện 
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="0" type="radio"> Ẩn
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
