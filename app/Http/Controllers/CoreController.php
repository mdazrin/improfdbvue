<?php

namespace App\Http\Controllers;

use App\Models\Core;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;


class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {

        request()->validate([

            'direction' => ['in:asc,desc'],
            'field' => ['in:id,first_name,last_name,ppi,batch']
        ]);

        $query = Core::query();

        if (request('search')) {

            $query->where('first_name', 'LIKE', '%'.request('search').'%');

        }

        if (request()->has(['field', 'direction'])) {

            $query->orderBy(request('field'), request('direction'));
        }

        return Inertia::render('Core', [

            'cores' => $query->paginate()->withQueryString(),
            'filters' => request()->all(['search', 'field', 'direction'])
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Core $core)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Core $core)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Core $core)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Core $core)
    {
        //
    }
}
