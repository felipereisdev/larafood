<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Plans\CreatePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlansController extends Controller
{
    private Plan $planRepository;

    public function __construct(Plan $plan)
    {
        $this->planRepository = $plan;
    }

    public function index(Request $request)
    {
        if ($request->get('filter')) {
            $plans = $this->planRepository->search($request->get('filter'), 'name');
        } else {
            $plans = $this->planRepository->paginate();
        }

        return view('admin.plans.index', [
            'plans' => $plans,
            'filters' => ['filter' => $request->get('filter')]
        ]);
    }

    public function create()
    {
        return view('admin.plans.form');
    }

    public function store(CreatePlanRequest $request): RedirectResponse
    {
        $this->planRepository->create($request->all());

        return redirect()->route('admin.plans.index');
    }

    public function show(string $url)
    {
        $plan = $this->planRepository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.plans.show', compact('plan'));
    }

    public function edit(string $url)
    {
        $plan = $this->planRepository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.plans.form', compact('plan'));
    }

    public function update(UpdatePlanRequest $request, string $url): RedirectResponse
    {
        $plan = $this->planRepository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('admin.plans.index');
    }

    public function destroy(string $url): RedirectResponse
    {
        $plan = $this->planRepository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->delete();

        return redirect()->route('admin.plans.index');
    }
}
