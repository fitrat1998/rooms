@extends('admin.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="text-center">Malumotlar</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title ">Foydalanuvchilar</h3>
                        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            Qo'shish
                        </a>
                        @can('user.add')
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable"
                               class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                               user="grid" aria-describedby="dataTable_info" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fish</th>
                                <th>Mamlakat</th>
                                <th>Xonasi</th>
                                <th>Kelish sanasi</th>
                                <th>Ketish sanasi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms as $room)
                                <tr>
                                    <td>{{ $room->id }}</td>
                                    <td>John</td>
                                    <td>England</td>
                                    <td>{{ $room->number }}</td>
                                    <td>
                                        @foreach($room->beds as $bed)
                                            {{ $bed->number }}
                                        @endforeach
                                    </td>
                                    <td>{{ $room->floor->number }}</td>
                                    <td>{{ $room->floor->building->name }}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->



@endsection


