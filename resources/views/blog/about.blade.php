@extends('blog.master')
@section('title') About @stop
@section('content')

    <h1>This is About Page</h1>

    {{request()->url()}}

@stop
