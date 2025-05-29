<h1>Hello {{ $user->name }} </h1>

<div>
    <h2>You created {{ $product->name }} </h2>
    <p>{{ $product->description }}</p>

    <img src="{{ $message->embed($product->image) }}" alt="" />
</div>
