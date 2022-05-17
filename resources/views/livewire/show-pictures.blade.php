<div>
    <div class="card text-sm ">
        @if ($msg!=null)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{$msg}}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        
    <div class="col-12 mb-3">
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{ __('Gallery Images') }}
                </span>
            </div>
            @foreach ($album->pictures as $image)
            <span style="margin:5px" wire:click="removeImage('{{ $image->id }}')"><i class="fas fa-times"></i></i></span>
                <a href="{{ asset('storage/upload/' . $image->url) }}" target="_blank">
                    <img src="{{ asset('storage/thumbnails/' . $image->url) }}" alt=""
                class="px-1" width="100">
                </a>
            @endforeach
        </div>
    </div>
    </div>
</div>
