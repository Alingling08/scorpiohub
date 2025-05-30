<h1>Hello {{ $user->name }} </h1>

<div>
    <h2>You updated {{ $product->name }} </h2>
    <p>{{ $product->description }}</p>

    <img src="{{ $message->embed('storage/' . $product->image) }}" alt="" />
</div>
