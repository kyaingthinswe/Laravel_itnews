@extends('layouts.app')

@section("title") Category Manager @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Category Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                   <h4>
                       <i class="feather-list"></i>
                       Category List
                   </h4>
                    <hr>
                    <div>
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="form-inline">
                                <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror form-control-lg mr-2 " placeholder="Created Category" required>
                                <button class="btn btn-lg btn-primary">Created Category</button>
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
