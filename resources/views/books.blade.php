@extends('layouts.app')
@section('content')
    <div class="container">
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Имя</th>

            <th scope="col">Автор</th>

        </tr>
        </thead>
        <tbody>
        @foreach($booksList as $book)
            <tr>
            <th scope="row">{{ $book->name }}</th>
                <td> <a href="{{ route('author_id', $book->author_id) }}">
            {{ $book->getAuthorName->name}}
                    </a>
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>

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

@endsection
