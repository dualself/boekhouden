@extends('layouts.app')
@section('title', '- '. __('Afschriften toevoegen'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Afschriften toevoegen') }}</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('receipt.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="type">{{ __('Soort boeking') }}:</label>
                                <select class="form-control" name="type" required>
                                    @foreach ($receipt_types as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="account">{{ __('Rekening') }}:</label>
                                <select class="form-control" name="account" required>
                                    @foreach ($account_types as $account_type)
                                        <option value="{{ $account_type->id }}">{{ $account_type->description }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">{{ __('Datum') }}:</label>
                                <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Omschrijving') }}:</label>
                                <input type="text" class="form-control" name="description" maxlength="255"/>
                            </div>

                            <div class="form-group">
                                <label for="reference">{{ __('Boekstoek') }}:</label>
                                <input type="text" class="form-control" name="reference" maxlength="255"/>
                            </div>

                            <div class="form-group">
                                <label for="vat_type">{{ __('BTW') }}:</label>
                                <select class="form-control" name="vat_type" required>
                                    @foreach ($vat_types as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Toevoegen') }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
