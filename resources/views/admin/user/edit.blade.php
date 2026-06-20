@extends('admin.layouts.main')

@section('page', 'Редактирование пользователя')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
    <li class="breadcrumb-item active">Редактирование пользователя</li>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="col-4">
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="Введите имя">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Email">
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
                                    {{ intval(old('role', $user->role)) === $index ? 'selected' : '' }}
                                    value="{{ $index }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="submit" value="Обновить" class="btn btn-primary">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
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
