@extends('admin.layouts.main')

@section('page', 'Добавление поста')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('admin.post.index') }}">Посты</a></li>
    <li class="breadcrumb-item active">Добавление поста</li>
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group w-25">
                            <label>Название</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Введите название">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Контент</label>
                            <textarea id="summernote" name="content">
                                {{ old('content') }}
                            </textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="preview">Превью</label>
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
                                    <option selected value="">-- Выберите категорию --</option>
                                @foreach($categories as $category)
                                    <option
                                        {{ intval(old('category_id')) === $category->id ? 'selected' : '' }}
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
                                        {{ !empty(old('tags')) && in_array($tag->id, old('tags')) ? "selected" : "" }}
                                        value="{{ $tag->id  }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                            @error('tags.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Добавить" class="btn btn-primary">
                        </div>
                        @csrf
                    </form>
                </div>
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
