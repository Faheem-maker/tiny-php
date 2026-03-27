@layout('layouts.main', [
'title' => 'All Products'
])

<Forms.ActiveForm :model="$product" action="/" method="POST">
    <Forms.TextField name="name" />
    <Forms.TextField name="price" />
    <Forms.Button variant="primary">Create</Forms.Button>
</Forms.ActiveForm>