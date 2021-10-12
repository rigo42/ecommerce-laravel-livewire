<?php

namespace App\Http\Livewire\Client\Comment;

use App\Mail\Client\Comment;
use App\Mail\newComment;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Form extends Component
{
    public $model;
    public $userId;
    public $name;
    public $body;
    public $email;
    public $stars;

    public function mount($model){
        $this->model = $model;

        if(Auth::user()){
           $this->userId = Auth::user()->id;
           $this->name = Auth::user()->name;
        }
    }

    public function render()
    {
        $comments = $this->model->comments()->where('aproved', true)->cursor();
        return view('livewire.client.comment.form', compact('comments'));
    }

    public function create(){
        $data = $this->validate([
            'name' => 'required',
            'body' => 'required',
            'email' => 'required|email',
            'stars' => 'required',
        ]);

        $data['user_id'] = $this->userId;

        $comment = $this->model->comments()->create($data);

        $this->reset('name', 'body', 'email', 'stars');

        try{
            Mail::to(config('contact.email'))->send(new Comment($this->model, $comment));

            session()->flash('alert-type', 'success');
            session()->flash('alert', 'Se ha enviado el comentario, será revisado antes de ser publicado');

        }catch(Exception $e){
            session()->flash('alert-type', 'danger');
            session()->flash('alert', 'El comentario se ha guardado y será revisado, pero ocurrio un error: '.$e->getMessage());
        }
        
    }
}
