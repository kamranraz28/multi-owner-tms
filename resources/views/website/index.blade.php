@extends('website.layouts.app')

@section('title', 'Home')

@section('content')

    @include('website.components.hero')
    @include('website.components.features-section')
    @include('website.components.plan')
    @include('website.components.faq')

@endsection
