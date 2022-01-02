<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Jersey;
use App\Models\Type;
use Livewire\WithPagination;

class Jerseys extends Component
{
    use WithPagination;
    public $search;
    //public $jerseys;
    public $jerseyId,$jersey, $type, $harga;
    public $isOpen = 0;
    public function render()
    {
        $types = Type::all();
        $this->jerseys = Jersey::with('type');
        $searchParams = '%'.$this->search.'%';
        //$this->jerseys = Jersey::all();
        return view('livewire.jerseys',[
            'jerseys' => Jersey::where('jersey','like', $searchParams)->latest()
                      ->orWhere('type', 'like', $searchParams)->latest()->paginate(5)
        ], compact('types'));
    }

    public function showModal(){
        $this->isOpen = true;
    }

    public function hideModal(){
        $this->isOpen = false;
    }

    public function store(){


        $types = Type::all();

        $this->validate(
                [
                    'jersey' => 'required',
                    'type' => 'required',
                    'harga' => 'required',
                ]
            );

            Jersey::updateOrCreate(['id' => $this->jerseyId], [
                'jersey' => $this->jersey,
                'type' => $this->type,
                'harga' => $this->harga,
            ]);

            $this->hideModal();

            session()->flash('info', $this->jerseyId ? 'Jersey Update Successfully' : 'Post Created Successfully');

            $this->jerseyId = '';
            $this->jersey = '';
            $this->type = '';
            $this->harga = '';
    }

    public function edit($id){
        $jersey = Jersey::findOrFail($id);
        $this->jerseyId = $id;
        $this->jersey = $jersey->jersey;
        $this->type = $jersey->type;
        $this->harga = $jersey->harga;

        $this->showModal();
    }

    public function delete($id){
        Jersey::find($id)->delete();
        session()->flash('delete','Jersey Deleted Successfully');
    }


}
