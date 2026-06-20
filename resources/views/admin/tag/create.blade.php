@extends('admin.layouts.main')

@section('page', 'Добавление тега')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('admin.tag.index') }}">Теги</a></li>
    <li class="breadcrumb-item active">Добавление тега</li>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('admin.tag.store') }}" method="POST" class="col-4">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Введите название">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" value="Добавить" class="btn btn-primary">
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
