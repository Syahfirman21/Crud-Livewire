<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{
    public $posts, $name, $email, $phon_number, $post_id;
    public $updateMode = false;
    public function render()
    {
        $this->posts = Post::all(); // Ganti dengan model yang sesuai, misalnya Contact::all()
        return view('livewire.posts');
    }
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->phon_number = '';
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phon_number' => 'required',
        ]);
  
        Post::create($validatedData);
  
        session()->flash('message', 'Post Created Successfully.');
  
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->name = $post->name;
        $this->email= $post->email;
  
        $this->phon_number= $post->phon_number;
  
        $this->updateMode = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phon_number' => 'required',
        ]);
  
        $post = Post::find($this->post_id);
        $post->update([
            'name' => $this->name,
            'email' => $this->email,
            'phon_number' => $this->phon_number,
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
