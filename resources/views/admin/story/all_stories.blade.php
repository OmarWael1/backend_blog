@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a style="text-decoration: none;" href="{{route('addStoryView')}}">{{__('Add new Story')}}</a>
                </div>

                <div class="card-body">
                    <table style="width:100%" border=1 frame=void rules=rows>
                        <thead>
                            <tr>
                                <th class="text-center">title</th>
                                <th class="text-center">body</th>
                                <th class="text-center">No of Readers</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">view</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stories as $story)
                                <tr>
                                    <td  class="text-center">{{$story->title}}</td>
                                    <td  class="text-center">{!!  strip_tags(str_limit($story->body,$limit=70)) !!}</td>
                                    <td  class="text-center">{{$story->number_of_readers}}</td>
                                    <td  class="text-center" style="padding: 10px;"><img src="{{asset('storage/'.$story->image_name)}}" style="width: 100px; height: 100px"> </td>
                                    <td class="text-center"><a href="{{route('deleteStory', ['id' => $story->id])}}" role="button">{{__('Delete ')}}</a></td>
                                    <td class="text-center"><a href="{{route('editStoryView', ['id' => $story->id])}}" role="button">{{__('Edit ')}}</a></td>
                                    <td class="text-center"><a href="{{route('story', ['id' => $story->id])}}" role="button">{{__('view ')}}</a></td>
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
