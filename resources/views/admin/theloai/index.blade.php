@extends('admin/layouts/index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header alert alert-success">
                            Danh sách thể loại 
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                       <div class='alert alert-success message'> {{ session('thongbao') }} </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloai as $value)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->Ten }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/delete/{{ $value->id }}" onclick=" alert('Ban co chac la xoa the loai nay khong ??') "> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/edit/{{ $value->id }}">Edit</a></td>
                            </tr>
                            @endforeach
                         
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection