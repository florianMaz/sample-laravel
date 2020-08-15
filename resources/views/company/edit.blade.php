@extends('layouts.app')

@section('content')
        {{ Form::model($company, array('route' => array('companies.update', $company->id), 'method' => 'PUT')) }}
        {{ Form::hidden('id', $company->id) }}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $company->name,  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-Mail Address') }}
            {{ Form::text('email', $company->email,  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ Form::text('address', $company->address,  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', $company->phone,  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('website', 'Website') }}
            {{ Form::text('website', $company->website,  array('class' => 'form-control')) }}
        </div>
            {{ Form::submit('Validate') }}
        {{ Form::close() }}


@endsection