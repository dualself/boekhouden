@extends('layouts.app')
@section('title', '- '. __('Dashboard'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary btn-icon-split btn-lg mb-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-book"></i>
                        </span>
                        <span class="text text-break">{{ __('Grootboekrekeningen') }}</span>
                    </a>
                    <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet mi nec quam auctor efficitur. Mauris commodo, leo et vulputate maximus, ex sem ultrices odio, eu pretium tortor dui sit amet purus.</p>
                </div>
            </div>

        </div>
        <div class="col-md-4">

            <div class="card shadow mb-4 border-bottom-success">
                <div class="card-body text-center">
                    <a href="{{ route('receipt.create') }}" class="btn btn-success btn-icon-split btn-lg mb-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-receipt"></i>
                        </span>
                        <span class="text text-break">{{ __('Afschriften') }}</span>
                    </a>
                    <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet mi nec quam auctor efficitur. Mauris commodo, leo et vulputate maximus, ex sem ultrices odio, eu pretium tortor dui sit amet purus.</p>
                </div>
            </div>

        </div>
        <div class="col-md-4">

            <div class="card shadow mb-4 border-bottom-secondary">
                <div class="card-body text-center">
                    <a href="#" class="btn btn-secondary btn-icon-split btn-lg mb-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-cogs"></i>
                        </span>
                        <span class="text text-break">{{ __('Instellingen') }}</span>
                    </a>
                    <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet mi nec quam auctor efficitur. Mauris commodo, leo et vulputate maximus, ex sem ultrices odio, eu pretium tortor dui sit amet purus.</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
