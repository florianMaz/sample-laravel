@extends('layouts.app')

@section('content')
        {{ Form::model($employee, array('route' => array('companies.update', $employee->id), 'method' => 'PUT')) }}
        {{ Form::hidden('id', $employee->id) }}
        <div class="form-group">
            {{ Form::label('company_id', 'Company ') }}
            {{Form::select('company_id', $companies,  array('class' => 'form-control', 'required' => 'required'), array('id', $employee->company_id))}}
        </div>
        <div class="form-group">
            {{ Form::label('first_name', 'First name') }}
            {{ Form::text('first_name', $employee->first_name,  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('last_name', 'Last name') }}
            {{ Form::text('last_name', $employee->last_name,  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-Mail Address') }}
            {{ Form::email('email', $employee->email,  array('class' => 'form-control')) }}
        </div>  
        <div class="form-group">
            {{ Form::label('designation', 'Designation') }}
            {{ Form::text('designation', $employee->designation,  array('class' => 'form-control', 'required' => 'required')) }}
        </div>
        <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ Form::text('address', $employee->address,  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'Phone') }}
            {{ Form::number('phone', $employee->phone,  array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('website', 'Website') }}
            {{ Form::text('website', $employee->website,  array('class' => 'form-control')) }}
        </div>
            {{ Form::submit('Validate') }}
        {{ Form::close() }}


@endsection