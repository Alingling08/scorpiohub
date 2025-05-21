<x-layout>

    <h2>Currently Available Features</h2>

    @if (!empty($features))
        <ul>
            @foreach ($features as $feature)
                <li>
                    <x-card href="{{ route('features.show', $feature->id) }}" :highlight="$feature->highlight">
                        {{-- <h3>{{ $feature->name }}</h3> --}}
                        <div>
                            <h3>{{ $feature->name }}</h3>
                            <p>{{ $products->feature->description }}</p>
                        </div>
                    </x-card>
                </li>
            @endforeach
        </ul>

        {{ $features->links() }}
    @endif
</x-layout>
