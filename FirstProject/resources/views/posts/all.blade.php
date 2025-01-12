<x-Layout title="Posts">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="card" style="width: 18rem;">
                    <img src="{{$post->imgUrl}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->desc}}</p>
                    </div>

                    @if($post->liked)
                        <form method="POST" action='/posts/unlike'> 
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}" >
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? null }}" >    
                            @if(auth()->user()) 
                                <button style="font-size:24px; color:red">
                                    {{$post->likes}} Unlike <i class="fa fa-heart"></i>
                                </button>
                            @else
                                <a href="/register" class="btn btn-secondary">{{$post->likes}}<i class="fa fa-heart"></i></a>
                            @endif
                        </form>
                    @else
                        <form method="POST" action='/posts/like'> 
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}" >
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? null }}" > 
                            @if(auth()->user()) 
                                <button style="font-size:24px; color:gray">
                                    {{$post->likes}} Like <i class="fa fa-heart"></i>
                                </button>
                            @else
                                <a href="/register" class="btn btn-secondary">{{$post->likes}}<i class="fa fa-heart"></i></a>
                            @endif
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-Layout>