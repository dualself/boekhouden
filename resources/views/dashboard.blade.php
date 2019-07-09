@extends('layouts.app')

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
                        <span class="text">{{ __('Grootboekrekeningen') }}</span>
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
                        <span class="text">{{ __('Instellingen') }}</span>
                    </a>
                    <p class="text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet mi nec quam auctor efficitur. Mauris commodo, leo et vulputate maximus, ex sem ultrices odio, eu pretium tortor dui sit amet purus.</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
