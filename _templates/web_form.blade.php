<form action="{{ route('web_form.submit') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="product-description">Product Description:</label>
        <input type="text" id="product-description" name="product_description" value="{{ old('description') }}"
            required>
    </div>
    <div class="form-group">
        <label for="product-price">Product Price:</label>
        <input type="number" id="product-price" name="product_price" value="{{ old('price') }}" required>
    </div>
    <div class="form-group">
        <label for="product-sku">Product SKU:</label>
        <input type="text" id="product-sku" name="product_sku" value="{{ old('sku') }}" required>
    </div>
    <div class="form-group">
        <label for="product-category">Product Category:</label>
        <input type="text" id="product-category" name="product_category" value="{{ old('category') }}" required>
    </div>
    <div class="form-group">
        <label for="product-stock">Product Stock:</label>
        <input type="number" id="product-stock" name="product_stock" value="{{ old('stock') }}" required>
    </div>
    <div class="form-group">
        <label for="product-active">Product Active:</label>
        <input type="checkbox" id="product-active" name="product_active" value="1"
            {{ old('is_active') ? 'checked' : '' }}>
    </div>
    <div class="form-group">
        <label for="product-image">Product Image:</label>
        <input type="file" id="product-image" name="product_image" value="{{ old('image') }}" required>
    </div>
    <div class="form-group">
        <label for="product-feature-id">Product Feature ID:</label>
        <select id="product-feature-id" name="product_feature_id" required>
            @foreach ($features as $feature)
                <option value="{{ $feature->id }}">{{ $feature->name }}</option>
            @endforeach
    </div>

    <button type="submit">Submit</button>
</form>
