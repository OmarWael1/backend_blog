@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Collections
                    <a style="text-decoration: none;padding: 40%;" href="{{route('addCollectionView')}}" role="button">{{__('Add new collection')}}</a>
                </div>

                <div class="card-body">
                    <table style="width:100%" border=1 frame=void rules=rows>
                        <thead>
                            <tr>
                                <th class="text-center">name</th>
                                <th class="text-center">description</th>
                                <th class="text-center">No of Readers</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($collections as $collection)
                                <tr>
                                    <td  class="text-center">{{$collection->name}}</td>
                                    <td  class="text-center">{{$collection->description}}</td>
                                    <td  class="text-center">{{$collection->number_of_readers}}</td>
                                    <td class="text-center"><a href="{{route('editCollectionView', ['id' => $collection->id])}}" role="button">{{__('Edit ')}}</a></td>
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
