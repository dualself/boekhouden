@extends('layouts.app')
@section('title', '- '. __('Grootboekrekeningen'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mt-3 mb-3">
                    <a href="{{ route('ledger.create') }}" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-sm fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Toevoegen') }}</span>
                    </a>
                </div>

                @if ($ledgers->count())
                    <table class="table table-hover table-bordered table-responsive-sm" id="data-table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('Code') }}</th>
                            <th scope="col">{{ __('Omschrijving') }}</th>
                            <th scope="col">{{ __('Categorie') }}</th>
                            <th scope="col" class="text-center">{{ __('Actief') }}</th>
                            <th scope="col" class="text-center">{{ __('Acties') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ledgers as $ledger)
                            <tr>
                                <td>{{ $ledger->code }}</td>
                                <td>{{ $ledger->description }}</td>
                                <td>{{ $ledger->category }}</td>
                                <td class="text-center">
                                    @if ($ledger->active)
                                        <i class="fas fa-eye h5"></i>
                                    @else
                                        <i class="fas fa-eye-slash h5"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-secondary mb-2" onclick="event.stopPropagation();" href="{{ route('ledger.edit', $ledger->id) }}"><i class="fas fa-pen"></i></a>
                                    <a class="btn btn-danger mb-2" href="{{ route('ledger.destroy', $ledger->id) }}" onclick="event.stopPropagation(); return confirm('Weet je zeker?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    {{ __('Geen grootboekrekeningen gevonden!') }}
                @endif
            </div>
        </div>
    </div>
@endsection
