@extends('admin.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Foydalanuvchi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Foydalanuvchilar</a></li>
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

                        <form action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Fish</label>
                                <input type="text" name="name"
                                       class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                       value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Login</label>
                                <input type="text" name="login"
                                       class="form-control {{ $errors->has('login') ? "is-invalid":"" }}"
                                       value="{{ old('login') }}" required>
                                @if($errors->has('login'))
                                    <span class="error invalid-feedback">{{ $errors->first('login') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Parol</label>
                                <input type="password" name="password" id="password-field"
                                       class="form-control {{ $errors->has('password') ? "is-invalid":"" }}" required>
                                <span toggle="#password-field"
                                      class="fa fa-fw fa-eye toggle-password field-icon"></span>

                            </div>
                            <div class="form-group">
                                <label>Parolni tasdiqlash</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                                <span toggle="#password-confirm"
                                      class="fa fa-fw fa-eye toggle-password field-icon"></span>
                                <div id="message"></div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Saqlash</button>
                                <a href="{{ route('users.index') }}" class="btn btn-danger float-left">Bekor qilish</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
