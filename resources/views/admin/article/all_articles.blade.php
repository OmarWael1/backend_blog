@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Articles
                    <a style="padding: 70%" href="{{route('addArticleView')}}" role="button">{{__('Add new article')}}</a>
                </div>

                <div class="card-body">
                    <table style="width:100%" border=1 frame=void rules=rows>
                        <thead>
                            <tr>
                                <th class="text-center">title</th>
                                <th class="text-center">body</th>
                                <th class="text-center">category</th>
                                <th class="text-center">type</th>
                                <th class="text-center">No of Readers</th>
                                <th class="text-center">image</th>
                                <th class="text-center">view</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td  class="text-center">{{$article->title}}</td>
                                    <td  class="text-center">{!! strip_tags(str_limit($article->body,100)) !!}</td>
                                    <td  class="text-center">{{$article->category}}</td>
                                    <td  class="text-center">{{$article->type}}</td>
                                    <td  class="text-center">{{$article->number_of_readers}}</td>
                                    <td  class="text-center" style="padding: 10px;"><img src="{{asset('storage/'.$article->image_name)}}" style="width: 100px; height: 100px"> </td>
                                    <td class="text-center"><a href="{{route('editArticleView', ['id' => $article->id])}}" role="button">{{__('Edit ')}}</a></td>
                                    <td class="text-center"><a href="{{route('article', ['id' => $article->id])}}" role="button">{{__('view ')}}</a></td>
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
