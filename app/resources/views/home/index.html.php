@layout('layouts.main', [
'title' => 'All Products'
])

<a class="mb-3" href="{{ app()->url->to('/create') }}">
    <Forms.Button variant="primary">Create New</Forms.Button>
</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>