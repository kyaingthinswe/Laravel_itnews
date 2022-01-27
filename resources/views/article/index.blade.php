@extends('layouts.app')

@section("title") Article List @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i class="feather-list"></i>
                        Article List
                    </h4>
                    @if(session('status'))
                        <div class="alert alert-success  ">{{session('status')}}</div>
                        @endif
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="{{route('article.create')}}" class="btn btn-lg btn-outline-primary">
                                <i class="feather-plus-circle"></i> Create Article
                            </a>
                        </div>

                        @isset(request()->search)
                            <h5>
                                Search By : "{{request()->search}}"

                            </h5>
                        @endisset

                        <form action="{{route('article.index')}}" method="get">
                            <div class="form-inline">
                                <input type="text" name="search" value="{{old('search')}}" class="form-control @error('search') is-invalid @enderror form-control-lg mr-2 " placeholder="Search Something" required>
                                <button class="btn btn-lg btn-primary"><i class="feather-search"></i></button>
                            </div>
                            @error('title')
                            <small class="text-danger font-weight-bold">{{$message}}</small>
                            @enderror
                        </form>
                    </div>
                    <table class="table table-bordered table-hover mt-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Article</th>
                            <th>Owner</th>
                            <th>Category</th>
                            <th>Control</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                      @forelse($articles as $a)
                            <tr>
                                <td>{{$a->id}}</td>
                                <td>
                                    <span>
                                        {{\Illuminate\Support\Str::words($a->title,5)}}
                                    </span>
                                    <br>
                                    <span class="text-black-50">
                                        {{\Illuminate\Support\Str::words($a->description,8)}}
                                    </span>
                                </td>
                                {{--                            <td>{{\Illuminate\Support\Facades\Auth::user()->name}}</td>--}}
                                <td>{{$a->user->name}}</td>
                                <td class="text-nowrap">{{$a->category->title}}</td>
                                <td class="text-nowrap">
                                    <a href="{{route('article.show',$a->id)}}" class="btn btn-sm btn-outline-success">Detail</a>

                                    <a href="{{route('article.edit',$a->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                    <form action="{{route('article.destroy',[$a->id,'page'=>request()->page])}}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are You Sure to Delete')">Delete</button>
                                    </form>
                                </td>

                                <td class="text-nowrap">
                                <span>
                                    <i class="feather-calendar"></i>
                                    {{$a->created_at->format('d/m/Y')}}
                                </span>
                                    <br>
                                <span>
                                    <i class="feather-clock"></i>
                                    {{$a->created_at->format('h:i A')}}
                                </span>
                                </td>
                            </tr>
                      @empty
                          <tr>
                              <td colspan="6" class="text-center">There is no article</td>
                          </tr>
                      @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between">
                        <div class="">
                            {{ $articles->links() }}
                        </div>
                        <div class="mb-0">
                            <h4>Total : {{$articles->total()}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

