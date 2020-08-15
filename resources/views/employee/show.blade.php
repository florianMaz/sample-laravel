@extends('layouts.app')

@section('content')
        
<div class="col-xs-12 col-sm-9">
    <h4>
        <span class="middle">{{$company->name}}</span>
    </h4>

    <div class="profile-info">
        <div class="profile-info-row">
            <div class="profile-info-name"> Email </div>

            <div class="profile-info-value">
                <span>{{$company->email}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Address </div>

            <div class="profile-info-value">
                <span>{{$company->address}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Phone </div>

            <div class="profile-info-value">
                <span>{{$company->phone}}</span>
            </div>
        </div>

        <div class="profile-info-row">
            <div class="profile-info-name"> Website </div>

            <div class="profile-info-value">
                <span>{{$company->website}}</span>
            </div>
        </div>

</div>
        
@endsection