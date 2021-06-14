<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlansController extends Controller
{
    private Model $planRepository;

    public function __construct(Plan $plan)
    {
        $this->planRepository = $plan;
    }

    public function index()
    {
        return view('admin.plans.index', [
            'plans' => $this->planRepository->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        $data['url'] = Str::kebab($data['name']);

        $this->planRepository->create($data);

        return redirect()->route('admin.plans.index');
    }

    public function show(string $url)
    {
        $plan = $this->planRepository->where('url', $url)->firstOrFail();

        return view('admin.plans.show', compact('plan'));
    }

    public function destroy(string $url): RedirectResponse
    {
        $plan = $this->planRepository->where('url', $url)->firstOrFail();

        $plan->delete();

        return redirect()->route('admin.plans.index');
    }
}
