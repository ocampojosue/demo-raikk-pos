<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permisos extends Component
{
    use WithPagination;

    public $permissionName, $description, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 10;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Permisos';
    }

    public function render()
    {
        if (strlen($this->search) > 0) {
            $data = Permission::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        } else {
            $data = Permission::orderBy('id', 'desc')->paginate($this->pagination);
        }
        return view('livewire.permisos.permisos', ['permissions' => $data])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function createPermission()
    {
        $rules = [
            'permissionName' => 'required|min:2|unique:permissions,name',
            'description' => 'required|min:2|unique:permissions,description'
        ];
        $messages = [
            'permissionName.required' => 'El nombre del Permiso es requerido',
            'permissionName.unique' => 'El Permiso ya existe',
            'permissionName.min' => 'El nombre del Permiso debe tener al menos 2 caracteres',

            'description.required' => 'La descripcion del Permiso es requerido',
            'description.unique' => 'La descripcion ya existe',
            'description.min' => 'El nombre del Permiso debe tener al menos 2 caracteres'
        ];
        $this->validate($rules, $messages);
        Permission::create(['name' => $this->permissionName, 'description' => $this->description]);
        $this->emit('permission-added', 'El Permiso se registró con exito');
        $this->resetUI();
    }

    public function Edit($id)
    {
        $permission = Permission::find($id);
        $this->selected_id = $permission->id;
        $this->permissionName = $permission->name;
        $this->emit('show-modal', 'Show Modal');
    }

    public function updatePermission()
    {
        $rules = [
            'permissionName' => "required|min:2|unique:permissions,name, {$this->selected_id}"
        ];
        $messages = [
            'permissionName.required' => 'El nombre del Permiso es requerido',
            'permissionName.unique' => 'El Permiso ya existe',
            'permissionName.min' => 'El nombre del Permiso debe tener al menos 2 caracteres'
        ];
        $this->validate($rules, $messages);
        $permission = Permission::find($this->selected_id);
        $permission->name = $this->permissionName;
        $permission->description = $this->description;
        $permission->save();
        $this->emit('permission-updated', 'EL Permiso se actualizó con exito');
        $this->resetUI();
    }

    protected $listeners = [
        'destroy' => 'Destroy'
    ];

    public function Destroy($id)
    {
        $rolesCount = Permission::find($id)->getRoleNames()->count();
        if ($rolesCount > 0) {
            $this->emit('permission-error', 'No se puede eliminar el Permiso porque tiene Roles asociados');
            return;
        }
        Permission::find($id)->delete();
        $this->emit('permission-deleted', 'El Permiso se eliminó con exito');
    }

    public function resetUI()
    {
        $this->permissionName = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->resetValidation();
    }
}
