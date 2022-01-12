<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name,$barcode,$cost,$price,$stock,$alerts,$categoryid,$search,$image,$selected_id,$pageTitle, $componentName;
    private $pagination = 5;
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $this->pageTitle = 'LISTADO';
        $this->componentName = 'PRODUCTOS';
        $this->categoryid = 'Elegir';
    }

    public function render()
    {
        if (strlen($this->search) > 0) {
            $data = Product::join('categories as c', 'c.id','products.category_id')
                    ->select('products.*','c.name as category')
                    ->where('products.name','like','%'.$this->search.'%')
                    ->orWhere('products.barcode','like','%'.$this->search.'%')
                    ->orWhere('c.name','like','%'.$this->search.'%')
                    ->orderBy('products.name','asc')
                    ->paginate($this->pagination);
        }else {
            $data = Product::join('categories as c', 'c.id','products.category_id')
                    ->select('products.*','c.name as category')
                    ->orderBy('products.id','desc')//CAMBIAR ORDENACION DEL LISTADO SEGUN ID O NOMBRE
                    ->paginate($this->pagination);
        }
        return view('livewire.product.products', [
            'products' => $data,
            'categories' => Category::orderBy('name', 'asc')->get()
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }
    public function Store(){
        $rules = [
            'name' => 'required|unique:products|min:3',
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'alerts' => 'required',
            'categoryid' => 'required|not_in:Elegir'
        ];
        $messages = [
            'name.required' => 'Nombre de producto requerido',
            'name.unique' => 'Nombre de producto existente',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'price.required' => 'El Precio es requerido',
            'cost.required' => 'El Costo es requerido',
            'stock.required' => 'El Stock es requerido',
            'alerts.required' => 'Ingresa el valor mínimo de existencias',
            'categoryid.not_in' => 'Elige un nombre de Categoría',
        ];
        $this->validate($rules, $messages);
        $product = Product::create([
            'name' => $this->name,
            'cost' => $this->cost,
            'price' => $this->price,
            'barcode' => $this->barcode,
            'stock' => $this->stock,
            'alerts' => $this->alerts,
            'category_id' => $this->categoryid
        ]);
        if ($this->image) {
            $customFileName = uniqid().'_.'.$this->image->extension();
            $this->image ->storeAs('public/products', $customFileName);
            $product->image = $customFileName;
            $product->save();
        }
        $this->resetUI();
        $this->emit('product-added', 'Producto Registrado');
    }
    public function Edit(Product $product){
        $this->selected_id = $product->id;
        $this->name = $product->name;
        $this->barcode = $product->barcode;
        $this->cost = $product->cost;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->alerts = $product->alerts;
        $this->categoryid = $product->category_id;
        $this->image = null;
        $this->emit('modal-show', 'Show Modal');
    }

    public function Update(){
        $rules = [
            'name' => "required|min:3|unique:products,name,{$this->selected_id}",
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'alerts' => 'required',
            'categoryid' => 'required|not_in:Elegir'
        ];
        $messages = [
            'name.required' => 'Nombre de producto requerido',
            'name.unique' => 'Nombre de producto existente',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'price.required' => 'El Precio es requerido',
            'cost.required' => 'El Costo es requerido',
            'stock.required' => 'El Stock es requerido',
            'alerts.required' => 'Ingresa el valor mínimo de existencias',
            'categoryid.not_in' => 'Elige un nombre de Categoría',
        ];
        $this->validate($rules, $messages);

        $product = Product::find($this->selected_id);
        $product->update([
            'name' => $this->name,
            'cost' => $this->cost,
            'price' => $this->price,
            'barcode' => $this->barcode,
            'stock' => $this->stock,
            'alerts' => $this->alerts,
            'category_id' => $this->categoryid
        ]);
        if ($this->image) {
            $customFileName = uniqid().'_.'.$this->image->extension();
            $this->image ->storeAs('public/products', $customFileName);
            $imageTemp = $product->image; //IMAGEN TEMPPORAL
            $product->image = $customFileName;
            $product->save();

            if ($imageTemp != null) {
                if (file_exists('storage/products/'. $imageTemp)) {
                    unlink('storage/products/'. $imageTemp);
                }
            }
        }
        $this->resetUI();
        $this->emit('product-updated', 'Producto Actualizado');
    }

    public function resetUI(){
        $this->name = '';
        $this->cost = '';
        $this->price = '';
        $this->barcode = '';
        $this->stock = '';
        $this->alerts = '';
        $this->search = '';
        $this->categoryid = 'Elegir';
        $this->image = null;
        $this->selected_id = 0;
        
    }
    protected $listeners = [
        'deleteRow' => 'Destroy'
    ];
    public function Destroy(Product $product){
        //$product = Product::find($id);
        //dd($product);
        $imageTemp = $product->image; //Imagen temporal
        $product->delete();
        if ($imageTemp != null) {
            if (file_exists('storage/products/'. $imageTemp)) {
                unlink('storage/products/'. $imageTemp);
            }
        }
        $this->resetUI();
        $this->emit('product-deleted', 'Producto Eliminado');
    }
}
