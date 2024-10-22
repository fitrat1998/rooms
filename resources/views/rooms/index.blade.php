@extends('admin.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Xonalar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Xonalar</li>
                    </ol>
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
                        <h3 class="card-title">Xonalar</h3>
                        <a href="{{ route('rooms.create') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            Qo'shish
                        </a>
                        @can('user.add')
                        @endcan

                        {{--                        {{ dd($rooms); }}--}}

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable"
                               class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                               user="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Xona raqami</th>
                                <th>Joylar soni</th>
                                <th>Qavat</th>
                                <th>Izoh</th>
                                <th class="w-25">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms as $room)
                                <tr>
                                    <td class="w-25">{{ $room->id }}</td>
                                    <td class="w-25">{{ $room->number }}</td>
                                    <td class="w-25">
                                        @foreach($room->beds as $bed)
                                            @if($bed->status == 'no')
                                                <span class="btn btn-success">{{ $bed->number }}</span>
                                            @elseif($bed->status == 'planed')
                                                <span class="btn btn-warning">{{ $bed->number }}</span>
                                            @elseif($bed->status == 'now')
                                                <span class="btn btn-danger ">{{ $bed->number }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="w-25">{{ $room->floor->number }}</td>
                                    <td class="w-25">{{ $room->comment }}</td>

                                    <td class="text-center">
                                        @can('user.delete')
                                            <form action="{{ route('rooms.destroy',$room->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group">
                                                    @can('user.edit')
                                                        <a href="{{ route('rooms.edit',$room->id) }}" type="button"
                                                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if (confirm('Вы уверены?')) { this.form.submit() } ">
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                            </form>
                                        @endcan
                                    </td>
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
