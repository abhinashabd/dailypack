@extends('layouts.app')

@section('title', 'Product Categories | DailyPack Solution Pvt Ltd')

@section('content')
<div class="bg-slate-900 text-white py-12 px-6 text-center">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl sm:text-4xl font-black mb-3 text-pw-gold">Packaging Categories</h1>
        <p class="text-slate-400 text-sm sm:text-base">Browse our 11 core packaging categories engineered for restaurants, bakeries, cloud kitchens and beverage brands.</p>
    </div>
</div>

@include('partials.categories-grid')
@endsection
