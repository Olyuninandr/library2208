@extends('layouts.app')
@section('content')
    <div class="container">

        @if(isset($book))
            <form method="POST" action="{{ route('book_submit_update', $book->id) }}" enctype="multipart/form-data">
                @else
                    <form method="POST" action="{{ route('book_submit') }}" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="Name">Название книги</label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   id="Name"
                                   value="{{ $book->name ?? '' }}"
                                   placeholder="Имя книги">
                        </div>

                        <div class="form-group">
                            <label for="author">Выберите автора</label>
                            <select class="form-control"
                                    name="author_id"
                                    id="author">
                                <option selected disabled>Выберите автора</option>
                                @foreach($authorsList as $author)
                                    <option value="{{$author->id}}"
                                            @if(isset($book) && $author->id == $book->author_id) selected @endif>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="short">Описание</label>
                            <textarea name="short"
                                      class="form-control"
                                      id="short"
                                      rows="7">
                                {{ $book->short ?? '' }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="pages">Количество страниц</label>
                            <input type="text"
                                   class="form-control"
                                   name="pages"
                                   id="pages"
                                   value="{{ $book->pages ?? '' }}"
                                   placeholder="Количество страниц">
                        </div>

                        <div class="form-group">
                            <label for="picture">Обложка книги</label>
                            <input type="file" name="picture" value="{{ $book->picture ?? '' }}"
                                   class="form-control-file" id="picture">
                        </div>

                        @if(!empty($book) && isset($book->picture))
                            <div class="card" style="width: 18rem;">
                                <img  src="{{ asset('/storage/'.$book->picture) }}" class="card-img-top">
                                <div class="card-body">
                                    <p class="card-text">
                                        Обложка книги
                                    </p>
                                </div>
                            </div>
                        @endif
                        <br>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('home')}}">
                                <button type="button" class="btn btn-secondary">Назад</button>
                            </a>

                            <button type="submit" class="ml-3 btn btn-primary">
                                Сохранить
                            </button>

                            @if(!empty($book))
                                <a href="{{ route('book_delete', $book->id) }}">
                                    <button type="button" class="ml-3 btn btn-danger">Удалить
                                    </button>
                                </a>
                            @endif
                        </div>
                    </form>
    </div>

@endsection
