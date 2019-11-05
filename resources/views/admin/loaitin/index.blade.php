@extends('admin/layouts/index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                      @if(session('thongbao'))
                        <div class="alert alert-success message">{{ session('thongbao') }}<i class="fa fa-check-square" aria-hidden="true"></i></div>
                    @endif
                   
                    <!-- /.col-lg-12 -->
                    <a href="admin/loaitin/add" class="btn btn-primary"> Them loai tin </a>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category Parent</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($loaitin as $lt)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $lt->id }}</td>
                                <td>{{ $lt->Ten }}</td>
                                <td>{{ $lt->theloai->Ten  }}</td>
                                {{-- vi minh da lien ket voi bang the loai ở model loai tin nen khi muôn biết loại tin ở thẻ loại nào thì ta ->theloai->Ten model nó sự biết id của thằng loai tin để liên kết  --}}
                                <td>
                                    
                                    @if($lt->Status == 1)
                                    {{ 'Hien' }}
                                    @else
                                    {{ 'An' }}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaitin/delete/{{ $lt->id }}" onclick="alert('Ban co muon xoa loai tin nay khong')"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitin/edit/{{ $lt->id }}">Edit</a></td>
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