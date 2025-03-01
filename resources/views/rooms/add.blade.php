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
                        <li class="breadcrumb-item"><a href="{{ route('buildings.index') }}">Binolar</a></li>
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
                        <h3 class="card-title">Qo'shish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('rooms.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>Bino tanlang</label>
                                <select id="building" name="building" class="form-control" required id="building">
                                    <option value="">Bino tanlang</option>
                                    @foreach($buildings as $building)
                                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Qavatlar soni</label>
                                <select id="floors" name="floors" class="form-control" required id="floors">
                                    <option value="">Avval binoni tanlang</option>
                                    <!-- AJAX orqali yuklanadi -->
                                </select>
                                @if($errors->has('floors'))
                                    <span class="text-danger">{{ $errors->first('floors') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Xona raqami</label>
                                <input type="number" name="rooms"
                                       class="form-control @error('rooms') is-invalid @enderror"
                                       value="{{ old('rooms') }}" required>
                                @if($errors->has('rooms'))
                                    <span class="text-danger">{{ $errors->first('rooms') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Joylar soni</label>
                                <input type="number" name="beds"
                                       class="form-control @error('beds') is-invalid @enderror"
                                       value="{{ old('beds') }}" required>
                               @if($errors->has('beds'))
                                    <span class="text-danger">{{ $errors->first('beds') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Izoh (majburiy emas)</label>
                                <textarea name="comment" id="comment"
                                          class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                                @if($errors->has('comment'))
                                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                                @endif
                            </div>

                            <!-- Xatolik xabarlari (umumiy) -->
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    <strong>Xatoliklar mavjud:</strong>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

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

@section('scripts')

@endsection
