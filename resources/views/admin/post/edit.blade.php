@extends('admin.layouts.main')

@section('page', 'Редактирование поста')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('admin.post.index') }}">Посты</a></li>
    <li class="breadcrumb-item active">Редактирование поста</li>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('admin.post.update', $post->id) }}" method="POST" class="col-12" enctype="multipart/form-data">
                    @method('PATCH')
                    <div class="form-group w-25">
                        <label>Название</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control" placeholder="Введите название">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Контент</label>
                        <textarea id="summernote" name="content">
                                {{ old('content', $post->content) }}
                            </textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label for="preview">Превью</label>
                        <div class="mb-3">
                            <img class="w-50" src="{{ $post->preview_image_url }}" alt="preview_image" >
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="preview" name="preview_image">
                                <label class="custom-file-label" for="preview">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-50">
                        <label for="main">Главное изображение</label>
                        <div class="mb-3">
                            <img class="w-50" src="{{ $post->main_image_url }}" alt="main_image" >
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="main" name="main_image">
                                <label class="custom-file-label" for="main">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-25">
                        <label>Категория</label>
                        <select name="category_id" class="form-control">
                            <option selected>-- Выберите категорию --</option>
                            @foreach($categories as $category)
                                <option
                                    {{ intval(old('category_id', $post->category_id)) === $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group w-25">
                        <label>Теги</label>
                        <select name="tags[]" class="form-control select2" style="width: 100%;" multiple data-placeholder="Выберите теги">
                            @foreach($tags as $tag)
                                <option
                                    {{ (!empty('old') || $post->tags->count()) && in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? "selected" : "" }}
                                    value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Обновить" class="btn btn-primary">
                    </div>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            })

            bsCustomFileInput.init()

            $('.select2').select2();
        })
    </script>
@endsection
