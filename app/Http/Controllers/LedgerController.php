<?php

namespace App\Http\Controllers;

use App\Ledger;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LedgerController extends Controller
{
    /**
     * Creates a new controller instance.
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

        /** @var Collection $ledgers */
        $ledgers = $user->company->ledgers()->orderBy('code')->get();

        return view('ledger.index', compact('ledgers'));
    }

    /**
     * Shows the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = config('enums.ledger_categories');

        return view('ledger.create', compact('categories'));
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
            'code' => [
                'required',
                'numeric',
                Rule::unique('ledgers')->where('company_id', $user->company->id),
            ],
            'description' => 'required|max:255',
            'category' => 'required',
        ]);

        $ledger = new Ledger([
            'code' => $request->get('code'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
        ]);

        $user->company->ledgers()->save($ledger);
        return redirect('/');
    }

    /**
     * Shows the form for editing the specified resource.
     *
     * @param  Ledger  $ledger
     * @return Response
     */
    public function edit(Ledger $ledger)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Ledger $ledger */
        $ledger = $user->company->ledgers()->find($ledger->id);

        if (!$ledger) {
            abort(404);
        }

        $categories = config('enums.ledger_categories');

        return view('ledger.edit', compact('ledger', 'categories'));
    }

    /**
     * Updates the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Ledger  $ledger
     * @return Response
     */
    public function update(Request $request, Ledger $ledger)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Ledger $ledger */
        $ledger = $user->company->ledgers()->find($ledger->id);

        if (!$ledger) {
            abort(404);
        }

        $validation = [];

        if ($ledger->getOriginal('code') != $request->get('code')) {
            $validation['code'] = [
                'required',
                'numeric',
                Rule::unique('ledgers')->where('company_id', $user->company->id),
            ];

            $ledger->code =  $request->get('code');
        }

        if ($ledger->getOriginal('description') != $request->get('description')) {
            $validation['description'] = 'required|max:255';

            $ledger->description = $request->get('description');
        }

        if ($ledger->getOriginal('category') != $request->get('category')) {
            $validation['category'] = 'required';

            $ledger->category = $request->get('category');
        }

        if ($ledger->getOriginal('active') != $request->get('active')) {
            $validation['active'] = 'required';

            $ledger->active = $request->get('active');
        }

        $request->validate($validation);

        $ledger->save();

        return redirect('/');
    }

    /**
     * Removes the specified resource from storage.
     *
     * @param Ledger $ledger
     * @return Response
     * @throws Exception
     */
    public function destroy(Ledger $ledger)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Ledger $ledger */
        $ledger = $user->company->ledgers()->find($ledger->id);

        if (!$ledger) {
            abort(404);
        }

        $ledger->delete();

        return redirect('/');
    }

}
