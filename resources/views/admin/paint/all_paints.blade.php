@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Paints
                    <a style="text-decoration: none;padding: 40%;" href="{{route('addPaintView')}}" role="button">{{__('Add new paint')}}</a>
                </div>

                <div class="card-body">
                    <table style="width:100%" border=1 frame=void rules=rows>
                        <thead>
                            <tr>
                                <th class="text-center">title</th>
                                <th class="text-center">description</th>
                                <th class="text-center">collection</th>
                                <th class="text-center">No of Readers</th>
                                <th class="text-center">image</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paints as $paint)
                                <tr>
                                    <td  class="text-center">{{$paint->title}}</td>
                                    <td  class="text-center">{{$paint->description}}</td>
                                    <td  class="text-center">{{$paint->collection_id}}</td>
                                    <td  class="text-center">{{$paint->number_of_readers}}</td>
                                    <td  class="text-center" style="padding: 10px;"><img src="{{asset('storage/'.$paint->file_name)}}" style="width: 100px; height: 100px"> </td>
                                    <td class="text-center"><a href="{{route('editPaintView', ['id' => $paint->id])}}" role="button">{{__('Edit ')}}</a></td>
                                    {{--<td class="text-center"><a href="{{route('paint', ['id' => $paint->id])}}" role="button">{{__('view ')}}</a></td>--}}
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
