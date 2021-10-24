<div>
    <div class="pb-5">

        @if (session()->has('alert'))
            <div role="alert" class="alert alert-{{ session()->get('alert-type') }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <strong><i class="fa fa-check-circle"></i></strong> {{ session()->get('alert') }} 
            </div>
        @endif

        <div class="row">
            <div class="form-group col-lg-12">
                <label class="col-3">Estrellas </label>
                <div class="col-9">
                    <div class="star-rating">
                        <input wire:model.defer="stars" type="radio" name="stars" id="star-a" value="5"/>
                        <label for="star-a"></label>
                
                        <input wire:model.defer="stars" type="radio" name="stars" id="star-b" value="4"/>
                        <label for="star-b"></label>
                
                        <input wire:model.defer="stars" type="radio" name="stars" id="star-c"  value="3"/>
                        <label for="star-c"></label>
                
                        <input wire:model.defer="stars" type="radio" name="stars" id="star-d" value="2"/>
                        <label for="star-d"></label>
                
                        <input wire:model.defer="stars" type="radio" name="stars" id="star-e" value="1"/>
                        <label for="star-e"></label>
                    </div>

                    @error('stars') <div><span class="text-danger">{{ $message }}</span></div> @enderror
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label for=""> Nombre </label>
                <input wire:model.defer="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Ingresa tu nombre"> 
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-lg-6">
                <label for=""> Correo </label>
                <input wire:model.defer="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingresa tu nombre"> 
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-lg-12">
                <label for=""> Comentario </label>
                <textarea wire:model.defer="body" class="form-control  @error('body') is-invalid @enderror" cols="30" rows="10" placeholder="Ingresa tu comentaio"></textarea>
            </div>
            <div class="form-group col-lg-12">
                <div class="text-center">
                    <button 
                        wire:click="store"
                        wire:loading.attr="disabled"
                        wire:target="store"
                        class="btn btn-outline-primary btn-rounded">Enviar comentario
                        <i wire:loading.remove wire:target="store" class="icon-send"></i>
                        <i wire:loading.class="spinner-grow spinner-grow-sm" wire:target="store"></i>
                    </button>
                </div> 
            </div>
        </div>
        
    </div>
    <div class="reviews" >
        <h3>Comentarios ({{ count($comments) }})</h3>

        @foreach ($comments as $comment)
            <div class="review">
                <div class="row no-gutters">
                    <div class="col-auto">
                        <h4><a href="#">{{ $comment->name }}</a></h4>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 80%;"></div>
                                <!-- End .ratings-val -->
                            </div><!-- End .ratings -->
                        </div><!-- End .rating-container -->
                        <span class="review-date">{{ $comment->datetoString() }}</span>
                    </div><!-- End .col -->
                    <div class="col">
                        <div class="review-content">
                            <p>{{ $comment->body }}</p>
                        </div><!-- End .review-content -->
                    </div><!-- End .col-auto -->
                </div><!-- End .row -->
            </div><!-- End .review -->
        @endforeach
    </div>

    @push('footer')
        <script>
            Livewire.on('scrollToReviews', function(){
                $('html, body').animate({
                    'scrollTop':   $('#product-details-tab').offset().top
                }, 700);
            });
        </script>   
    @endpush

</div>
