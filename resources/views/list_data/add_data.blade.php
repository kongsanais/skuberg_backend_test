@extends('layouts.app')
@section('content')

    {!! Form::open(['action' => 'ListDataController@store','method'=>'POST']) !!}
        <div class="container">
        <div class="col-md-6">
            <div class="form-group">
                    {!!Form::label("Name")!!}
                    {!!Form::text('name',null,["class"=>"form-control"])!!}
            </div>
            <div class="form-group">
                    {!!Form::label("Code")!!}
                    {!!Form::text('code',null,["class"=>"form-control"])!!}
            </div>
            <input type="submit" value="Save" class="btn btn-primary"></input>
        </div>
        </div>
    {!! Form::close() !!}


@endsection