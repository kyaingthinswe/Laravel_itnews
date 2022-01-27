@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <i class="fas fa-home"></i>
                    {{ __('You are logged in!') }}
                    <button class="test btn btn-primary">test</button>

                        <br>
                    {{ Request::url() }}
                        <br>
                        <br>
{{--                        {{asset('public/profile/'.$articles->user->photo)}}--}}
                        <br>
                        {{route('article.destroy',['5','page'=>5])}}
                        <br>
                        {{route('article.show',4)}}

                        <br>
                        <br>
                    {{\App\Base::$name}}
                        <br>
                        <br>
                    {{\App\Base::$description}}
                        <br>
                        <br>
                    {{\App\Base::something()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('foot')
    <script>
        $(".test").click(function (){
            alert("hello");
        })
    </script>
@endsection
