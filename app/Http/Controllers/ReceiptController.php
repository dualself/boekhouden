<?php

namespace App\Http\Controllers;

use App\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Shows the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $receipt_types = config('enums.receipt_types');
        $vat_types = config('enums.vat_types');
        $account_types = [];

        return view('receipt.create', compact(['receipt_types', 'account_types', 'vat_types']));
    }

    /**
     * Stores a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'account' => 'required|numeric',
            'type' => 'boolean|required',
            'vat_type' => 'boolean|required',
            'date' => 'date|required',
        ]);

        $receipt = new Receipt([
            'account' => $request->get('account'),
            'description' => $request->get('description'),
            'reference' => $request->get('reference'),
            'type' => $request->get('type'),
            'vat_type' => $request->get('vat_type'),
            'date' => $request->get('date'),
        ]);

        $receipt->save();

        return redirect('/');
    }
}
