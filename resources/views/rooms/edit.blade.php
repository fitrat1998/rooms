@extends('admin.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tahrirlash</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Foydalanuvchi</a></li>
                        <li class="breadcrumb-item active">Tahrirlash</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tahrirlash</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('rooms.update',$room->id) }}" method="post">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label>Bino tanlang</label>
                                <select id="building" name="building" class="form-control" required>
                                    <option value="">Bino tanlang</option>
                                    @foreach($buildings as $building)
                                        <option
                                            value="{{ $building->id }}" {{ $building->id == $room->floor->building_id ? 'selected' : '' }}>
                                            {{ $building->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label>Qavat</label>
                                <select id="floors" name="floors" class="form-control" required id="floors">
                                    <option value="">Avval binoni tanlang</option>
                                    @foreach($floors as $floor)
                                        <option
                                            value="{{ $floor->id }}" {{ $floor->id == $room->floor->id ? 'selected' : '' }}>
                                            {{ $floor->number }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Xona raqami</label>
                                <input type="number" name="rooms"
                                       class="form-control {{ $errors->has('floors') ? "is-invalid":"" }}"
                                       value="{{ old('rooms',$room->number) }}" required>
                                @if($errors->has('rooms'))
                                    <span class="error invalid-feedback">{{ $errors->first('rooms') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Joylar soni</label>
                                <input type="number" name="beds"
                                       class="form-control {{ $errors->has('floors') ? "is-invalid":"" }}"
                                       value="{{ old('beds',$room->beds) }}" required>
                                @if($errors->has('beds'))
                                    <span class="error invalid-feedback">{{ $errors->first('beds') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Izoh (majburiy emas)</label>
                                <textarea name="comment"
                                          class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}">
                                    {{ old('comment',$room->comment) }}
                                </textarea>
                                @if($errors->has('comment'))
                                    <span class="error invalid-feedback">{{ $errors->first('comment') }}</span>
                                @endif

                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Saqlash</button>
                                <a href="{{ route('buildings.index') }}" class="btn btn-danger float-left">Bekor
                                    qilish</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
