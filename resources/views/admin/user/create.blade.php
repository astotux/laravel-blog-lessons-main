@extends('admin.layouts.main')

@section('page', 'Добавление пользователя')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
    <li class="breadcrumb-item active">Добавление пользователя</li>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('admin.user.store') }}" method="POST" class="col-4">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Введите имя">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label>Роли</label>
                        <select name="role" class="form-control">
                            <option selected disabled>-- Выберите роль --</option>
                            @foreach($roles as $index => $role)
                                <option
                                    {{ intval(old('role', -1)) === $index ? 'selected' : '' }}
                                    value="{{ $index }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('role')
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
