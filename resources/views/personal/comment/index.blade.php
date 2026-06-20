@extends('personal.layouts.main')

@section('page', 'Комментарии')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
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
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->message }}</td>
                                        <td><a title="Изменить" href="{{ route('personal.comment.edit', $comment->id) }}"><i class="fas fa-pencil-alt text-success"></i></a></td>
                                        <td>
                                            <form method="POST" action="{{ route('personal.comment.destroy', $comment->id) }}">
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
