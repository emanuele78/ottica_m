@extends('news.base')

@section('content')
    <div class="container news_list">
        <div class="row mt-5 justify-content-between">
            <div class="col">
                <h1>Elenco notizie</h1>
            </div>
            <div class="col text-right">
                <form class="d-inline" action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success" role="button">Logout</button>
                </form>
                <a href="{{route('dashboard')}}" class="btn btn-success" role="button">Home</a>
                <a href="{{route('news_create')}}" class="btn btn-success" role="button">Nuova notizia</a>
            </div>
        </div>
        <div class="row">
            @foreach ($news as $single_news)
                <div class="col-4 mt-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('img/'.$single_news->image)}}" class="card-img-top" alt="Immagine della news">
                        <div class="card-body">
                            <span class="text-muted">{{$single_news->updated_at->format('d-m-Y')}}</span>
                            <h4 class="card-title">{{$single_news->title}}</h4>
                            <p class="card-text">{{$single_news->description_short}}</p>
                            <a href="{{route('news_edit',$single_news->title_slug)}}" class="news_card_overlay">
                                <span class="overlay_text">Modifica</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
@endsection
