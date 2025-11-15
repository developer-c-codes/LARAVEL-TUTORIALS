<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLADE</title>
</head>
<body>
    
<h1>Welcome to our shop!</h1>
<p>Our product list</p>


<!------ FORM TO ADD NEW PRODUCT (CREATE) --------->
<form  action="/products" method="POST" class="addform">
    @csrf
            
    <h1>Add New Product</h1>
    <p>Create a new product and add to your inventory</p>
   
    <label for='name'>Product Name *</label><br>
    <input type="text" name="name" placeholder="Enter Product Name" required><br><br>
    <label for="price">Price *</label><br>
    <input type="number" name="price" placeholder="Tsh.. " required><br><br>
    <label for="stock">Stock Quantity *</label><br>
    <input type="number" name="stock" placeholder="0" required><br><br>
    <button type="submit" name="submit">Add product</button>
</form>

<hr>

<table  border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price ($)</th>
            <th>Stock</th>
        </tr>
    </thead>

    <tbody>      
    @foreach ($products as $product)
          <tr>
             <td>{{$product['name']}}</td>
             <td>{{$product['price']}}</td>
             <td>{{$product['stock']}}</td>
             <td><a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure want to delete this product?')">Delete</button>
                </form>
            </td>
         </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>