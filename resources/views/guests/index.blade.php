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
                                <th>
                                    <Fuqaroligi></Fuqaroligi>
                                </th>
                                <th>Passport</th>
                                <th class="w-25">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($guests as $guest)
                                <tr>
                                    <td>{{ $guest->id }}</td>
                                    <td>{{ $guest->fullname }}</td>
                                    <td>{{ $guest->passport_number }}</td>
                                    <td>{{ $guest->citizenship->name }}</td>
                                    <td class="text-center">
                                        @can('user.delete')
                                            <form action="{{ route('guests.destroy',$guest->id) }}" method="post">
                                                @csrf

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
                                                                           value="{{ $guest->id  }}">

                                                                    <div class="form-group">
                                                                        <h6 class="float-lg-left">Fish</h6>
                                                                        <input type="text"
                                                                               class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                                                               value="{{ $guest->fullname }}" disabled>
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
                                                                        <h6 class="float-lg-left">Viza</h6><br>
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
                                                                     <div><br></div>
                                                                    <div class="form-group">
                                                                        <h6 class="float-lg-left">Registratsiya</h6><br>
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


                                                                </form>

                                                            </div>


                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">Bekor qilish
                                                                </button>
                                                                <button type="button" class="btn btn-primary">
                                                                    Saqlash
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div

                                                <div class="btn-group">
                                                    <a href="{{ route('citizenships.edit',$guest->id) }}" type="button"
                                                       class="btn btn-success btn-sm m-1"
                                                       data-toggle="modal"
                                                       data-target="#modal-default">
                                                        <i
                                                            class="fa-solid fa-arrow-up-right-from-square"></i> </a>
                                                    @can('user.edit')
                                                        <a href="{{ route('guests.edit',$guest->id) }}" type="button"
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
