@extends('layouts.main')
@section('title') Список новостей @parent @stop
@section('content')
    <section class="py-3 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Новости</h1>
            </div>
        </div>
    </section>

    <div class="album py-4 bg-body-tertiary">

        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @forelse($newsList as $news)
                <div class="col">
                    <div class="card shadow-sm">
                        <p>{{$news->categoryTitle}}</p>
                        <img src="{{$news->img}}">
                        <div class="card-body">
                            <p class="card-text">{{$news->title}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('news.show', ['id'=> $news->id])}}">Show</a>
                                </div>
                                <small class="text-body-secondary">{{$news->author}} ({{$news->created_at}})</small>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h2>Новостей нет</h2>
                @endforelse
            </div>

        </div>
    </div>
@endsection

