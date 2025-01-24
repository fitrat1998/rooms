@extends('admin.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tashriflar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Tashriflar</li>
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
                        <h3 class="card-title">Tashriflar</h3>
                        <a href="{{ route('visits.create') }}" class="btn btn-success btn-sm float-right">
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
                                <th>Lavozim</th>
                                <th class="w-25">Kelish sababi</th>
                                <th>Tarif</th>
                                <th>Visa</th>
                                <th class="w-25">Visa boshlanish vaqti</th>
                                <th class="w-25">Visa tugash vaqti</th>
                                <th>Registratsiya</th>
                                <th class="w-25">Registratsiya boshlanish vaqti</th>
                                <th class="w-25">Registratsiya tugash vaqti</th>
                                <th>Joy raqami</th>
                                <th>Xona</th>
                                <th>Izoh</th>
                                <th class="w-25">Kelish sanasi</th>
                                <th class="w-25">Qaytib ketish sanasi</th>
                                <th class="w-25">Status</th>
                                <th class="w-25">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($visits as $visit)
                                <tr>
                                    <td>{{ $visit->id }}</td>
                                    <td>{{ $visit->guest->fullname }}</td>
                                    <td>{{ $visit->position }}</td>
                                    <td>{{ $visit->reason }}</td>

                                    <td>
                                        @if($visit->tarif == 'free')
                                            <span class="btn btn-succuss">Bepul</span>
                                        @elseif($visit->tarif == 'paid')
                                            <span class="btn btn-info">Pullik</span>
                                        @endif
                                    </td>
                                    <td class="">
                                        @if($visit->visa == 'yes')
                                            <span class="btn btn-primary">Mavjud</span>
                                        @else
                                            <span class="btn btn-danger p-1">Mavjud emas</span>
                                        @endif
                                    </td>
                                    <td class="">
                                        @if($visit->visa_start == 'empty')
                                            <span class="btn btn-danger p-1">Mavjud emas</span>
                                        @else
                                            {{ $visit->visa_start }}
                                        @endif
                                    </td>
                                    <td class="w-25">
                                        @if($visit->visa_end == 'empty')
                                            <span class="btn btn-danger p-1">Mavjud emas</span>
                                        @else
                                            {{ $visit->visa_end }}
                                        @endif
                                    </td>
                                    <td class="">
                                        @if($visit->registration == 'yes')
                                            <span class="btn btn-primary">Mavjud</span>
                                        @else
                                            <span class="btn btn-danger p-1">Mavjud emas</span>
                                        @endif
                                    </td>
                                    <td class="">
                                        @if($visit->registration_start === 'empty')
                                            <span class="btn btn-danger p-1">Mavjud emas</span>
                                        @else
                                            {{ $visit->registration_start }}
                                        @endif
                                    </td>
                                    <td class="w-25">
                                        @if($visit->registration_end === 'empty')
                                            <span class="btn btn-danger p-1">Mavjud emas</span>
                                        @else
                                            {{ $visit->registration_end }}
                                        @endif
                                    </td>

                                    <td>{{ $visit->bed($visit->bed_id)->number }}</td>
                                    <td>{{ $visit->room($visit->bed($visit->bed_id)->room_id)->number }}</td>
                                    <td>{{ $visit->comment }}</td>
                                    <td>{{ $visit->arrive }}</td>
                                    <td>{{ $visit->leave }}</td>
                                    <td>
                                        Arxivlangan
                                        {{--                                        @if($visit->status == 'planed')--}}
                                        {{--                                            <span class="btn btn-warning">Rejalashtirilgan</span>--}}
                                        {{--                                        @elseif($visit->status == 'now')--}}
                                        {{--                                            <span class="btn btn-success">Faol</span>--}}
                                        {{--                                        @endif--}}
                                    </td>
                                    <td class="text-center">
                                        @can('user.delete')
                                            <div class="btn-group">
                                                <form action="{{ route('visits.deletearchive',$visit->id) }}" method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm m-1"
                                                            onclick="if (confirm('Вы уверены?')) { this.form.submit() } ">
                                                        <i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
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
