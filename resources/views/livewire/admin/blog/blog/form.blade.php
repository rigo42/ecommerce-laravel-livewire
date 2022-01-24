<div class="container-fluid">

    <form wire:submit.prevent="{{ $method }}">

        @include('components.error-list')

        <div class="row">
            <div class="col-lg-3">

                <div class="card mb-10">
                    <div class="card-body">
                        <h3 class="text-dark font-weight-bold mb-10">Imagen principal</h3>
                        <div class="image-input image-input-outline image-border-shdow image-cover" >
                            <img 
                                class="img-fluid"
                                @if ($imageTmp)
                                    src="{{ $imageTmp->temporaryUrl() }}"
                                @else
                                    src="{{ $blog->imagePreview() }}"
                                @endif>
                            <div
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow image-edit" >
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input wire:model.defer="imageTmp" type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" class="d-none"/>
                                </label>
        
                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            @if ($imageTmp || $blog->image)
                                <span 
                                    wire:click="removeImage()"
                                    wire:loading.class="spinner spinner-primary spinner-sm" wire:target="removeImage"
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow image-remove" 
                                    title="Remover imagen">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            @endif
                        </div>
                        @error('imageTmp') <div> <span class="text-danger">{{ $message }}</span> </div> @enderror
                    </div>
                </div>

                <div class="card my-5">
                    <div class="card-body">
                        <h3 class="text-dark font-weight-bold mb-10">Status {{ $blog->status }}</h3>
                        <div class="form-group" wire:ignore.self wire:key="status-group" >
                            <div wire:ignore>
                                <select wire:model.defer="blog.status" wire:key="blog-status" class="form-control status">
                                    <option value="">Elige un status</option>
                                    <option value="Publicado">Publicado</option>
                                    <option value="Borrador">Borrador</option>
                                </select>
                            </div>
                        </div>
                        @error('blog.status') <div> <span class="text-danger">{{ $message }}</span> </div> @enderror
                    </div>
                </div>

                <div class="card my-5">
                    <div class="card-body">
                        <h3 class="text-dark font-weight-bold mb-10">Categorías</h3>
                        <div class="form-group">
                            <!--begin::Checkbox list-->
                            <div class="checkbox-list pt-4">
                                @foreach ($categories as $category)
                                    <label class="checkbox checkbox-lg mb-7">
                                        <input wire:model.defer="categoryArray" type="checkbox" value="{{ $category->id }}"/>
                                        <span></span>
                                        <div class="font-size-lg text-dark-75 font-weight-bold">{{ $category->name }}</div>
                                        <div class="ml-auto text-muted font-weight-bold">{{ $category->blogs->count() }}</div>
                                    </label>
                                @endforeach
                                <a data-toggle="modal" data-target=".createCategory" class="btn btn-light-primary btn-sm mb-10">
                                    <i class="fa fa-plus"></i> Nueva categoría
                                 </a>
                            </div>
                            <!--end::Checkbox list-->
                            @error('categoryArray') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                        </div>
                    </div>
                </div>

                <div class="card my-5">
                    <div class="card-body">
                        <h3 class="text-dark font-weight-bold mb-10">Etiquetas</h3>
                        <div class="form-group">
                            <!--begin::Checkbox list-->
                            <div class="checkbox-list pt-4">
                                @forelse ($tags as $tag)
                                    <label class="checkbox checkbox-lg mb-7">
                                        <input wire:model.defer="tagArray" type="checkbox" value="{{ $tag->id }}"/>
                                        <span></span>
                                        <div class="font-size-lg text-dark-75 font-weight-bold">{{ $tag->name }}</div>
                                        <div class="ml-auto text-muted font-weight-bold">{{ $tag->blogs->count() }}</div>
                                    </label>
                                @empty
                                    <label class="text-secondary" for="">No se encontró ningúna etiqueta</label>
                                   
                                @endforelse
                                <a data-toggle="modal" data-target=".createTag" class="btn btn-light-primary btn-sm mb-10">
                                   <i class="fa fa-plus"></i> Nueva etiqueta
                                </a>
                            </div>
                            <!--end::Checkbox list-->
                            @error('tagArray') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="col-lg-9">
                <div class="card mb-10">
                    <div class="card-body">
                        <div class="my-5">
                            <h3 class="text-dark font-weight-bold mb-10">Información general</h3>
                            
                            <div class="form-group">
                                <label class="col-form-label">Nombre <span class="text-danger">*</span></label>
                                <div class="">
                                    <div class="input-group input-group-solid">
                                        <input 
                                            wire:model.defer="blog.name" 
                                            type="text" 
                                            required
                                            class="form-control form-control-solid @error('blog.name') is-invalid @enderror"  
                                            placeholder="Nombre del blog" />
                                    </div>
                                    @error('blog.name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group" wire:ignore.self wire:key="body-group">
                                <label class="col-form-label">Cuerpo <span class="text-danger">*</span></label>
                                <div wire:ignore >
                                    <textarea wire:model.defer="body" wire:key="body" class="body form-control" cols="30" rows="10">{!! $blog->body !!}</textarea>
                                    @error('blog.body') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>

                <div class="card my-5">
                    <div class="card-body">
                        
                        <div class="my-5">
                            <h3 class="text-dark font-weight-bold mb-10">Información Meta</h3>
                            
                            <div class="form-group">
                                <label class="col-form-label">Meta tag titulo</label>
                                <div class="">
                                    <div class="input-group input-group-solid">
                                        <input 
                                            wire:model.defer="blog.meta_title" 
                                            type="text" 
                                            required
                                            class="form-control form-control-solid @error('blog.meta_title') is-invalid @enderror"  
                                            placeholder="Nombre del blog" />
                                    </div>
                                    <div class="text-muted">Establezca una lista de palabras clave con las que se relaciona el producto. Separe las palabras clave agregando una coma
                                        <code>,</code>entre cada palabra clave.</div>
                                    @error('blog.meta_title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Meta tag descripción</label>
                                <div>
                                    <textarea wire:model.defer="blog.meta_description" class="form-control" cols="30" rows="10">{{ $blog->meta_description }}</textarea>
                                    @error('blog.meta_description') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                                </div>
                                <div class="text-muted">Establezca una descripción de metaetiqueta para el producto para mejorar la clasificación de SEO.</div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Meta tag palabras clave</label>
                                <div class="">
                                    <div class="input-group input-group-solid">
                                        <input 
                                            wire:model.defer="blog.meta_keywords" 
                                            type="text" 
                                            required
                                            class="form-control form-control-solid @error('blog.meta_keywords') is-invalid @enderror"  
                                            placeholder="" />
                                    </div>
                                    <div class="text-muted">Establezca una lista de palabras clave con las que se relaciona el producto. Separe las palabras clave agregando una coma
                                        <code>,</code>entre cada palabra clave.</div>
                                    @error('blog.meta_keywords') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="my-5">
                    <div class="d-flex text-center justify-content-end">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary font-weight-bolder mr-5">
                            Regresar
                        </a>
                        <button 
                            type="submit"
                            wire:loading.class="spinner spinner-white spinner-right" 
                            wire:loading.attr="disabled" 
                            wire:target="{{ $method }}" 
                            class="btn btn-primary font-weight-bolder mr-2">
                            <i class="fa fa-save"></i>
                            Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
    
        </div>
    </form>

    <div wire:ignore.self wire:key="createTag" data-backdrop="static" class="modal fade createTag" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Nueva etiqueta
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('admin.blog.tag.form', ['method' => 'store'], key('create-tag'))
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self wire:key="createCategory" data-backdrop="static" class="modal fade createCategory" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Nueva categoría
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('admin.blog.category.form', ['method' => 'store'], key('create-category'))
                </div>
            </div>
        </div>
    </div>

    @push('footer')
        <script>

            Livewire.on('render', function(){
                $('.modal').modal('hide');
            });

            $('.body').summernote({
                height: 350,
                placeholder: 'Todo el cuerpo del blog',
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('blog.body', contents);
                    }
                }
            });
            
        </script>
    @endpush
    
        
</div>
