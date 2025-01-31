<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{
    private const array ALLOWED_SORT_OPTIONS = [
        'finishing_soon' => ['finishing_date', 'asc'],
        'biggest_prize_pool' => ['prize_pool', 'desc'],
        'biggest_participants' => ['participant_limit', 'desc'],
        'open' => ['status', 'asc'],
        'asc_price' => ['price', 'asc'],
        'desc_price' => ['price', 'desc'],
    ];
    private const string DEFAULT_SORT_COLUMN = 'prize_pool';
    private const string DEFAULT_SORT_DIRECTION = 'desc';

    public function index(Request $request): View
    {

        $sort = $request->query('sort');
        $query = Group::query();
        if ($sort) {
            $this->validateSortOptions($sort);
            $query->orderBy(self::ALLOWED_SORT_OPTIONS[$sort][0], self::ALLOWED_SORT_OPTIONS[$sort][1]);
        }
        else {
            $query->orderBy(self::DEFAULT_SORT_COLUMN, self::DEFAULT_SORT_DIRECTION);
        }
        $groups = $query->paginate(10);

        return view('groups.index', [
            'groups' => $groups,
            'sort' => $sort,
        ]);
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

    public function validateSortOptions(string $sort): void
    {
        if ($sort && !array_key_exists($sort, self::ALLOWED_SORT_OPTIONS)) {
            abort(400, 'Invalid sort parameter');
        }
    }
}
