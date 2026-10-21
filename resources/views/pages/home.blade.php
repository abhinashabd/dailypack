@extends('layouts.app')

@section('title', 'DailyPack Solution Pvt Ltd | Managed Food Packaging Platform')

@section('content')
    <!-- Hero Section -->
    @include('partials.hero')

    <!-- Stats Bar -->
    @include('partials.stats')

    <!-- Categories Grid Section -->
    @include('partials.categories-grid')

    <!-- Products Showcase Grid Section (Featured Packaging Inventory) -->
    @include('partials.products-grid')

    <!-- Trusted By Leading Brands Section -->
    @include('partials.trusted-brands')

    <!-- Manufacturing Heritage Section -->
    @include('partials.heritage')

    <!-- DailyPack Advantage Section -->
    @include('partials.advantage')

    <!-- Client Testimonials Carousel Section -->
    @include('partials.testimonials')

    <!-- Packaging Sorted Forever CTA Banner Section -->
    @include('partials.cta-banner')
@endsection
