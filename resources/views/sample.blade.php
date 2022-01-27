@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <i class="feather-layers"></i>
                    Category Manager
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias aliquam aperiam autem, consectetur dignissimos eveniet itaque laborum laudantium libero maiores nulla numquam quas quo rerum suscipit voluptas! Excepturi, illo?</p>
                </div>
            </div>
        </div>
    </div>
@endsection
