@extends('website.layouts.app')

@section('title', 'Home')

@section('content')

    @include('website.components.hero')
    @include('website.components.stats-row')
    @include('website.components.plan')
    @include('website.components.features-section')
    @include('website.components.compare-section')
    @include('website.components.faq')
    @include('website.components.cta')

@endsection
