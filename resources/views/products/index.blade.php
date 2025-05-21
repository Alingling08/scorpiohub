<x-layout>

    <h2>Currently Available Products</h2>

    @if (!empty($products))
        <ul>
            @foreach ($products as $product)
                <li>
                    <x-card href="{{ route('products.show', $product->id) }}" :highlight="$product['stock'] > 50">
                        {{-- <h3>{{ $feature->name }}</h3> --}}
                        <div>
                            <h3>{{ $product->name }}</h3>
                            <span
                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-green-600/20 ring-inset">
                                {{ $product->feature?->name }}</span>

                        </div>
                    </x-card>
                </li>
            @endforeach
        </ul>

        {{ $products->links() }}
    @endif
</x-layout>
