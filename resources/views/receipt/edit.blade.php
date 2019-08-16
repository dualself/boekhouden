@extends('layouts.app')
@section('title', '- '. __('Afschrift bewerken'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="post" action="{{ route('receipt.update', $receipt->id) }}">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="type">{{ __('Soort boeking') }}:</label>
                        <select class="form-control" name="type" required>
                            @foreach ($receipt_types as $key => $value)
                                @if ($key == $receipt->type)
                                    <option selected="selected" value="{{ $key }}">{{ $value }}</option>
                                @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="account">{{ __('Rekening') }}:</label>
                        <select class="form-control" name="account" required>
                            @foreach ($account_types as $account_type)
                                @if ($account_type->id == $receipt->account->id)
                                    <option selected="selected" value="{{ $account_type->id }}">{{ $account_type->description }}</option>
                                @else
                                    <option value="{{ $account_type->id }}">{{ $account_type->description }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="date">{{ __('Datum') }}:</label>
                        <input type="date" class="form-control" name="date" value="{{ $receipt->date }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="description">{{ __('Omschrijving') }}:</label>
                        <input type="text" class="form-control" name="description" value="{{ $receipt->description }}" maxlength="255"/>
                    </div>

                    <div class="form-group">
                        <label for="reference">{{ __('Boekstuk') }}:</label>
                        <input type="text" class="form-control" name="reference" value="{{ $receipt->reference }}" maxlength="255"/>
                    </div>

                    <div class="form-group">
                        <label for="vat_type">{{ __('BTW') }}:</label>
                        <select class="form-control" name="vat_type" required>
                            @foreach ($vat_types as $key => $value)
                                @if ($key == $receipt->vat_type)
                                    <option selected="selected" value="{{ $key }}">{{ $value }}</option>
                                @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Bewerken') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
