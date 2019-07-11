@extends('layouts.app')
@section('title', '- '. __('Grootboekrekening toevoegen'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="post" action="{{ route('ledger.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="code">{{ __('Code') }}:</label>
                        <input type="text" class="form-control" name="code" required />
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Omschrijving') }}:</label>
                        <input type="text" class="form-control" name="description" required maxlength="255"/>
                    </div>
                    <div class="form-group">
                        <label for="category">{{ __('Categorie') }}:</label>
                        @if (count($categories) > 0)
                            <select class="form-control" name="category" required>
                                @foreach ($categories as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Toevoegen') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
