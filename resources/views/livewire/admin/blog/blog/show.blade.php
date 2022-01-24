<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card bgi-no-repeat card-stretch gutter-b">
                
                <div class="card-header border-0">
                    <div class="d-flex justify-content-end">
                        <div class="card-toolbar align-items-center ">
                            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Opciones" data-placement="left">
                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover">
                                        <li class="navi-header pb-1">
                                            <span class="text-primary text-uppercase font-weight-bold font-size-sm">Opciones:</span>
                                        </li>
    
                                        <li class="navi-item">
                                            <a href="{{ route('admin.blog.edit', $blog) }}" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="fa fa-pen"></i>
                                                </span>
                                                <span class="navi-text">Editar</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                        </div>
                    </div>
                   
                   <img src="{{ $blog->imagePreview() }}" alt="{{ $blog->name }}" class="img-fluid image-border-shdow">
                </div>
                <div class="card-body pt-2">
                    {!! $blog->body !!}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/admin/media/svg/shapes/abstract-1.svg') }})">
                <div class="card-body">
                    <h3 class="card-title font-weight-bolder text-dark">Información general</h3>
                    <hr>
                    <p class="font-weight-bolder text-dark-75 mb-0 mt-6 d-block">
                        Nombre: <span class="float-right">{{ $blog->name }}</span>
                    </p>
                    <hr>
                    <p class="font-weight-bolder text-dark-75 mb-0 mt-6 d-block">
                        Vistas: <span class="float-right"><label for="" class="label label-primary">{{ $viewCounts }}</label></span>
                    </p>
                    <hr>
                    <p class="font-weight-bolder text-dark-75 mb-0 mt-6 d-block">
                        Fecha: <span class="float-right">{{ $blog->dateToString() }}</span>
                    </p>
                    <hr>
                    <p class="font-weight-bolder text-dark-75 mb-0 mt-6 d-block">
                        Categorías: <br> 
                        @foreach ($blog->blogCategories as $category)
                            <span class="label label-primary label-inline font-weight-lighter mr-2 font-weight-bold mt-3">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </p>
                    <hr>
                    <p class="font-weight-bolder text-dark-75 mb-0 mt-6 d-block">
                        Etiquetas: <br> 
                        @foreach ($blog->blogTags as $category)
                            <span class="label label-primary label-inline font-weight-lighter mr-2 font-weight-bold mt-3">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </p>
                    <hr>
                    <p class="font-weight-bolder text-dark-75 mb-0 mt-6 d-block">
                        Meta título: <span class="float-right">{{ $blog->meta_title }}</span>
                    </p>
                    <hr>
                    <p class="font-weight-bolder text-dark-75 mb-0 mt-6 d-block">
                        Meta descripción: <span class="float-right">{{ $blog->meta_description }}</span>
                    </p>
                    <hr>
                    <p class="font-weight-bolder text-dark-75 mb-0 mt-6 d-block">
                        Meta keywords: <span class="float-right">{{ $blog->meta_keywords }}</span>
                    </p>
                    <hr>
                </div>
            </div>
            <div class="card card-stretch gutter-b">
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">Comentarios</h3>
                    <select wire:model="filterAprovedComment" class="form-control float-right" name="" id="">
                        <option value="">Todos</option>
                        <option value="refused">Sin aprovar</option>
                        <option value="aproved">Aprovado</option>
                    </select>
                </div>
                <div class="card-body pt-2">
                    @forelse ($comments as $comment)  
                        @livewire('admin.blog.blog.comment', ['comment' => $comment], key('comment-'.$comment->id))
                    @empty
                        <p>Ninguno</p>
                    @endforelse
                    {{ $comments->links() }}
                </div>
            </div>
            <div class="card bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/admin/media/svg/shapes/abstract-1.svg') }})">
                <div class="card-body" style="height: 32rem;">
                    <livewire:livewire-line-chart :line-chart-model="$lineChartModel" />
                </div>  
            </div> 
        </div>
    </div>
</div>
