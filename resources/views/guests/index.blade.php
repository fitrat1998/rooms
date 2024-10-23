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
                                <th>Passport</th>
                                <th>Fuqaroligi</th>
                                <th class="w-25">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($guests as $guest)
                                <tr>
                                    <td>{{ $guest->id }}</td>
                                    <td>{{ $guest->fullname }}</td>
                                    <td>{{ $guest->passport_number }}</td>
                                    <td>{{ $guest->citizenship->name ?? 'mavjud emas'}}</td>
                                    <td class="text-center">
                                        @can('user.delete')

{{--                                            @if($guest->check_visit($guest->id) == 'no')--}}

{{--                                            @endif--}}
                                            <form action="{{ route('guests.destroy',$guest->id) }}" method="post">
                                                @csrf

                                                <div class="btn-group">
                                                    @if($guest->check_visit($guest->id) == 'no' || empty($guest->check_visit($guest->id)))
                                                       <a href="{{ route('visits.create',$guest->id) }}"
                                                               type="button"
                                                               class="btn btn-success btn-sm m-1">
                                                            <i class="fa-solid fa-arrow-up-right-from-square"></i> </a>
                                                    @else
                                                          <a href="{{ route('visits.edit',$guest->id) }}"
                                                               type="button"
                                                               class="btn btn-primary btn-sm m-1">
                                                            <i class="fa-solid fa-eye"></i>
                                                          </a>
                                                    @endif
                                                        @can('user.edit')
                                                            <a href="{{ route('guests.edit',$guest->id) }}"
                                                               type="button"
                                                               class="btn btn-primary btn-sm m-1"><i
                                                                    class="fa fa-edit"></i></a>
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
