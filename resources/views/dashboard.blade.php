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
                        <h3 class="card-title ">Malumotlar</h3>
                        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            Qo'shish
                        </a>
                        @can('user.add')
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- ./row -->
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card card-primary card-tabs">
                                    <div class="card-header p-0 pt-1">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-home-tab"
                                                   data-toggle="pill" href="#custom-tabs-one-home" role="tab"
                                                   aria-controls="custom-tabs-one-home"
                                                   aria-selected="true">Tashriflar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                                   href="#custom-tabs-one-profile" role="tab"
                                                   aria-controls="custom-tabs-one-profile"
                                                   aria-selected="false">Xonalar</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-one-home"
                                                 role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                <table id="dataTable"
                                                       class="table custom-table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                                                       user="grid" aria-describedby="dataTable_info" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Fish</th>
                                                        <th>Mamlakat</th>
                                                        <th>Xona</th>
                                                        <th>Joyi</th>
                                                        <th>Qavat</th>
                                                        <th>Bino</th>
                                                        <th>Kelish sanasi</th>
                                                        <th>Ketish sanasi</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($visits as $visit)
                                                        <tr>
                                                            <td>{{ $visit->id }}</td>
                                                            <td>{{ $visit->guest->fullname }}</td>
                                                            <td>{{ $visit->guest->citizenship->name }}</td>
                                                            <td>{{ $visit->bed($visit->bed_id)->room->number }}</td>
                                                            <td>{{ $visit->bed($visit->bed_id)->number }} - chi</td>
                                                            <td>{{ $visit->bed($visit->bed_id)->room->floor->number }}</td>
                                                            <td>{{ $visit->bed($visit->bed_id)->room->floor->building->name }}</td>
                                                            <td>{{ $visit->arrive }}</td>
                                                            <td>{{ $visit->leave }}</td>


                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                                 aria-labelledby="custom-tabs-one-profile-tab">
                                                <div class="table-responsive-lg">
                                                    <table id="dataTable"
                                                           class="table custom-table table-bordered table-striped dataTable dtr-inline nowrap"
                                                           user="grid" aria-describedby="dataTable_info" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th class="w-25">ID</th>
                                                            <th class="w-25">Bino</th>
                                                            <th class="w-25">Qavat</th>
                                                            <th class="w-25">Xona</th>
                                                            <th class="w-25">Joylar</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($rooms as $room)
                                                            <tr>
                                                                <td>{{ $room->id }}</td>
                                                                <td class="w-25">{{ $room->floor->building->name }}</td>
                                                                <td class="w-25"><span
                                                                        class="btn btn-success">{{ $room->floor->number }}</span>
                                                                </td>
                                                                <td class="w-25"><span
                                                                        class="btn btn-success">{{ $room->number }}</span>
                                                                </td>
                                                                <td class="w-25">
                                                                    @foreach($room->beds as $bed)
                                                                        @if($bed->status == 'no')
                                                                            <span
                                                                                class="btn btn-primary">{{ $bed->number }}</span>
                                                                        @elseif($bed->status == 'empty')
                                                                            <span
                                                                                class="btn btn-danger">{{ $bed->number }}</span>
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <!-- Data table -->

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


