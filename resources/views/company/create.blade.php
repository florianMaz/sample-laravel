@extends('layouts.app')

@section('content')

    {{ Form::open(array('route' => array('companies.store'))) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null,  array('class' => 'form-control', 'required' => 'required')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'E-Mail Address') }}
        {{ Form::email('email', null,  array('class' => 'form-control', 'required' => 'required')) }}
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', null,  array('class' => 'form-control', 'required' => 'required')) }}
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'Phone') }}
        {{ Form::number('phone', null,  array('class' => 'form-control', 'required' => 'required')) }}
    </div>
    <div class="form-group">
        {{ Form::label('website', 'Website') }}
        {{ Form::text('website', null,  array('class' => 'form-control', 'required' => 'required')) }}
    </div>
    <div class="col-md-12 text-center"> 
        {{ Form::submit('Validate',  array('class' => 'btn btn-primary')) }}
    </div>
        
    {{ Form::close() }}

@endsection
        