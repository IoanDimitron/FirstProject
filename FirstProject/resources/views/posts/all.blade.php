<x-Layout>
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="card" style="width: 18rem;">
                    <img src="{{$post->imgUrl}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->desc}}</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-warning mb-2 me-2" href="/posts/edit/{{$post->id}}">Edit</a>
                        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#myModal{{$post->id}}">Delete</button>
                    </div>
                </div>
                                
 
                <!-- Modal -->
                <div class="modal fade" id="myModal{{$post->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="myModal{{$post->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModal{{$post->id}}">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you sure you want to delete {{$post->title}}?</h5>
                                <img src="{{$post->imgUrl}}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->desc}}</p>
                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a class="btn btn-danger mb-2" href="/posts/delete/{{$post}}">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
 
            @endforeach
        </div>
    </div>
 
 
 
</x-Layout>