<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CreateLink extends Component
{
    use AuthorizesRequests;

    public $original;
    public $isforsingleuse = false;
    public $isExpired = false;
    protected $linkLength = 6;
    protected $linksAllowedForFreePlan = 10;
    protected $linksAllowedForPremiumPlan = 500;

    /**
     * Creating a new shortened link
     **/
    public function submit()
    {
        $this->validate(['original' => 'required|url','isforsingleuse' => 'boolean']);

        $this->authorizeCreatingLink();

        auth()->user()->links()->create([
            'original' => $this->original,
            'shortened' => $this->generateShortLink(),
            'is_for_single_use_only' => $this->isforsingleuse,
            'is_expired' => $this->isExpired
        ]);

        $this->emit('linkCreated');
        $this->original = '';
    }

    /**
     * Vaidating the plan and link if already shortened
     **/
    protected function authorizeCreatingLink()
    {
        $user = auth()->user();
        abort_if($user->plan == 'free' && $user->links()->count() == $this->linksAllowedForFreePlan, 403, 'Please upgrade your plan to continue using our service.');
        abort_if($user->plan == 'premium' && $user->links()->count() == $this->linksAllowedForPremiumPlan, 403, 'Please upgrade your plan to continue using our service.');
        abort_if($user->links()->where('original', $this->original)->count(), 403, 'Short link has already been created.');
    }

    /**
     * Generating the unique code for short url
     **/
    protected function generateShortLink()
    {
        return substr(md5(time()), 0, $this->linkLength);
    }

    /**
     * Render the view for creating link
     **/
    public function render()
    {
        return view('livewire.create-link');
    }
}
