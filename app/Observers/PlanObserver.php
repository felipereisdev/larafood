<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    public function saving(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }
}
