@extends('layouts.app')

@section('content')
        
<div class="col-xs-12 col-sm-9">
    <h4>
        <span class="middle">{{$employee->first_name}} {{$employee->last_name}}</span>
    </h4>

    <div class="profile-info">
        <div class="profile-info-row">
            <div class="profile-info-name"> Company </div>

            <div class="profile-info-value">
                <span>{{$employee->company->name}}</span>
            </div>
        </div>
        
        <div class="profile-info-row">
            <div class="profile-info-name"> Designation </div>

            <div class="profile-info-value">
                <span>{{$employee->designation}}</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Email </div>

            <div class="profile-info-value">
                <span>{{$employee->email}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Address </div>

            <div class="profile-info-value">
                <span>{{$employee->address}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Phone </div>

            <div class="profile-info-value">
                <span>{{$employee->phone}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Website </div>

            <div class="profile-info-value">
                <span>{{$employee->website}}</span>
            </div>
        </div>

</div>
        
@endsection