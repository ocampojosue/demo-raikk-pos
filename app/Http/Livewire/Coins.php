<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Coins extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $type, $value, $search, $image, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;
    public function mount(){
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'DENOMINACIONES';
        $this->type = 'Elegir';
    }
    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    } 
    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render(){
        if(strlen($this->search) > 0) {
            $data = Denomination::where('type','like','%'.$this->search.'%')->paginate($this->pagination);
        }else {
            $data = Denomination::orderBy('id','desc')->paginate($this->pagination);
        }
        return view('livewire.denomination.denominations', ['coins' => $data])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Edit($id){
        $record = Denomination::find($id, ['id' ,'type', 'value', 'image']);
        $this->type = $record->type;
        $this->value = $record->value;
        $this->selected_id = $record->id;
        $this->image = null;

        $this->emit('modal-show', 'Show Modal!!');
    }

    public function Store(){
        $rules = [
            'type' => 'required|not_in:Elegir',
            'value' => 'required|unique:denominations'
        ];
        $messages = [
            'type.required' => 'El Tipo es requerido',
            'name.not_in' => 'Elige un valor distinto a Elegir',
            'value.required' => 'El Valor es requerido',
            'value.unique' => 'Ya existe el Valor'
        ];
        $this->validate($rules, $messages);
        $denomination = Denomination::create([
            'type' => $this->type,
            'value' => $this->value
        ]);

        if ($this->image) {
            $customFileName = uniqid().'_.'.$this->image->extension();
            $this->image->storeAs('public/denominations',$customFileName);
            $denomination->image = $customFileName;
            $denomination->save();
        }
        $this->resetUI();
        $this->emit('item-added', 'Denominación Registrada');
    }

    public function Update(){
        $rules = [
            'type' => 'required|not_in:Elegir',
            'value' => "required|unique:denominations,value,{{$this->selected_id}}"
        ];
        $messages = [
            'type.required' => 'El Tipo es requerido',
            'name.not_in' => 'Elige un valor distinto a Elegir',
            'value.required' => 'El Valor es requerido',
            'value.unique' => 'El Valor ya existe'
        ];
        $this->validate($rules, $messages);
        $denomination = Denomination::find($this->selected_id);
        $denomination->update([
            'type' => $this->type,
            'value' => $this->value
        ]);

        if ($this->image) {
            $customFileName = uniqid().'_.'.$this->image->extension();
            $this->image->storeAs('public/denominations', $customFileName);
            $imageName = $denomination->image;
            $denomination->image = $customFileName;
            $denomination->save();
            if ($imageName != null) {
                if (file_exists('storage/denominations/' . $imageName)) {
                    unlink('storage/denominations/' . $imageName);
                }
            }
        }
        $this->resetUI();
        $this->emit('item-updated', 'Denominaciones Actualizada');
    }

    public function resetUI(){
        $this->type = 'Elegir';
        $this->value = '';
        $this->image = null;
        $this->search = '';
        $this->selected_id = 0;
    }
    protected $listeners = [
        'deleteRow' => 'Destroy'
    ];
    public function Destroy(Denomination $denomination){
        //$category = Category::find($id);
        //dd($category);
        $imageName = $denomination->image; //Imagen temporal
        $denomination->delete();
        if ($imageName != null) {
            if (file_exists('storage/denominations/'. $imageName)) {
                unlink('storage/denominations/'. $imageName);
            }
        }
        $this->resetUI();
        $this->emit('item-deleted', 'Denominación Eliminada');
    }
}
