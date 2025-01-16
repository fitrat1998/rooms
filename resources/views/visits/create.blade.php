@extends('admin.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tashrif</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Tashriflar</a></li>
                        <li class="breadcrumb-item active">Qo'shish</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title ">Qo'shish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('visits.store') }}" method="post">
                            @csrf


                            <form action="{{ route('visits.store') }}"
                                  method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="guest">Mehmonlar</label>
                                    <select id="guest" class="form-control select2" name="guest_id">
                                        <option value="">mehmoni tanlang</option>
                                        @foreach($guests as $guest)
                                            <option value="{{ $guest->id }}">{{ $guest->fullname }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('guest_id'))
                                        <span class="text-danger">{{ $errors->first('guest_id') }}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <h6 class="float-lg-left">Lavozimi</h6>
                                    <input type="text" name="position"
                                           class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                           value="{{ old('position') }}">
                                   @if($errors->has('position'))
                                        <span class="text-danger">{{ $errors->first('position') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <h6 class="float-lg-left">Nima maqsadda
                                        kelgan</h6>
                                    <input type="text" name="reason"
                                           class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                           value="{{ old('reason') }}">
                                   @if($errors->has('reason'))
                                        <span class="text-danger">{{ $errors->first('reason') }}</span>
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
                                        <span class="text-danger">{{ $errors->first('tarif') }}</span>
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
                                               class="form-check-label">Ha</label>
                                    </div>
                                    <div
                                        class="form-check form-check-inline float-lg-left">
                                        <input type="radio" id="visa_no" name="visa"
                                               value="no"
                                               class="form-check-input {{ $errors->has('visa') ? 'is-invalid' : '' }}">
                                        <label for="visa_no"
                                               class="form-check-label">Yo`q</label>
                                    </div>
                                    @if($errors->has('visa'))
                                        <span class="text-danger">{{ $errors->first('visa') }}</span>
                                    @endif
                                </div>

                                <div><br></div>

                                <!-- Viza muddati boshlanishi -->
                                <div class="form-group" id="visa_period_group" style="display:none;">
                                    <h6 style="float: left;">Viza muddati boshlanishi</h6>
                                    <input type="text" name="visa_start"
                                           class="form-control {{ $errors->has('visa_start') ? 'is-invalid' : '' }}"
                                           value="{{ old('visa_start') }}">
                                   @if($errors->has('visa_start'))
                                        <span class="text-danger">{{ $errors->first('visa_start') }}</span>
                                    @endif

                                    <h6 style="float: left;">Viza muddati tugashi</h6>
                                    <input type="text" name="visa_end"
                                           class="form-control {{ $errors->has('visa_end') ? 'is-invalid' : '' }}"
                                           value="{{ old('visa_end') }}">
                                    @if($errors->has('visa_end'))
                                        <span class="text-danger">{{ $errors->first('visa_end') }}</span>
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
                                               class="form-check-label">Ha</label>


                                    </div>
                                    <div
                                        class="form-check form-check-inline float-lg-left">
                                        <input type="radio" id="reg_no" name="reg"
                                               value="no"
                                               class="form-check-input {{ $errors->has('reg') ? 'is-invalid' : '' }}">
                                        <label for="reg_no"
                                               class="form-check-label">Yo`q</label>
                                    </div>
                                    @if($errors->has('registration'))
                                            <span class="text-danger">{{ $errors->first('registration') }}</span>
                                        @endif
                                </div>

                                <div><br></div>

                                <!-- Registratsiya muddati boshlanishi -->
                                <div class="form-group" id="reg_period_group" style="display:none;">
                                    <h6 style="float: left;">Registratsiya muddati boshlanishi</h6>
                                    <input type="text" name="reg_start"
                                           class="form-control {{ $errors->has('reg_start') ? 'is-invalid' : '' }}"
                                           value="{{ old('reg_start') }}">
                                    @if($errors->has('reg_start'))
                                        <span class="text-danger">{{ $errors->first('reg_start') }}</span>
                                    @endif

                                    <h6 style="float: left;">Registratsiya muddati tugashi</h6>
                                    <input type="text" name="reg_end"
                                           class="form-control {{ $errors->has('reg_end') ? 'is-invalid' : '' }}"
                                           value="{{ old('reg_end') }}">
                                    @if($errors->has('reg_end'))
                                        <span class="text-danger">{{ $errors->first('reg_end') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="building">Binoni tanlang</label>
                                    <select id="building_visit" class="form-control select2" name="building">
                                        <option value="">Bino tanlang</option>
                                        @foreach($buildings as $building)
                                            <option value="{{ $building->id }}">{{ $building->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="floor">Qavatni tanlang</label>
                                    <select id="floor_visit" class="form-control select2" name="floor_id">
                                        <option value="">Avval binoni tanlang</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="room">Xonani tanlang</label>
                                    <select id="room_visit" class="form-control select2" name="room_id">
                                        <option value="">Avval qavatni tanlang</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="bed">Joyni tanlang</label>
                                    <select id="bed_visit" class="form-control select2" name="bed_id">
                                        <option value="">Avval xonani tanlang</option>
                                    </select>

                                    @if($errors->has('bed_id'))
                                        <span class="text-danger">{{ $errors->first('bed_id') }}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <h6 class="float-lg-left">Izoh</h6>

                                    <textarea name="comment"
                                              class="form-control {{ $errors->has('comment') ? "is-invalid":"" }}"
                                              value="{{ old('comment') }}"></textarea>
                                    @if($errors->has('comment'))
                                        <span class="text-danger">{{ $errors->first('comment') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <h6 class="float-lg-left">Kelish sanasi</h6>
                                    <input type="text" id="arrive" name="arrive"
                                           class="form-control {{ $errors->has('arrive') ? 'is-invalid' : '' }}"
                                           value="{{ old('arrive') }}">
                                    @if($errors->has('arrive'))
                                        <span class="text-danger">{{ $errors->first('arrive') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <h6 class="float-lg-left">Qaytib ketish
                                        sanasi</h6>
                                    <input type="text" id="leave" name="leave"
                                           class="form-control {{ $errors->has('leave') ? 'is-invalid' : '' }}"
                                           value="{{ old('leave') }}">
                                    @if($errors->has('leave'))
                                        <span class="text-danger">{{ $errors->first('leave') }}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-success float-right">Saqlash</button>
                                    <a href="{{ route('guests.index') }}" class="btn btn-danger float-left">Bekor
                                        qilish</a>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
