<?php

namespace App\Http\Livewire\Admin\Blog\Blog;

use App\Models\Blog;
use App\Models\Comment;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use CyrildeWit\EloquentViewable\View;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    //Tools
    public $perPage = 50;
    public $search;
    protected $queryString = ['search' => ['except' => '']];

    //Theme
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $blogs = Blog::with(['user.image', 'comments', 'image', 'blogCategories'])->orderBy('id', 'desc');
        $lastComments = Comment::where('commentable_type', 'App\Models\Blog')->where('aproved', false)->orderBy('id', 'desc')->paginate(4);
        $blogViewsCount = views(Blog::class)->count();

        $columnChartModel = $this->grafictBlogsViews();

        if($this->search){
            $blogs = $blogs->where('name', 'LIKE', "%{$this->search}%");
        }

        $blogs = $blogs->paginate($this->perPage);
        return view('livewire.admin.blog.blog.index', compact('blogs', 'blogViewsCount', 'lastComments', 'columnChartModel'));
    }

    public function grafictBlogsViews(){
       
        $blogViews = View::select(
                                DB::raw('DATE_FORMAT(viewed_at, "%m-%Y") AS month2'),
                                DB::raw('DATE_FORMAT(viewed_at, "%b-%Y") AS month'), 
                                DB::raw('COUNT(id) AS views')
                            )
                            ->where('viewable_type', 'App\Models\Blog')
                            ->whereYear('viewed_at', date('Y'))
                            ->orderBy('month2')
                            ->groupBy('month', 'month2')
                            ->get();

        $columnChartModel =  new ColumnChartModel();
        $columnChartModel = $columnChartModel->setTitle('Visitas');

        foreach($blogViews as $blogView){
            $columnChartModel = $columnChartModel->addColumn($blogView->month, $blogView->views, '#8b1d24');
        }

        return $columnChartModel;
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        try{
            if($blog->image && Storage::exists($blog->image->url)){
                Storage::delete($blog->image->url);
            }
            $blog->delete();
            $this->alert('success', 'Eliminación con éxito');
        }catch(Exception $e){
            $this->alert('error', 
                'Ocurrio un error en la eliminación: '.$e->getMessage(), 
                [
                    'showConfirmButton' => true,
                    'confirmButtonText' => 'Entiendo',
                    'timer' => null,
                ]);
        }
    }
}
