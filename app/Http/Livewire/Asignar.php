<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Asignar extends Component
{
    use WithPagination;
    public $role, $componentName, $permisosSelected = [], $old_permissions = [], $search;
    private $pagination = 10;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function mount()
    {
        $this->role = 'Elegir';
        $this->componentName = 'Asignar Permisos';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if (strlen($this->search) > 0) {
            $permisos = Permission::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        } else {
            $permisos =
                Permission::select('description', 'name', 'id', DB::raw("0 as checked"))
                ->orderBy('id', 'asc')
                ->paginate($this->pagination);
        }
        // $permisos = Permission::select('name', 'id', DB::raw("0 as checked"))
        //     ->orderBy('id', 'asc')
        //     ->paginate($this->pagination);
        if ($this->role != 'Elegir') {
            $list = Permission::join('role_has_permissions as rp', 'rp.permission_id', 'permissions.id')
                ->where('role_id', $this->role)->pluck('permissions.id')->toArray();
            $this->old_permissions = $list;
        }
        if ($this->role != 'Elegir') {
            foreach ($permisos as $permiso) {
                $role = Role::find($this->role);
                $tienePermiso = $role->hasPermissionTo($permiso->name);
                if ($tienePermiso) {
                    $permiso->checked = 1;
                }
            }
        }
        return view('livewire.asignar.asignar', [
            'roles' => Role::orderBy('name', 'asc')->get(),
            'permisos' => $permisos
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }
    public $listeners = [
        'revokeall' => 'RemoveAll'
    ];
    public function RemoveAll()
    {
        if ($this->role == 'Elegir') {
            $this->emit('sync-error', 'Selecciona un Rol válido');
            return;
        }
        $role = Role::find($this->role);
        $role->syncPermissions([0]);
        $this->emit('removeall', "Se revocaron todos los Permisos al Rol $role->name");
        return;
    }
    public function SyncAll()
    {
        if ($this->role == 'Elegir') {
            $this->emit('sync-error', 'Selecciona un Rol válido');
            return;
        }
        $role = Role::find($this->role);
        $permisos = Permission::pluck('id')->toArray();
        $role->syncPermissions($permisos);
        $this->emit('syncall', "Se sincronizaron todos los permisos al Rol $role->name");
    }
    public function syncPermiso($state, $permisoName)
    {
        if ($this->role != 'Elegir') {
            $roleName = Role::find($this->role);
            if ($state) {
                $roleName->givePermissionTo($permisoName);
                $this->emit('permi', "Permiso asignado correctament");
            } else {
                $roleName->revokePermissionTo($permisoName);
                $this->emit('permi', "Permiso revocado");
            }
        } else {
            $this->emit('permi', "Elige un Rol válido");
        }
    }
}
