@extends('admin.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mehmonlar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Mehmonlar</li>
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
                        <h3 class="card-title">Mehmonlar</h3>
                        <a href="{{ route('guests.create') }}" class="btn btn-success btn-sm float-right">
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
                               user="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fish</th>
                                <th>Lavozim</th>
                                <th>Kelish sababi</th>
                                <th>Tarif</th>
                                <th>Visa</th>
                                <th>Visa muddati</th>
                                <th>Registratsiya</th>
                                <th>Registratsiya muddati</th>
                                <th>Joy raqami</th>
                                <th>Xona</th>
                                <th>Izoh</th>
                                <th>Kelish sanasi</th>
                                <th>Qaytib ketish sanasi</th>
                                <th class="w-25">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $visit->id }}</td>
                                    <td>{{ $visit->guest_id }}</td>
                                    <td>{{ $visit->position }}</td>
                                    <td>{{ $visit->reason }}</td>
                                    <td>{{ $visit->tarif }}</td>
                                    <td>{{ $visit->visa }}</td>
                                    <td>{{ $visit->visa_period }}</td>
                                    <td>{{ $visit->registration }}</td>
                                    <td>{{ $visit->registration_period }}</td>
                                    <td>{{ $visit->room_id }}</td>
                                    <td>{{ $visit->room_id }}</td>
                                    <td>{{ $visit->comment }}</td>
                                    <td>{{ $visit->arrive }}</td>
                                    <td>{{ $visit->leave }}</td>
                                    <td>{{ $visit->status }}</td>
                                    <td class="text-center">
                                        @can('user.delete')
                                            <div class="modal fade" id="modal-default">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Tashrif yaratish</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <form action="{{ route('visits.store') }}"
                                                                  method="POST">
                                                                @csrf
                                                                <input type="hidden" name="guest_id"
                                                                       value="{{ $visit->id  }}">

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Fish</h6>
                                                                    <input type="text"
                                                                           class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                                                           value="{{ $visit->fullname }}" disabled>
                                                                    @if($errors->has('name'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Lavozimi</h6>
                                                                    <input type="text" name="position"
                                                                           class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                                                           value="{{ old('position') }}">
                                                                    @if($errors->has('position'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('position') }}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Nima maqsadda
                                                                        kelgan</h6>
                                                                    <input type="text" name="reason"
                                                                           class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                                                           value="{{ old('reason') }}">
                                                                    @if($errors->has('reason'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('reason') }}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Tarif</h6>
                                                                    <select class="form-control" name="tarif" id="">
                                                                        <option value="">tarifni tanlang</option>
                                                                        <option value="free">Bepul</option>
                                                                        <option value="paid">Pullik</option>
                                                                    </select>
                                                                    @if($errors->has('tarif'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('tarif') }}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Viza</h6><br><br>
                                                                    <div
                                                                        class="form-check form-check-inline float-lg-left">
                                                                        <input type="radio" id="visa_yes"
                                                                               name="visa" value="yes"
                                                                               class="form-check-input {{ $errors->has('visa') ? 'is-invalid' : '' }}">
                                                                        <label for="visa_yes"
                                                                               class="form-check-label">Yes</label>
                                                                    </div>
                                                                    <div
                                                                        class="form-check form-check-inline float-lg-left">
                                                                        <input type="radio" id="visa_no" name="visa"
                                                                               value="no"
                                                                               class="form-check-input {{ $errors->has('visa') ? 'is-invalid' : '' }}">
                                                                        <label for="visa_no"
                                                                               class="form-check-label">No</label>
                                                                    </div>
                                                                    @if($errors->has('visa'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('visa') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div><br></div>
                                                                <div class="form-group period_group"
                                                                     id="period_group" style="display:none;">
                                                                    <h6 style="float: left;">Viza muddati
                                                                        (gacha)</h6>
                                                                    <input type="text" name="visa_period"
                                                                           class="form-control {{ $errors->has('visa_period') ? 'is-invalid' : '' }}"
                                                                           value="{{ old('visa_period') }}">
                                                                    @if($errors->has('visa_period'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('visa_period') }}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Registratsiya</h6><br><br>
                                                                    <div
                                                                        class="form-check form-check-inline float-lg-left">
                                                                        <input type="radio" id="reg_yes" name="reg"
                                                                               value="yes"
                                                                               class="form-check-input {{ $errors->has('reg') ? 'is-invalid' : '' }}">
                                                                        <label for="reg_yes"
                                                                               class="form-check-label">Yes</label>
                                                                    </div>
                                                                    <div
                                                                        class="form-check form-check-inline float-lg-left">
                                                                        <input type="radio" id="reg_no" name="reg"
                                                                               value="no"
                                                                               class="form-check-input {{ $errors->has('reg') ? 'is-invalid' : '' }}">
                                                                        <label for="reg_no"
                                                                               class="form-check-label">No</label>
                                                                    </div>
                                                                    @if($errors->has('reg'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('reg') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div><br></div>
                                                                <div class="form-group period_group"
                                                                     id="reg_period_group" style="display:none;">
                                                                    <h6 style="float: left;">Registratsiya muddati
                                                                        (gacha)</h6>
                                                                    <input type="text" name="reg_period"
                                                                           class="form-control {{ $errors->has('reg_period') ? 'is-invalid' : '' }}"
                                                                           value="{{ old('reg_period') }}">
                                                                    @if($errors->has('reg_period'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('reg_period') }}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Xona</h6>
                                                                    <select class="form-control" name="room" id="">
                                                                        <option value="">xona tanlang</option>
                                                                        @foreach($rooms as $room)
                                                                            <option
                                                                                value="{{ $room->id }}">{{ $room->number }}

                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if($errors->has('room'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('room') }}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Izoh</h6>

                                                                    <textarea name="comment"
                                                                              class="form-control {{ $errors->has('comment') ? "is-invalid":"" }}"
                                                                              value="{{ old('comment') }}"></textarea>
                                                                    @if($errors->has('comment'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('comment') }}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Kelish sanasi</h6>
                                                                    <input type="text" id="arrive" name="arrive"
                                                                           class="form-control {{ $errors->has('arrive') ? 'is-invalid' : '' }}"
                                                                           value="{{ old('arrive') }}">
                                                                    @if($errors->has('arrive'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('arrive') }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Qaytib ketish
                                                                        sanasi</h6>
                                                                    <input type="text" id="leave" name="leave"
                                                                           class="form-control {{ $errors->has('leave') ? 'is-invalid' : '' }}"
                                                                           value="{{ old('leave') }}">
                                                                    @if($errors->has('leave'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('leave') }}</span>
                                                                    @endif
                                                                </div>

                                                                <div class="form-group">
                                                                    <h6 class="float-lg-left">Band qilish turi</h6>
                                                                    <select class="form-control" name="order" id="">
                                                                        <option value="">tanlang</option>
                                                                        <option value="now">Hozirga band qilish
                                                                        </option>
                                                                        <option value="planed">Keyinroqga
                                                                            rejalashtirish
                                                                        </option>
                                                                    </select>
                                                                    @if($errors->has('order'))
                                                                        <span
                                                                            class="error invalid-feedback">{{ $errors->first('order') }}</span>
                                                                    @endif
                                                                </div>




                                                        </div>


                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Bekor qilish
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">
                                                                Saqlash
                                                            </button>
                                                        </div>
                                                    </div>

                                                     </form>
                                                </div>

                                            </div>
                                            <form action="{{ route('guests.destroy',$visit->id) }}" method="post">
                                                @csrf

                                                <div class="btn-group">
                                                    <a href="{{ route('citizenships.edit',$visit->id) }}" type="button"
                                                       class="btn btn-success btn-sm m-1"
                                                       data-toggle="modal"
                                                       data-target="#modal-default">
                                                        <i
                                                            class="fa-solid fa-arrow-up-right-from-square"></i> </a>
                                                    @can('user.edit')
                                                        <a href="{{ route('guests.edit',$visit->id) }}" type="button"
                                                           class="btn btn-primary btn-sm m-1"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm m-1"
                                                            onclick="if (confirm('Вы уверены?')) { this.form.submit() } ">
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>

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
