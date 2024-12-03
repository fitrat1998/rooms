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

                                    <td>
                                        <span id="position-text">{{ Str::limit($visit->position, 20) }}...</span>
                                        <a href="#" data-toggle="modal" data-target="#positionModal">Ko'proq</a>
                                    </td>
                                    <td>
                                        <span id="reason-text">{{ Str::limit($visit->reason, 20) }}...</span>
                                        <a href="#" data-toggle="modal" data-target="#reasonModal">Ko'proq</a>
                                    </td>

                                    <!-- Modal for Position -->
                                    <div class="modal fade" id="positionModal" tabindex="-1" role="dialog"
                                         aria-labelledby="positionLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="positionLabel">Lavozim</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Yopish">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $visit->position }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Yopish
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal for Reason -->
                                    <div class="modal fade" id="reasonModal" tabindex="-1" role="dialog"
                                         aria-labelledby="reasonLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="reasonLabel">Sabab</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Yopish">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $visit->reason }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Yopish
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


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
                                        @if($visit->registration_start == 'empty')
                                              <span class="btn btn-danger p-1">Mavjud emas</span>
                                        @else
                                            {{ $visit->visa_start }}
                                        @endif
                                    </td>
                                    <td class="w-25">
                                        @if($visit->registration_end == 'empty')
                                              <span class="btn btn-danger p-1">Mavjud emas</span>
                                        @else
                                            {{ $visit->visa_end }}
                                        @endif
                                    </td>
                                    <td>{{ $visit->bed($visit->bed_id)->number }}</td>
                                    <td>{{ $visit->room($visit->bed($visit->bed_id)->room_id)->number }}</td>
                                    <!-- Truncated Text with Modal Link for Comment -->
                                    <td>
                                        <span id="comment-text">{{ Str::limit($visit->comment, 20) }}...</span>
                                        <a href="#" data-toggle="modal" data-target="#commentModal">Ko'proq</a>
                                    </td>

                                    <!-- Modal for Comment -->
                                    <div class="modal fade" id="commentModal" tabindex="-1" role="dialog"
                                         aria-labelledby="commentLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="commentLabel">Izoh</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Yopish">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $visit->comment }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Yopish
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <td>{{ $visit->arrive }}</td>
                                    <td>{{ $visit->leave }}</td>
                                    <td>
                                        {{ $visit->status }}
                                        {{--                                        @if($visit->status == 'planed')--}}
                                        {{--                                            <span class="btn btn-warning">Rejalashtirilgan</span>--}}
                                        {{--                                        @elseif($visit->status == 'now')--}}
                                        {{--                                            <span class="btn btn-success">Faol</span>--}}
                                        {{--                                        @endif--}}
                                    </td>
                                    <td class="text-center">
                                        @can('user.delete')




                                            <div class="btn-group">
                                                @can('user.edit')
                                                    <form action="{{ route('visits.accept', $visit->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-primary btn-sm m-1">
                                                            <i class="fa-regular fa-square-caret-down"></i>
                                                        </button>
                                                    </form>

                                                @endcan
                                                <form action="{{ route('visits.destroy',$visit->id) }}" method="post">
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
