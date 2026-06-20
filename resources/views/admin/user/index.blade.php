@extends('admin.layouts.main')

@section('page', 'Пользователи')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Пользователи</li>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-1 mb-3">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary">Добавить</a>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th colspan="3">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><a title="Посмотреть" href="{{ route('admin.user.show', $user->id) }}"><i class="far fa-eye"></i></a></td>
                                        <td><a title="Изменить" href="{{ route('admin.user.edit', $user->id) }}"><i class="fas fa-pencil-alt text-success"></i></a></td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.user.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Удалить" class="btn btn-link p-0"><i class="fas fa-trash text-danger"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
