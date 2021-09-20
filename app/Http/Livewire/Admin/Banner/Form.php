<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Form extends Component
{
    use WithFileUploads;

    public $method;
    public $banner;

    //Tools
    public $imageTmp;

    public function mount(Banner $banner, $method){
        $this->banner = $banner;
        $this->method = $method;    
    }

    protected function rules()
    {
        return [
            'banner.title' => 'nullable',
            'banner.subtitle' => 'nullable',
            'banner.link' => 'nullable',
        ];

    }

    public function render()
    {
        return view('livewire.admin.banner.form');
    }

    public function store(){
        $this->validate();
        $this->validateImage();
        $this->banner->save();
        $this->saveImage();
        $this->banner = new banner();
        $this->alert('success', 'Banner agregado con éxito');
        $this->emit('render');
    }

    public function update(){
        $this->validate();
        $this->validateImage();
        $this->banner->update();
        $this->saveImage();
        $this->alert('success', 'Banner actualizado con éxito');
        $this->emit('render');
    }

    public function validateImage(){
        if(!$this->banner->image){
            $this->validate([
                'imageTmp' => 'required|image'
            ]);
        }
    }

    public function saveImage(){
        if($this->imageTmp){

            $url = $this->imageTmp->store('public/banner');
            $imageOptimized = Image::make(Storage::get($url))->encode('webp', 80);
            $newName = $url.'.webp';

            Storage::put($url, (string) $imageOptimized);
            Storage::rename($url, $newName);

            if($this->banner->image){
                if(Storage::exists($this->banner->image->url)){
                    Storage::delete($this->banner->image->url);
                }
                $this->banner->image()->update([
                    'url' => $newName,
                ]);
            }else{
                $this->banner->image()->create([
                    'url' => $newName,
                ]);
            }

        }
    }

    public function removeImage(){
        if($this->banner->image){
            if(Storage::exists($this->banner->image->url)){
                Storage::delete($this->banner->image->url);
            }
            
            $this->banner->image()->delete();
            $this->banner->image = null;
        }
        $this->reset('imageTmp');
        $this->alert('success', 'Imagen eliminada con éxito');
    }
}
