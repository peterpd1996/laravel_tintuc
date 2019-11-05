@extends('admin/layouts/index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tuc
                            <small>List</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success message">{{ session('thongbao') }}</div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th style="width: 300px">Tieu de</th>
                                <th>Tom tat</th>
                                <th>The loai</th>
                                <th>Loai tin</th>
                                <th>Lan xem</th>
                                <th>Noi bat </th>
                                <th>Delete </th>
                                <th>Edit </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $tt->id }}</td>
                                <td width="300px" style="display: flex;"> 
                                <img width="90px" height="90px" src="upload/tintuc/{{ $tt->Hinh }}">
                                <h4>{{ $tt->TieuDe }}</h4>
                                </td>
                                <td width="300px">{{ $tt->TomTat }}</td>
                                <td>{{ $tt->loaitin->theloai->Ten}}</td>
                                <td>{{ $tt->loaitin->Ten}}</td>
                                <td>{{ $tt->SoLuotXem}}</td>
                                <td>
                                    @if($tt->NoiBat == 1)
                                        {{'Co'}}
                                    @else
                                        {{'Khong'}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/delete/{{$tt->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/edit/{{ $tt->id  }}">Edit</a></td>
                            </tr>
                            @endforeach
                     
                        </tbody>
                    </table>
                    {!! $tintuc->links() !!}
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection