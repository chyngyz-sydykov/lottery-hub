<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{
    public function index(): View
    {
        return view('groups.index');
    }
    public function show(Group $group): View
    {
        return view('groups.show',
            ['group' => $group]
        );
    }
    public function create(): View
    {
        return view('groups.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            //'name' => 'required|string|max:255|unique:groups',
            'participant_limit' => 'required|integer|min:1|max:1000',
            'prize_pool' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:public,private,semi',
            'finishing_date' => 'required|date_format:d/m/Y|after:today',
        ]);

        // Save the group in the database
        // Group::create($validated);

        return redirect()->route('groups.index')->with('success', __('Group created successfully.'));
    }
}
