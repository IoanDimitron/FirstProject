<x-Layout>
    <center>
    <h1>Edit</h1>
    <form style="width:25%" method="post">
    @csrf
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{$post->title}}">
        <label for="desc">Desc</label>
        <input type="text" name="desc" class="form-control" value="{{$post->desc}}">
        <label for="imgUrl">ImgUrl</label>
        <input type="text" name="imgUrl" class="form-control" value="{{$post->imgUrl}}">
        <input type="submit" value="Edit" class="btn btn-warning">
        <input type="hidden" name="id" value="{{$post->id}}">
    </form>
    </center>
</x-Layout>

