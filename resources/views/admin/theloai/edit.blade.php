@extends('admin/layouts/index')
@section('content')
 <div id="page-wrapper">
 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/theloai/edit" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $TheLoai->id }}">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{ $TheLoai->Ten }}" />
                            </div>
                       
                           
                            <button type="submit" class="btn btn-primary"> Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection