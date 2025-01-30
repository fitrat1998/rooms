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

                        @can('user.add')
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('filterdashboard.filters') }}" method="GET">
                            <div class="form-row">

                                <div class="form-group col-md-2">
                                    <label for="building">Binoni tanlang</label>
                                    <select id="building" class="form-control select2" name="building">
                                        <option value="">Bino tanlang</option>
                                        @foreach($buildings as $building)
                                            <option
                                                value="{{ $building->id }}" {{ old('building') == $building->id ? 'selected' : '' }}>
                                                {{ $building->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-2">
                                    <label for="floor">Qavatni tanlang</label>
                                    <select id="floor" class="form-control select2" name="floor">
                                        <option value="">Avval binoni tanlang</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="arrive">Kelib tushish sanasi</label>
                                    <input type="text" id="arrive" class="form-control datepicker" name="arrive"
                                           placeholder="Sana kiriting" value="{{ old('arrive') }}">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="leave">Ketish sanasi</label>
                                    <input type="text" id="leave" class="form-control datepicker" name="leave"
                                           placeholder="Sana kiriting" value="{{ old('leave') }}">
                                </div>

                                <div class="form-group col-md-2 mt-2">
                                    <label for="submit"></label>
                                    <button class="form-control btn btn-primary" type="submit" id="submit"
                                            name="submit">Filterlash
                                    </button>
                                </div>


                            </div>
                        </form>

                        <!-- ./row -->
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card card-primary card-tabs">
                                    <div class="card-header p-0 pt-1">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

                                            <li class="nav-item">
                                                <!-- Make "Xonalar" the active tab -->
                                                <a class="nav-link active" id="custom-tabs-one-profile-tab"
                                                   data-toggle="pill"
                                                   href="#custom-tabs-one-profile" role="tab"
                                                   aria-controls="custom-tabs-one-profile"
                                                   aria-selected="true">Xonalar</a>
                                            </li>

                                            <li class="nav-item">
                                                <!-- Make "Tashriflar" the inactive tab -->
                                                <a class="nav-link" id="custom-tabs-one-home-tab" data-toggle="pill"
                                                   href="#custom-tabs-one-home" role="tab"
                                                   aria-controls="custom-tabs-one-home"
                                                   aria-selected="false">Tashriflar</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">

                                            <!-- Make "Xonalar" the active tab-pane -->
                                            <div class="tab-pane fade show active" id="custom-tabs-one-profile"
                                                 role="tabpanel"
                                                 aria-labelledby="custom-tabs-one-profile-tab">
                                                <div class="table-responsive-lg">
                                                    <table id="dataTable"
                                                           class="table custom-table table-bordered table-striped roomtable dtr-inline nowrap"
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
                                                                <td>{{ $loop->iteration }}</td>
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
                                                                            @if(!request()->has('arrive') && !request()->has('leave'))
                                                                                <span
                                                                                    class="btn btn-danger">{{ $bed->number }}</span>
                                                                            @else
                                                                                <span class=""></span>
                                                                            @endif


                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Make "Tashriflar" the inactive tab-pane -->
                                            <div class="tab-pane fade" id="custom-tabs-one-home"
                                                 role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                <table id="dataTable"
                                                       class="table custom-table table-bordered table-striped roomtable dtr-inline table-responsive-lg"
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
                                                            <td>{{ $loop->iteration ?? 'mavjud emas'  }}</td>
                                                            <td>{{ $visit->guest->fullname ?? 'mavjud emas'  }}</td>
                                                            <td>{{ $visit->guest->citizenship->name ??  'mavjud emas' }}</td>
                                                            <td>{{ $visit->bed($visit->bed_id)->room->number ?? 'mavjud emas'  }}</td>
                                                            <td>{{ $visit->bed($visit->bed_id)->number ?? '0' }} - chi</td>
                                                            <td>{{ $visit->bed($visit->bed_id)->room->floor->number ??  'mavjud emas'  }}</td>
                                                            <td>{{ $visit->bed($visit->bed_id)->room->floor->building->name ?? 'mavjud emas'  }}</td>
                                                            <td>{{ $visit->arrive ?? 'mavjud emas'  }}</td>
                                                            <td>{{ $visit->leave ?? 'mavjud emas' }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
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


