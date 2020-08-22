@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Добавленные книги') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Имя</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($booksList as $book)
                                <tr>
                                    <th>
                                        {{ $book->name }}
                                    </th>
                                    <th>
                                        <a href="{{ route('get_book', $book->id) }}">
                                        Подробнее
                                        </a>
                                    </th>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            @if($booksList->total() > $booksList->count())
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{ $booksList->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
