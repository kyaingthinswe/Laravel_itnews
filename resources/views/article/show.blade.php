@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4>
                       {{$article->title}}
                    </h4>
                    <div class=" mb-3">
                        <div>
                            <span class="text-primary ">
                            <i class="feather-user"></i>
                            {{$article->user->name}}
                        </span>
                            <span class="text-primary mx-1 ">
                            <i class="feather-layers"></i>
                            {{$article->category->title}}
                        </span>
                        <span class="text-primary">
                            <i class="feather-calendar"></i>
                            {{$article->created_at->format('d/m/Y')}}
                        </span>
                        </div>

                    </div>
                    <p class="text-black-50">
                        {{$article->description}}
                    </p>
                    <hr>
{{--                    show ထဲမှာ delete မထည့်သင့်--}}
                    <div class="d-flex justify-content-between">
                        <div>
                            <a href="{{route('article.edit',$article->id)}}" class="btn btn-sm btn-outline-info">Edit</a>

                            <form action="{{route('article.destroy',$article->id)}}" method="post" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure to Delete')">Delete</button>
                            </form>
                            <a href="{{route('article.index',$article->id)}}" class="btn btn-sm btn-outline-secondary">All Articles</a>

                        </div>
                        <div>
                            <span>{{$article->created_at->diffforhumans()}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
