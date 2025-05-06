{{-- Product Name --}}
<div class="form-group mb-3">
    <x-form.input name="name" label="Product Name" type="text" :value="old('name', $product->name ?? '')" />
</div>

{{-- Category Select --}}
<div class="form-group mb-3">
    <x-form.select name="category_id" label="Categories" :options="App\Models\Category::all()->pluck('name', 'id')->toArray()" :selected="old('category_id', $product->category_id ?? '')" />
    @error('category_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

{{-- Image Upload --}}
{{-- <div class="form-group">
    <x-form.input name="image" label="Product Image" type="file" accept="image/*" />
    @if (!empty($product->image))
        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" height="50">
    @endif
</div> --}}
<div class="form-group">
    <x-form.input name="image" label="Image" type="file" accept="image/*" />
    @if (isset($product->image))
        <img src="{{ asset('storage/' . $product->image) }}" alt="" height="50">
    @endif
</div>

{{-- Description --}}
<div class="form-group mb-3">
    <x-form.textarea class="form-control" name="description" label="Description" :value="$product->description ?? ''" />
</div>

{{-- Store Select --}}
<div class="form-group mb-3">
    <x-form.select name="store_id" label="Store" :options="App\Models\Store::all()->pluck('name', 'id')->toArray()" :selected="old('store_id', $product->store_id ?? '')" />
    @error('store_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

{{-- Price --}}
<div class="form-group mb-3">
    <x-form.input name="price" label="Price" type="number" step="0.01" :value="old('price', $product->price ?? '')" />
    @error('price')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

{{-- Compare Price --}}
<div class="form-group mb-3">
    <x-form.input name="compare_price" label="Compare Price" type="number" step="0.01" :value="old('compare_price', $product->compare_price ?? '')" />
    @error('compare_price')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

{{-- Tag --}}
<div class="form-group mb-3">
    <x-form.input name="tags" label="Tags" type="text" :value="$tags ?? ''" />
    @error('tag')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


{{-- Status Radio --}}
<div class="form-group mb-3">
    <x-form.radio name="status" label="Status" :options="['active' => 'Active', 'draft' => 'Draft', 'archived' => 'Archived']" :checked="old('status', $product->status ?? '')" />
    @error('status')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

{{-- Submit Button --}}
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button ?? 'Save' }}</button>
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        var inputElem = document.querySelector(
                '[name=tags]'), // the 'input' element which will be transformed into a Tagify component
            tagify = new Tagify(inputElem);
    </script>
@endpush
