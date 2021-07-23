<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpgradeUserPlanForm extends Component
{

    /**
     * Upgrade plan to PREMIUM
     **/
    public function upgradeToPro()
    {
        auth()->user()->update(['plan' => 'premium']);
    }

    /**
     * Cancel PREMIUM plan, switch to basic FREE PLAN
     **/
    public function cancelPro()
    {
        auth()->user()->update(['plan' => 'free']);
    }

    /**
     * Render view to upgrade plan
     **/
    public function render()
    {
        return view('livewire.upgrade-user-plan-form', [
            'currentPlan' => auth()->user()->plan
        ]);
    }
}
