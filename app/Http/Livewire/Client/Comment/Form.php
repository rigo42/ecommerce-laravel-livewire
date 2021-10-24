<?php

namespace App\Http\Livewire\Client\Comment;

use App\Models\User;
use App\Notifications\Client\Comment\Product;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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
           $this->userId = Auth::user()->id ?? null;
           $this->name = Auth::user()->name;
        }
    }

    public function render()
    {
        $comments = $this->model->comments()->orderBy('id', 'asc')->where('aproved', true)->get();
       
        return view('livewire.client.comment.form', compact('comments'));
    }

    public function store(){
        $data = $this->validate([
            'name' => 'required',
            'body' => 'required',
            'email' => 'required|email',
            'stars' => 'required',
        ]);

        $data['user_id'] = $this->userId;

        $comment = $this->model->comments()->create($data);

        // $this->reset('name', 'body', 'email', 'stars');

        try{
            $users = User::permission(['productos'])->get();

            if($comment->commentable_type == "App\Models\Product"){
                Notification::send($users, new Product($comment));

            }elseif($comment->commentable_type == "App\Models\Blog"){
                // En espera de crear el modulo de blogs
            }

            $this->emit('scrollToReviews');
            session()->flash('alert-type', 'success');
            session()->flash('alert', 'Se ha enviado el comentario, será revisado antes de ser publicado');

        }catch(Exception $e){
            session()->flash('alert-type', 'danger');
            session()->flash('alert', 'El comentario se ha guardado y será revisado, pero ocurrio un error: '.$e->getMessage());
        }
        
    }
}
