@extends('layouts.app')
@section('content')
{{--    {{dd($count)}}--}}
    <div class="container">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Количество книг</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authorsList as $author)
                <tr>
                    <th scope="row">
                        <a href="{{ route('author_id', $author->id) }}">
                            {{ $author->name }}
                        </a>
                    </th>
                    <th>
                        {{ $count["$author->id"] }}
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="d-flex justify-content-center">
        @if($authorsList->total() > $authorsList->count())
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $authorsList->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
@endsection
