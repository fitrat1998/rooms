@extends('admin.layouts.admin')

@section('content')
    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="card w-100">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-4">

                                <h3 class="text-center">Profil</h3>
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle mb-5"
                                                 src="{{ asset('dist/img/user2-160x160.jpg')}}"
                                                 alt="User profile picture">
                                        </div>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Ism</b> <a class="float-right">{{ $user->name }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>email</b> <a class="float-right">{{ $user->email }}</a>
                                            </li>
                                        </ul>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                            <div class="col-md-4">
                                <h3 class="text-center">Parolni o'zgartirish</h3>
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="current_password" class="col-sm-4 col-form-label">Joriy
                                                    Parol</label>
                                                <div class="col-sm-8">
                                                    <input type="password"
                                                           class="form-control @error('current_password') is-invalid @enderror"
                                                           id="current_password" name="current_password"
                                                           placeholder="Joriy parolni kiriting">
                                                    @error('current_password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-sm-4 col-form-label">Yangi
                                                    Parol</label>
                                                <div class="col-sm-8">
                                                    <input type="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           id="password" name="password"
                                                           placeholder="Yangi parolni kiriting">
                                                    @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password_confirmation" class="col-sm-4 col-form-label">Parolni
                                                    Tasdiqlash</label>
                                                <div class="col-sm-8">
                                                    <input type="password"
                                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                                           id="password_confirmation" name="password_confirmation"
                                                           placeholder="Parolni qayta kiriting">
                                                    @error('password_confirmation')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-8">
                                                    <button type="submit" class="btn btn-success">Yangilash</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h3 class="text-center">Akkauntni o'chirish</h3>
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
{{--                                        <form method="post" action="{{ route('profile.destroy') }}">--}}
                                        <form method="post" action="">
                                            @csrf
                                            @method('delete')
                                            <div class="form-group row">
                                                <div class=" justify-content-end">
                                                    <button type="submit" class="btn btn-danger">O'chirish</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
