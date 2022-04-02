<?php

namespace App\Http\Livewire;
use App\Models\Massege;
use Livewire\Component;

class Counter extends Component
{
    public $messageText;

    public function render()
    {
        $messages = Massege::with('user')->latest()->take(10)->get()->sortBy('id');
        // $messages=Massege::all();
        return view('livewire.counter', compact('messages'));
    }
    

    public function sendMessage()
    {
        Massege::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->messageText="";
    }
}