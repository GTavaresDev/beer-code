<?php

namespace App\Livewire\Components;

use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ImageUploader extends Component
{
    use WithFileUploads;

    public array $images = [];
    public ?\Illuminate\Database\Eloquent\Model $model = null;

    public function render()
    {
        return view('livewire.components.image-uploader');
    }

    public function removeImage(int $index)
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }

    public function saveImages()
    {
        if (!$this->model) {
            $this->dispatchBrowserEvent('notify', ['message' => 'Modelo não definido para salvar imagens.']);
            return;
        }

        foreach ($this->images as $file) {
            $path = $file->store('beers/' . $this->model->id, 'public');

            // Aqui você pode salvar o path no banco, exemplo:
            // $this->model->images()->create(['path' => $path]);
        }

        $this->dispatchBrowserEvent('notify', ['message' => 'Imagens salvas com sucesso!']);

        $this->images = [];
    }
}
