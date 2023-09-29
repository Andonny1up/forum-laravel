<?php

namespace App\Http\Livewire;

use App\Models\Reply;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class ShowReply extends Component
{
    public Reply $reply;
    public $body = "";
    public $is_creating = false;

    protected $listeners = ['refresh' => '$refresh'];

    public function postChild(){
        //validate
        if(! is_null($this->reply->reply_id)) return;

        $this->validate([
            'body' => 'required',
        ]);
        //create
        auth()->user()->replies()->create([
            'reply_id'=> $this->reply->id,
            'thread_id'=> $this->reply->thread->id,
            'body' => $this->body,
        ]);
        //refresh
        $this->is_creating = false;
        $this->body="";
        $this->emitSelf('refresh');
    }

    public function render()
    {
        return view('livewire.show-reply');
    }
}
