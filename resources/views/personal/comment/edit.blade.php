 @extends('personal.layouts.main')

@section('page', 'Комментарии')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="col-6">
                    @method('PATCH')
                    <div class="form-group">
                        <textarea type="text" name="message" class="form-control" placeholder="Введите комменатрий">{{ $comment->message}} </textarea>
                        @error('message')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" value="Обновить" class="btn btn-primary">
                    @csrf
                </form>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
