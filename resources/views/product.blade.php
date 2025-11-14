<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLADE</title>
</head>
<body>
    
<h1>Welcome to our shop!</h1>
<p>Our product list</p>

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
         </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>