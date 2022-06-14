<form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
  @csrf
  <div>
      <label>Name</label>
      <input type="text" name="name" />
  </div>
  <div>
      <label>Image:</label>
      <input type="file" name="image" />
  </div>
  <div>
      <button type="submit" />Store</button>
  </div>
</form>