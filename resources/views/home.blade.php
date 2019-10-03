@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="{{route('news_index')}}" class="btn btn-primary">NEWS</a>
                    <a href="#" class="btn btn-primary">CAROUSEL</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
