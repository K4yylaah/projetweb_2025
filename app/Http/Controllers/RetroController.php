<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class RetroController extends Controller
{
    /**
     * Display the page
     *
     * @return Factory|View|Application|object
     */
    public function index() {
        return view('pages.retros.index');
    }

    public function show($id) {
        return view('pages.retros.show', [
            'retro' => $id
        ]);
    }
    public function create() {
        return view('pages.retros.create');
    }
    public function store(Request $request) {
        // Logic to store retro data
        return redirect()->route('retro.index')->with('success', 'Retro created successfully.');
    }
    public function destroy($id) {
        // Logic to delete retro
        return redirect()->route('retro.index')->with('success', 'Retro deleted successfully.');
    }
}