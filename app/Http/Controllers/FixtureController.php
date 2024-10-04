<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fixture;
use Carbon\Carbon;

class FixtureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nextSunday = Carbon::now()->next(Carbon::SUNDAY)->toDateString();

        $fixtures = Fixture::select('home_team_name', 'away_team_name', 'time_slot', 'field_id', 'match_date', 'round')
                ->where('match_date', $nextSunday)
                ->paginate(8);
        // $fixtures = Fixture::paginate(8);

        return view('fixture', [
            'fixtures' => $fixtures,
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
