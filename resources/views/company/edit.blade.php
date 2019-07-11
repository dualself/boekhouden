@extends('layouts.app')

@section('title', '- '. __('Bedrijf bewerken'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Bedrijf bewerken') }}</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('company.update', $company->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ __('Naam') }}:</label>
                                <input type="text" class="form-control" name="name" value="{{ $company->name }}" required />
                            </div>

                            <div class="form-group">
                                <label for="coc_number">{{ __('KVK-nummer') }}:</label>
                                <input type="text" class="form-control" name="coc_number" value="{{ $company->coc_number }}" required />
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Bewerken') }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection




