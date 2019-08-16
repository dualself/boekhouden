@extends('layouts.app')
@section('title', '- '. __('Afschriften'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mt-3 mb-3">
                    <a href="{{ route('receipt.create') }}" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-sm fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Toevoegen') }}</span>
                    </a>
                </div>

                @if ($receipts->count())
                    <table class="table table-hover table-bordered table-responsive-sm" id="data-table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('Datum') }}</th>
                            <th scope="col">{{ __('Soort') }}</th>
                            <th scope="col">{{ __('Rekening') }}</th>
                            <th scope="col">{{ __('Boekstuk') }}</th>
                            <th scope="col" class="text-center">{{ __('Acties') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($receipts as $receipt)
                            <tr>
                                <td>{{ $receipt->date }}</td>
                                <td>{{ $receipt->type }}</td>
                                <td>{{ $receipt->account->description }}</td>
                                <td>{{ $receipt->reference }}</td>
                                <td class="text-center">
                                    <a class="btn btn-secondary mb-2" onclick="event.stopPropagation();" href="{{ route('receipt.edit', $receipt->id) }}"><i class="fas fa-pen"></i></a>
                                    <a class="btn btn-danger mb-2" href="{{ route('receipt.destroy', $receipt->id) }}" onclick="event.stopPropagation(); return confirm('Weet je zeker?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    {{ __('Geen afschriften gevonden!') }}
                @endif
            </div>
        </div>
    </div>
@endsection
