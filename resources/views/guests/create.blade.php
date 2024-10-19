@extends('admin.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bino</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Binolar</a></li>
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
                                    <h6 class="float-lg-left">Bo`sh joylar</h6>
                                    <select class="form-control" name="bed" id="">
                                        <option value="">joyni tanlang</option>
                                        @foreach($beds as $bed)
                                            <option
                                                value="{{ $bed->id }}">
                                                ({{ $bed->number }} - bo`sh) ({{ $bed->room->number }} - xona)
                                                ({{ $bed->room->floor->number ?? 'Qavat mavjud emas' }} - qavat)
                                                ({{ $bed->building($bed->room->floor->building_id) ?? 'Bino mavjud emas' }} - Binosi)
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


                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Saqlash</button>
                                <a href="{{ route('guests.index') }}" class="btn btn-danger float-left">Bekor qilish</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
