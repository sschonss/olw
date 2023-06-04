<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public string $resource;
    public array $columns;
    public string $edit;
    public string $delete;

    public function render()
    {
        return view('livewire.table', [
            'items' => app("App\Models\\" . $this->resource)->paginate(10)
        ]);
    }

    public function delete($id)
    {
        $model = app("App\Models\\" . $this->resource)->find($id);
        $model->delete();
    }
}
