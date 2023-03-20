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

        $field = request('field') ?? 'first_name';
        $direction = request('direction') ?? 'asc';

        $cores = Core::query()
            ->orderBy($field,$direction)
            ->when(request('search'),function($query,$search){
                $query->where('first_name', 'like', '%' . $search . '%');
            })
            ->paginate(10)
            ->through(fn($core) => [
                'id' => $core->id,
                'first_name' => $core->first_name,
                'last_name' => $core->last_name,
                'ppi' => $core->ppi,
                'batch' => $core->batch,
            ])->withQueryString();



        return Inertia::render('Core',[
            'cores'=>$cores,
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
