<?php

namespace App\Http\Livewire\Admin\Blog\Blog;

use App\Models\Blog;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    
    public $blog;
    public $filterAprovedComment;

    //Theme
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['render'];
    
    public function mount(Blog $blog){
        $this->blog = $blog;
        $this->blog->load('image', 'comments', 'blogTags', 'blogCategories');
    }

    public function render()
    {
        $viewCounts = views($this->blog)->count();
        $lineChartModel = $this->graphViews();
        $comments = $this->blog->comments()->orderBy('id', 'desc');

        if($this->filterAprovedComment === 'aproved'){
            $comments = $comments->where('aproved', true);
        }
        if($this->filterAprovedComment === 'refused'){
            $comments = $comments->where('aproved', false);
        }
        
        $comments = $comments->paginate(4);
        return view('livewire.admin.blog.blog.show', compact('viewCounts', 'lineChartModel', 'comments'));
    }

    public function graphViews(){
        $views = $this->blog->views()->select(
                                            DB::raw('DATE_FORMAT(viewed_at, "%m-%Y") AS month2'),
                                            DB::raw('DATE_FORMAT(viewed_at, "%b-%Y") AS month'), 
                                            DB::raw('COUNT(id) AS views')
                                        )
                                        ->whereYear('viewed_at', date('Y'))
                                        ->orderBy('month2')
                                        ->groupBy('month', 'month2')
                                        ->get();

        $lineChartModel =  new LineChartModel();
        $lineChartModel = $lineChartModel->setTitle('Vistas');

        foreach($views as $view){
            $lineChartModel = $lineChartModel->addPoint($view->month, $view->views);
        }

        return $lineChartModel;
    }
}
