<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    /**
     * Display all available cohorts
     * @return Factory|View|Application|object
     */
    public function index() {
        return view('pages.cohorts.index');
    }

    public function show(Cohort $cohort) {

        return view('pages.cohorts.show', [
            'cohort' => $cohort
        ]);
    }
    public function create() {
        return view('pages.cohorts.create');
    }
    public function store(Request $request) {
        $cohort = new Cohort();
        $cohort->school_id = $request->input('school_id');
        $cohort->name = $request->input('name');
        $cohort->description = $request->input('description');
        $cohort->start_date = $request->input('start_date');
        $cohort->end_date = $request->input('end_date');    
        
        $cohort->save();
        

        return redirect()->route('cohort.index')->with('success', 'Cohort created successfully.');
    }

    public function destroy(Cohort $cohort) {
        $cohort->delete();
        return redirect()->route('cohort.index')->with('success', 'Cohort deleted successfully.');
    }

    public function edit(Cohort $cohort) {
        return view('pages.cohorts.edit', [
            'cohort' => $cohort
        ]);
    }

    public function update(Request $request, Cohort $cohort) {
        $cohort->name = $request->input('name');
        $cohort->description = $request->input('description');
        $cohort->start_date = $request->input('start_date');
        $cohort->end_date = $request->input('end_date');
        
        $cohort->save();

        return redirect()->route('cohort.index')->with('success', 'Cohort updated successfully.');
    }
    public function getCohorts() {
        $cohorts = Cohort::all();
        return response()->json($cohorts);
    }
    public function getCohort($id) {
        $cohort = Cohort::find($id);
        return response()->json($cohort);
    }
}