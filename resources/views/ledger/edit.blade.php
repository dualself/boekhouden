@extends('layouts.app')
@section('title', '- '. __('Grootboekrekening bewerken'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="post" action="{{ route('ledger.update', $ledger->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="code">{{ __('Code') }}:</label>
                        <input type="text" class="form-control" name="code" value="{{ $ledger->code }}" required />
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Omschrijving') }}:</label>
                        <input type="text" class="form-control" name="description" value="{{ $ledger->description }}" required maxlength="255"/>
                    </div>

                    <div class="form-group">
                        <label for="category">{{ __('Categorie') }}:</label>
                        @if (count($categories) > 0)
                            <select class="form-control" name="category" required>
                                @foreach ($categories as $key => $value)
                                    @if ($value == $ledger->category)
                                        <option selected="selected" value="{{ $key }}">{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="active">{{ __('Actief') }}:</label>
                        <select class="form-control" name="active" required>
                            @if ($ledger->active)
                                <option selected="selected" value="1">{{ __('Actief') }}</option>
                                <option value="0">{{ __('Niet actief') }}</option>
                            @else
                                <option value="1">{{ __('Actief') }}</option>
                                <option selected="selected" value="0">{{ __('Niet actief') }}</option>
                            @endif
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Bewerken') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
