<x-Layout>
    <center>
    <form style="width:25%" method="post">
    @csrf
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control">
        <label for="desc">Desc</label>
        <input type="text" name="desc" class="form-control">
        <label for="imgUrl">ImgUrl</label>
        <input type="text" name="imgUrl" class="form-control">
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    </center>
</x-Layout>

