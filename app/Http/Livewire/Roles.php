<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Roles extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $roleName, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Roles';
    }

    public function render()
    {
        if (strlen($this->search) > 0) {
            $data = Role::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        } else {
            $data = Role::orderBy('id', 'desc')->paginate($this->pagination);
        }
        return view('livewire.roles.roles', ['roles' => $data])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function createRole()
    {
        $rules = [
            'roleName' => 'required|min:2|unique:roles,name'
        ];
        $messages = [
            'roleName.required' => 'El nombre del Rol es requerido',
            'roleName.unique' => 'El Rol ya existe',
            'roleName.min' => 'El nombre del Rol debe tener al menos 2 caracteres'
        ];
        $this->validate($rules, $messages);
        Role::create(['name' => $this->roleName]);
        $this->emit('role-added', 'El Rol se registró con exito');
        $this->resetUI();
    }

    public function Edit($id)
    {
        $role = Role::find($id);
        $this->selected_id = $role->id;
        $this->roleName = $role->name;
        $this->emit('show-modal', 'Show Modal');
    }

    public function updateRole()
    {
        $rules = [
            'roleName' => "required|min:2|unique:roles,name, {$this->selected_id}"
        ];
        $messages = [
            'roleName.required' => 'El nombre del Rol es requerido',
            'roleName.unique' => 'El Rol ya existe',
            'roleName.min' => 'El nombre del Rol debe tener al menos 2 caracteres'
        ];
        $this->validate($rules, $messages);
        $role = Role::find($this->selected_id);
        $role->name = $this->roleName;
        $role->save();
        $this->emit('role-updated', 'EL Rol se actualizó con exito');
        $this->resetUI();
    }

    protected $listeners = [
        'destroy' => 'Destroy'
    ];

    public function Destroy($id)
    {
        $permissionsCount = Role::find($id)->permissions->count();
        if ($permissionsCount > 0) {
            $this->emit('role-error', 'No se puede eliminar el Rol porque tiene Permisos asociados');
            return;
        }
        Role::find($id)->delete();
        $this->emit('role-deleted', 'EL Rol se eliminó con exito');
    }
    // public function asignarRoles(){
    //     if($this->userSelect > 0){
    //         $user = User::find($this->userSelected);
    //         if($user){
    //             $user->syncRoles($rolesList);
    //             $this->emit('msg-ok', 'Roles asignados correctamente');
    //             $this->resetInput();
    //         }
    //     }
    // }

    public function resetUI()
    {
        $this->roleName = '';
        $this->search = '';
        $this->selected_id = 0;
        $this->resetValidation();
    }
}
