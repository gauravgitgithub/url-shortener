<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;

class Analytics extends Component
{
    protected $listeners = ['linkCreated' => '$refresh'];

    /**
     * Delete an already created link
     * 
     **/
    public function deleteLink($id)
    {
        Link::find($id)->delete();
    }

    /**
     * Render analytics view
     **/
    public function render()
    {
        return view('livewire.analytics', [
            'links' => auth()->user()->links()->latest()->get()
        ]);
    }
}