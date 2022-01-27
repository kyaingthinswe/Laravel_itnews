@extends('layouts.app')

@section("title") Edit Category @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Manager</a></li>

        <li class="breadcrumb-item active" aria-current="page">Category Edit</li>

    </x-bread-crumb>

    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i class="feather-edit"></i>
                        Edit Category
                    </h4>
                    <hr>
                    <div>
                        <form action="{{route('category.update',$category->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-inline">
                                <input type="text" name="title" value="{{old('title',$category->title)}}" class="form-control @error('title') is-invalid @enderror form-control-lg mr-2 " placeholder="Created Category" required>
                                <button class="btn btn-lg btn-primary"> Update</button>
                            </div>
                            @error('title')
                            <small class="text-danger font-weight-bold">{{$message}}</small>
                            @enderror
                        </form>
                        @if(session('status'))
                            <small class="text-success font-weight-bold">{{session('status')}}</small>
                        @endif
                    </div>
                    @include('category.list')

                </div>
            </div>
        </div>
    </div>
@endsection
