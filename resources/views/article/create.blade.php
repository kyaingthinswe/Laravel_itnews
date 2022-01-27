@extends('layouts.app')

@section("title") Create Article @endsection

@section('content')
    <x-bread-crumb>
{{--        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>--}}
        <li class="breadcrumb-item active" aria-current="page">Create Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                   <h4>
                       <i class="feather-plus-circle"></i>
                       Create Article
                   </h4>
                    <hr>
                    <form action="{{route('article.store')}}" method="post" id="createArticle">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label >Select Category</label>
                        <select name="category" class="custom-select @error('category') is-invalid @enderror  custom-select-lg" form="createArticle">
                            <option value="" > Select Category</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}" {{old('category')? 'selected':''}}>{{$c->title}}</option>
                            @endforeach
                        </select>

                    </div>
                    @error('category')
                    <small class="text-danger font-weight-bold">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{old('title')}}" form="createArticle" class="form-control @error('title') is-invalid @enderror form-control-lg" >
                    </div>
                    @error('title')
                    <small class="font-weight-bold text-danger">{{$message}}</small>
                    @enderror
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="description" form="createArticle"  cols="30" rows="10"  class="form-control @error('description') is-invalid @enderror form-control-lg">{{old('description')}}</textarea>
                    </div>
                    @error('description')
                    <small class="text-danger font-weight-bold">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-primary w-100" form="createArticle">Create Article</button>
                </div>
            </div>
        </div>
    </div>


@endsection
