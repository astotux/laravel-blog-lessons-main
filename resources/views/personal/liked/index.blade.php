@extends('personal.layouts.main')

@section('page', 'Понравившиеся посты')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-6" >
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th colspan="2">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td><a title="Посмотреть" href="{{ route('admin.post.show', $post->id) }}"><i class="far fa-eye"></i></a></td>
                                        <td>
                                            <form method="POST" action="{{ route('personal.liked.destroy', $post->id) }}">
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
