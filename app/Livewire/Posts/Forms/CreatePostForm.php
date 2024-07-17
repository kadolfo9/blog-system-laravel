<?php

namespace App\Livewire\Posts\Forms;

use App\Models\Post;
use Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreatePostForm extends Form
{
    #[Validate]
    public $title = '';

    #[Validate]
    public $content = '';

    public function rules()
    {
        return [
            'title' => 'required|min:2|unique:posts',
            'content' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Você precisa inserir um :attribute.',
            'title.min' => 'O :attribute precisa ter 2 digitos.',
            'content.required' => 'Você precisa inserir um :attribute.',
        ];
    }

    public function validationAttributes()
    {
        return [
            'title' => 'título',
            'content' => 'conteúdo',
        ];
    }

    public function store()
    {
        $validated = $this->validate();

        Post::create([
            'author' => Auth::user()->getQueueableId(),
            ...$validated
        ]);

        dd(Auth::user()->toArray(), Auth::user()->getQueueableId(), Post::query()->first());
    }
}
