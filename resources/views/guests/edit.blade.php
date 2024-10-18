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
                        <li class="breadcrumb-item"><a href="{{ route('guests.index') }}">Mehmon</a></li>
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

                        <form action="{{ route('guests.update',$guest->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Fish</label>
                                <input type="text" name="name"
                                       class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                       value="{{ old('name',$guest->fullname) }}" required>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Fuqaroligi</label>
                                <select name="citizenship" class="form-control" required id="citizenship">
                                    <option value="">davlatni tanlang</option>
                                    @foreach($citizenships as $citizenship)
                                        <option
                                            value="{{ $citizenship->id }}" {{ $citizenship->id == $guest->citizenship_id ? 'selected' : '' }}>
                                            {{ $citizenship->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Passport raqami</label>
                                <input type="text" name="passport"
                                       class="form-control {{ $errors->has('passport') ? "is-invalid":"" }}"
                                       value="{{ old('passport',$guest->passport_number) }}" required>
                                @if($errors->has('passport'))
                                    <span class="error invalid-feedback">{{ $errors->first('passport') }}</span>
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
