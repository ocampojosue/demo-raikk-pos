<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name, $phone, $email, $status, $image, $password, $selected_id, $fileLoaded, $profile;
    public $pageTitle, $componentName, $search;
    private $pagination = 3;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Usuarios';
        $this->status = 'Elegir';
    }

    public function render()
    {
        if (strlen($this->search) > 0) {
            $data = User::where('name', 'like', '%' . $this->search . '%')
                ->select('*')->orderBy('name', 'asc')
                ->paginate($this->pagination);
        } else {
            $data = User::select('*')->orderBy('id', 'desc')->paginate($this->pagination);
        }
        return view('livewire.users.users', ['users' => $data, 'roles' => Role::orderBy('name', 'asc')->get()])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->phone = '';
        $this->email = '';
        $this->image = '';
        $this->password = '';
        $this->search = '';
        $this->status = 'Elegir';
        $this->profile = 'Elegir';
        $this->selected_id = 0;
        $this->resetValidation();
        $this->resetPage();
    }

    public function edit(User $user)
    {
        $this->selected_id = $user->id;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->profile = $user->profile;
        $this->status = $user->status;
        $this->email = $user->email;
        $this->password = '';
        $this->emit('modal-show', 'open!');
    }
    protected $listeners = [
        'deleteRow' => 'destroy',
        'reset' => 'resetUI'
    ];

    public function Store()
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
            'password' => 'required|min:3'
        ];
        $messages = [
            'name.required' => 'Nombre de Usuario requerido',
            'name.min' => 'El nombre del Usuario debe tener al menos 3 caracteres',
            'email.required' => 'El Correo es requerido',
            'email.email' => 'Ingrese un Correo válido',
            'email.unique' => 'El correo ya existe en el Sistema',
            'status.required' => 'El Estado es requerido',
            'status.not_in' => 'Elige el Estado del Usuario',
            'profile.required' => 'El Perfil/Rol es requerido',
            'profile.not_in' => 'Elige el Perfil/Rol del Usuario',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 3 caracteres',
        ];
        //dd($this->profile);
        $this->validate($rules, $messages);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);
        $user->syncRoles([$this->profile]);
        // dd($user->all());
        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/users', $customFileName);
            $user->image = $customFileName;
            $user->save();
        }
        $this->resetUI();
        $this->emit('user-added', 'Usuario Registrado');
    }

    public function Update()
    {
        $rules = [
            'email' => "required|email|unique:users,email,{$this->selected_id}",
            'name' => 'required|min:3',
            'status' => 'required|not_in:Elegir',
            'profile' => 'required|not_in:Elegir',
            'password' => 'min:3' //required|
        ];
        $messages = [
            'name.required' => 'Nombre de Usuario requerido',
            'name.min' => 'El nombre del Usuario debe tener al menos 3 caracteres',
            'email.required' => 'El Correo es requerido',
            'email.email' => 'Ingrese un Correo válido',
            'email.unique' => 'El correo ya existe en el Sistema',
            'status.required' => 'El Estado es requerido',
            'status.not_in' => 'Elige el Estado del Usuario',
            'profile.required' => 'El Perfil/Rol es requerido',
            'profile.not_in' => 'Elige el Perfil/Rol del Usuario',
            // 'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 3 caracteres',
        ];
        $this->validate($rules, $messages);
        $user = User::find($this->selected_id);
        $user->Update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'profile' => $this->profile,
            'password' => bcrypt($this->password)
        ]);
        $user->syncRoles([$this->profile]);
        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/users', $customFileName);
            $imageTemp = $user->image;
            $user->image = $customFileName;
            $user->save();
            if ($imageTemp != null) {
                if (file_exists('storage/users/' . $imageTemp)) {
                    unlink('storage/users/' . $imageTemp);
                }
            }
        }
        $this->resetUI();
        $this->emit('user-updated', 'Usuario Actualizado');
    }

    public function destroy(User $user)
    {
        if ($user) {
            $sales = Sale::where('user_id', $user->id)->count();
            if ($sales > 0) {
                $this->emit('user-withsales', 'No es posible eliminar Usuario porque tiene ventas registradas');
            } else {
                $user->delete();
                $this->resetUI();
                $this->emit('user-deleted', 'Usuario Eliminado');
            }
        }
    }
}
