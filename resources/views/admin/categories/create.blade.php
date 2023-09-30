@extends('layouts.admin')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif

    @include('inc.message')
    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="mb-3">
            <label for="titleNews" class="form-label">Название категории</label>
            <input type="text" class="form-control" name="title" id="titleNews" placeholder="важная новость" value="{{old('title')}}">
        </div>
        <div class="mb-3">
            <label for="descriptionNews" class="form-label">Описание категории</label>
            <textarea class="form-control" name="description" id="descriptionNews" rows="3">{{old('description')}}</textarea>
        </div>
        <button class="btn btn-primary mt-2" type="submit">Сохранить</button>
    </form>
@endsection
