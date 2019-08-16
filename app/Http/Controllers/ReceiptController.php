<?php

namespace App\Http\Controllers;

use App\Receipt;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * Displays a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Collection $receipts */
        $receipts = $user->company->receipts()->orderBy('date')->get();

        return view('receipt.index', compact('receipts'));
    }

    /**
     * Shows the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        /** @var User $user */
        $user = Auth::user();

        $receipt_types = config('enums.receipt_types');
        $vat_types = config('enums.vat_types');
        $account_types = $user->company->getActivePaymentLedgers()->get();

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
            'account_id' => 'required|numeric',
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

        $user->company->receipts()->save($receipt);

        return redirect()->route('receipt.index')->with('success', __('Afschrift is succesvol aangemaakt!'));
    }

    /**
     * Shows the form for editing the specified resource.
     *
     * @param  Receipt $receipt
     * @return Response
     */
    public function edit(Receipt $receipt)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Receipt $receipt */
        $receipt = $user->company->receipts()->find($receipt->id);

        if (!$receipt) {
            abort(404);
        }

        $receipt_types = config('enums.receipt_types');
        $vat_types = config('enums.vat_types');
        $account_types = $user->company->getActivePaymentLedgers()->get();

        return view('receipt.edit', compact(['receipt', 'receipt_types', 'account_types', 'vat_types']));
    }

    /**
     * Updates the specified resource in storage.
     *
     * @param  Request $request
     * @param  Receipt $receipt
     * @return Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Receipt $receipt */
        $receipt = $user->company->receipts()->findOrFail($receipt->id);

        $validation = [];

        if ($receipt->getOriginal('account_id') != $request->get('account')) {
            $validation['account'] = 'required|numeric';

            $receipt->account_id = $request->get('account');
        }

        if ($receipt->getOriginal('description') != $request->get('description')) {
            $receipt->description = $request->get('description');
        }

        if ($receipt->getOriginal('reference') != $request->get('reference')) {
            $receipt->reference = $request->get('reference');
        }

        if ($receipt->getOriginal('type') != $request->get('type')) {
            $validation['type'] = 'required|boolean';

            $receipt->type = $request->get('type');
        }

        if ($receipt->getOriginal('vat_type') != $request->get('vat_type')) {
            $validation['vat_type'] = 'required|boolean';

            $receipt->vat_type = $request->get('vat_type');
        }

        if ($receipt->getOriginal('date') != $request->get('date')) {
            $validation['date'] = 'required|date';

            $receipt->date = $request->get('date');
        }

        $request->validate($validation);

        $receipt->save();

        return redirect()->route('receipt.edit', [$receipt->id])->with('success', __('Afschrift is succesvol aangepast!'));
    }

    /**
     * Removes the specified resource from storage.
     *
     * @param Receipt $receipt
     * @return Response
     * @throws Exception
     */
    public function destroy(Receipt $receipt)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Receipt $ledger */
        $receipt = $user->company->receipts()->find($receipt->id);

        if (!$receipt) {
            abort(404);
        }

        $receipt->delete();

        return redirect()->route('receipt.index')->with('success', __('Afschrift is succesvol verwijderd!'));
    }
}
