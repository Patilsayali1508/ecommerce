{{View::make('sidebar')}}
<style>
    
</style>

<div class="container">
    <div class="box shadow">
    <form action="product_add" method="POST" enctype="multipart/form-data">
        <h3 class="">Product ADD</h3>
        @csrf
  <div class="form-group">
    <label for="Nae">Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
  
  </div>
  <div class="form-group">
    <label for="Price">Price</label>
    <input type="number" name="price" class="form-control" >
  </div>
  <div class="form-group">
    <label for="CoverImage">Cover Image</label>
    <input type="file" class="form-control" name="cover_image" >
  </div>
  <div class="form-group">
    <label for="Images">Images</label>
    <input type="file" class="form-control" name="images[]"  multiple>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</div>