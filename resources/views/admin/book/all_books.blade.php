@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a style="text-decoration: none;" href="{{route('addBookView')}}" role="button">{{__('Add new book')}}</a>
                </div>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <table style="width:100%" border=1 frame=void rules=rows>
                        <thead>
                            <tr>
                                <th class="text-center">title</th>
                                <th class="text-center">description</th>
                                <th class="text-center">category</th>
                                <th class="text-center">No of Readers</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">view</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td  class="text-center">{{$book->title}}</td>
                                    <td  class="text-center">{!! str_limit($book->description,$limit=70) !!}</td>
                                    <td  class="text-center">{{$book->category}}</td>
                                    <td  class="text-center">{{$book->number_of_readers}}</td>
                                    <td class="text-center"><a href="{{route('deleteBook', ['id' => $book->id])}}" role="button">{{__('Delete ')}}</a></td>
                                    <td class="text-center"><a href="{{route('editBookView', ['id' => $book->id])}}" role="button">{{__('Edit ')}}</a></td>
                                    <td class="text-center"><a href="{{route('book', ['id' => $book->id])}}" role="button">{{__('view ')}}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
