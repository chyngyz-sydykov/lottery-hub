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
        $groups = Group::paginate(10);
        return view('groups.index', ['groups' => $groups]);
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
}
