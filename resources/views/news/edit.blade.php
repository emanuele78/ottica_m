@extends('news.base')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-between">
            <div class="col">
                <h1>Inserisci la notizia</h1>
            </div>
            <div class="col text-right">
                <a href="{{route('news_index')}}" class="btn btn-success" role="button" onclick="return confirm('Eventuali modifiche non salvate verranno perse. Continuare?');">Annulla modifica</a>
                <form class="d-inline" action="{{route('news_destroy', $news->title_slug)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" role="button" onclick="return confirm('Confermi la cancellazione?');">Cancella news</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form id="news_form" action="{{route('news_update', $news->title_slug)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group mt-4">
                        <label for="title">Titolo *</label>
                        <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Inserisci titolo" value="{{old('title')?old('title'):$news->title}}" required maxlength="{{$maxTitleLength}}">
                        @if($errors->has('title'))
                            <small id="titleHelp" class="form-text text-danger">{{$errors->first('title')}}</small>
                        @else
                            <small id="titleHelp" class="form-text text-muted">Lunghezza massima {{$maxTitleLength}} caratteri</small>
                        @endif
                    </div>
                    <div class="image_wrapper">
                        <img src="{{asset('img/'.$news->image)}}" id="image_preview" alt="Immagine della news">
                    </div>
                    <div class="form-group mt-4">
                        <label for="imageUpload">Immagine della news *</label>
                        <input name="image" type="file" class="form-control-file" id="imageUpload" accept="image/x-png,image/jpeg">
                        @if($errors->has('image'))
                            <small id="titleHelp" class="form-text text-danger">{{$errors->first('image')}}</small>
                        @else
                            <small id="titleHelp" class="form-text text-muted">Grandezza massima {{$maxImageWeight}} Kb</small>
                        @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="shortDescription">Descrizione breve *</label>
                        <input name="description_short" type="text" class="form-control" id="shortDescription" aria-describedby="shortDescriptionHelp" placeholder="descrizione" value="{{old('description_short')?old('description_short'):$news->description_short}}" maxlength="{{$maxShortDescriptionlength}}">
                        @if($errors->has('description_short'))
                            <small id="shortDescriptionHelp" class="form-text text-danger">{{$errors->first('description_short')}}</small>
                        @else
                            <small id="shortDescriptionHelp" class="form-text text-muted">Lunghezza massima {{$maxShortDescriptionlength}} caratteri</small>
                        @endif
                    </div>
                    <div class="form-group mt-4">
                        <label for="longDescription">Descrizione completa *</label>
                        <textarea name="description_long" class="description form-control" id="longDescription" rows="3">{{$news->description_long}}</textarea>
                        @if($errors->has('description_long'))
                            <small class="form-text text-danger">{{$errors->first('description_long')}}</small>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary p-2">Salva le modifiche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script src="{{asset('js/tinymce.js')}}"></script>
    <script src="{{asset('js/image_preview.js')}}"></script>
@endsection
