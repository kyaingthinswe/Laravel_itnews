@extends('blog.master')
@section('content')

    @forelse($articles as $article)
        <div class="border-bottom mb-4 pb-4 article-preview">
            <div class="p-0 p-md-3">
                <a class="fw-bold h4 d-block text-decoration-none" href="{{route('detail',$article->id)}}">
                    {{$article->title}} </a>

                <div class="small post-category mb-3">
                    <a href="{{route('category',$article->category->id)}}" rel="category tag">{{$article->category->title}}</a>
                </div>


                <div class="text-black-50 the-excerpt">
                    <p>{{\Illuminate\Support\Str::words($article->description,50)}}</p>
                </div>

                <div class="d-flex justify-content-between align-items-center see-more-group">
                    <div class="d-flex align-items-center">
                        <img alt="" src="{{asset('dashboard/img/user-default-photo.png')}}" class="avatar avatar-50 photo rounded-circle" height="50" width="50" loading="lazy">
                        <div class="ms-2">
                            <span class="small">
                                <i class="feather-user"></i>
                                {{$article->user->name}}
                            </span>
                            <br>
                            <span class="small">{{$article->created_at->format('d F Y')}}</span>
                        </div>
                    </div>

                    <a href="{{route('detail',$article->id)}}" class="btn btn-outline-primary rounded-pill px-3">Read More</a>
                </div>
            </div>
        </div>
    @empty

    @endforelse

@stop

@section('pagination-place')
    <div class="d-none d-lg-block" id="pagination">
        <div class="">
            {{$articles->onEachSide(1)->links()}}
        </div>
    </div>
@stop
