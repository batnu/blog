@extends('admin.layouts.layout')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Posts <small>Crear un post</small>
            </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Crear post</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar un post nuevo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Título del post</label>
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                           placeholder="Escribe el título del post" value="{{ old('title', $post->title) }}">
                                    {!! $errors->first('title','<span class="form-text text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">Contenido del post</h3>
                                            <!-- tools box -->
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                                        title="Collapse">
                                                    <i class="fas fa-minus"></i></button>
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                        title="Remove">
                                                    <i class="fas fa-times"></i></button>
                                            </div>
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea name="body" class="textarea form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" placeholder="Escribe el contenido del post"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('body', $post->body) }}</textarea>
                                                {!! $errors->first('body','<span class="form-text text-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <!-- Date range -->
                                <div class="form-group">
                                    <label>Fecha de publicación:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                          </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="published_at"
                                               name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Categorías</label>
                                    <select name="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                        <option value="">Seleccione un categoría</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id  ? 'selected' : ''}}> {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('category_id','<span class="form-text text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <label>Etiquetas</label>
                                    <select name="tags[]" class="select2 form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" multiple="multiple" data-placeholder="Escoge las etiquetas" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('tags','<span class="form-text text-danger">:message</span>') !!}

                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Extracto del post</label>
                                    <textarea name="excerpt" placeholder="Escribe un extracto del post"
                                              class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">{{ old('excerpt', $post->excerpt) }}</textarea>
                                    {!! $errors->first('excerpt','<span class="form-text text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <div class="dropzone"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Actualizar Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <!-- daterange picker -->
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

    @push('scripts')
        <!-- InputMask -->
        <script src="/adminlte/plugins/moment/moment.min.js"></script>
        <!-- date-range-picker -->
        <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Select2 -->
        <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
        <!-- Summernote -->
        <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- Dropzone-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

        <script !src="">
            Dropzone.autoDiscover = false;
            $(function(){
                //Date range picker with time picker
                $('#published_at').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 2020,
                    maxYear: parseInt(moment().format('YYYY'),10)+1
                });
                $('#published_at').val('{{old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}');
                $('.textarea').summernote();
                $('.select2').select2();

                var photos = new Dropzone('.dropzone',{
                   url: '{{ route('admin.posts.photos.store', $post->slug) }}',
                   acceptedFiles: 'image/*',
                   maxFilesize: 2,
                   paramName: 'photo',
                   headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'

                   },
                   dictDefaultMessage: "Arraste aqui las fotos"
                });

                photos.on('error', function (file, res) {
                    var msg = res.errors.photo[0];
                    $('.dz-error-message:last > span').text(msg);
                });
            });
        </script>
    @endpush

@endpush