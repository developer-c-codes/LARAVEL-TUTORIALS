<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      
  <form  action="{{ route('products.update', $product->id) }}" method="POST" >
    @csrf
    @method('PUT')
           
    <h1>Update Product</h1>
    <p>Create a new product and add to your inventory</p>
   
    <label for='name'>Product Name *</label><br>
    <input type="text" name="name" placeholder="Enter Product Name" required  value="{{ $product->name }}" ><br><br>
    <label for="price">Price *</label><br>
    <input type="number" name="price" placeholder="Tsh.. " required value="{{ $product->price }}"><br><br>
    <label for="stock">Stock Quantity *</label><br>
    <input type="number" name="stock" placeholder="0" required value="{{ $product->stock }}"><br><br>

    <button type="submit" name="submit">Update product</button>
   </form>

   <a href="{{ route('products.index') }}"> Back to list </a>

</body>
</html>