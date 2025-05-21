<x-layout>

    <h2 class="uppercase">{{ $product['name'] }}</h2>
    <span
        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">{{ $product['feature']['name'] }}</span>

    <p>{{ $product['description'] }}</p>
    <div class="border-t border-gray-200">
        <h3 class="text-lg font-semibold ">Product Details</h3>
        <ul class="list-disc pl-5">
            <li>Price: ${{ $product['price'] }}</li>
            <li>Stock: {{ $product['stock'] }}</li>
            <li>Category: {{ $product['category'] }}</li>
        </ul>
    </div>
    <div class="pt-2">
        <a href="/products" class="btn mt-2">Back to Products</a>
        <a href="/products/{{ $product['id'] }}/edit" class="btn">Edit Products</a>
    </div>
</x-layout>
