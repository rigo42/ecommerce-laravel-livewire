<?php

namespace App\Http\Livewire\Client\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    //Tools
    public $perPage = 12;
    public $search;
    protected $queryString = ['search' => ['except' => '']];

    //Filters
    public $categoryFilter = [];
    public $brandFilter = [];
    public $genderFilter = [];
    public $orderByFilter;
    public $minPriceFilter = 0;
    public $maxPriceFilter;
    public $stepPriceFilter;

    //Theme
    protected $paginationTheme = 'bootstrap';

    //Listeners
    protected $listeners = ['render'];

    public function mount(Request $request){
        $this->maxPriceFilter = Product::max('price');
        $this->stepPriceFilter = $this->maxPriceFilter / 10;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::with('gender', 'brand', 'categories', 'image', 'imageMultiples', 'colors')->where('stock', true);
        $categories = Category::with('products')->orderBy('id', 'desc')->cursor();
        $brands = Brand::with('products')->orderBy('id', 'desc')->cursor();
        $genders = Gender::with('products')->orderBy('id', 'desc')->cursor();

        if($this->search){
            $products = $products->where('name', 'LIKE', "%{$this->search}%");
        }

        if(count($this->categoryFilter)){
            $products = $products->whereHas('categories', function($query){
                $query->whereIn('category_id', $this->categoryFilter);
            });
        }

        if(count($this->brandFilter)){
            $products = $products->whereHas('brand', function($query){
                $query->whereIn('id', $this->brandFilter);
            });
        }

        if(count($this->genderFilter)){
            $products = $products->whereHas('gender', function($query){
                $query->whereIn('id', $this->genderFilter);
            });
        }

        if($this->orderByFilter){
            if($this->orderByFilter == 'promotion'){
                $products = $products->where('promotion', true)->whereDate('end_promotion', '<', date('Y-m-d'));
           
            }else if($this->orderByFilter == 'priceHigher'){
                $products = $products->orderBy('price');
            }else{
                $products = $products->orderBy('price', 'desc');
            }
        }else{
            $products = $products->inRandomOrder();
        }

        if($this->minPriceFilter >= 0 && $this->maxPriceFilter){
            $this->minPriceFilter = (int) $this->minPriceFilter;
            $this->maxPriceFilter = (int) $this->maxPriceFilter;

            $products = $products->whereBetween('price', [$this->minPriceFilter, $this->maxPriceFilter]);
        }

        $products = $products->paginate($this->perPage);

        return view('livewire.client.product.index', compact('products', 'categories', 'brands', 'genders'));
    }

    public function cleanFilter(){
        $this->reset(['categoryFilter', 'orderByFilter', 'search', 'genderFilter', 'brandFilter']);
    }
}
