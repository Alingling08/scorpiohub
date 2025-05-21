<x-layout>
   
        <h2 class="uppercase">{{ $feature['name'] }}</h2>
        <p>{{ $feature['description'] }}</p>

    <div class="pt-2">
    <a href="/features" class="btn mt-2">Back to Features</a>
    <a href="/features/{{ $feature['id'] }}/edit" class="btn">Edit Feature</a>
    </div>
</x-layout>
