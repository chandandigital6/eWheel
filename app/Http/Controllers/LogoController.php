<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logos = Logo::all();
        return view('logo.list', compact('logos')); // Using list.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('logo.add'); // Using add.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'header_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $headerLogoPath = $request->file('header_logo')?->store('logos', 'public');
        $footerLogoPath = $request->file('footer_logo')?->store('logos', 'public');

        Logo::create([
            'header_logo' => $headerLogoPath,
            'footer_logo' => $footerLogoPath,
        ]);

        return redirect()->route('logo.index')->with('success', 'Logo added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $logo = Logo::findOrFail($id);
        return view('logo.add', compact('logo')); // Reusing add.blade.php for edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $logo = Logo::findOrFail($id);

        $request->validate([
            'header_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('header_logo')) {
            Storage::disk('public')->delete($logo->header_logo);
            $logo->header_logo = $request->file('header_logo')->store('logo', 'public');
        }

        if ($request->hasFile('footer_logo')) {
            Storage::disk('public')->delete($logo->footer_logo);
            $logo->footer_logo = $request->file('footer_logo')->store('logo', 'public');
        }

        $logo->save();

        return redirect()->route('logo.index')->with('success', 'Logos updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);

        Storage::disk('public')->delete($logo->header_logo);
        Storage::disk('public')->delete($logo->footer_logo);

        $logo->delete();

        return redirect()->route('logo.index')->with('success', 'Logos deleted successfully.');
    }
}
