<table class="table">
  <thead>
      <tr>
          <th>Name</th>
          <th>Image</th>
      </tr>
  </thead>
  <tbody>
      @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td><img src="{{$product->getFirstMediaUrl('image')}}" ></td>
        </tr>
      @endforeach
  </tbody>
</table>