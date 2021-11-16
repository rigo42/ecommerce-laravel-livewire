<?php

namespace App\Http\Livewire\Admin\Product\General;

use App\Models\Product;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Statistic extends Component
{
    public $product;

    public function mount(Product $product){
        $this->product = $product;
    }

    public function render()
    {
        $views = $this->product->views()->select(
                                                    DB::raw('DATE_FORMAT(viewed_at, "%m-%Y") AS month2'),
                                                    DB::raw('DATE_FORMAT(viewed_at, "%b-%Y") AS month'), 
                                                    DB::raw('COUNT(id) AS views')
                                                )
                                        ->whereYear('viewed_at', date('Y'))
                                        ->orderBy('month2')
                                        ->groupBy('month', 'month2')
                                        ->get();



        $columnChartModel =  new ColumnChartModel();

        foreach($views as $view){
            $columnChartModel = $columnChartModel->addColumn($view->month, $view->views, '#8b1d24');
        }
        return view('livewire.admin.product.general.statistic', compact('columnChartModel'));
    }
}
