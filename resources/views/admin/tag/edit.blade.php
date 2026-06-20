@extends('admin.layouts.main')

@section('page', 'Редактирование тега')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('admin.tag.index') }}">Теги</a></li>
    <li class="breadcrumb-item active">Редактирование тега</li>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="col-4">
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" name="title" value="{{ $tag->title}}" class="form-control" placeholder="Введите название">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" value="Обновить" class="btn btn-primary">
                    @csrf
                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
