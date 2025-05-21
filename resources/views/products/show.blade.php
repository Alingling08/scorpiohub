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
        <a href="/products"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 mt-2 ">Back
            to Products</a>
        <a href="/products/{{ $product['id'] }}/edit"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center  mb-2">Edit
            Products</a>
        <form action="{{ route('products.destroy', $product['id']) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center  mb-2">Delete
                Product</button>
        </form>
    </div>
</x-layout>
