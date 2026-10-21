@extends('layouts.app')

@section('title', 'All Packaging Products | DailyPack Solution Pvt Ltd')

@section('content')
<div class="bg-slate-900 text-white py-12 px-6 text-center">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl sm:text-4xl font-black mb-3 text-pw-gold">All Packaging Products</h1>
        <p class="text-slate-400 text-sm sm:text-base">Search and filter through 500+ food grade plastic, paper, bagasse & glass packaging items.</p>
    </div>
</div>

@include('partials.products-grid')
@endsection
