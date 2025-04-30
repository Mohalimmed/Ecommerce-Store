<div class="form-group">
    <x-form.input name="name" label="Category Name" type="text" :value="$category->name ?? ''" />
</div>
<div class="form-group">
    <label for="parent_id" class="form-label">Parent Category</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="">Primary Category</option>
        @foreach ($parents as $parent)
            <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id ?? '') == $parent->id)>{{ $parent->name }}</option>
        @endforeach
    </select>
    @error('parent_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <x-form.textarea class="form-control" name="description" label="Description" :value="$category->description ?? ''" />
</div>
<div class="form-group">
    <x-form.input name="image" label="Image" type="file" accept="image/*" />
    @if (isset($category->image))
        <img src="{{ asset('storage/' . $category->image) }}" alt="" height="50">
    @endif
</div>
<div class="form-group  mb-4">
    <label for="" class="form-label">Status</label>
    <x-form.radio name="status" :options="['active' => 'Active', 'archived' => 'Archived']" :checked="$category->status ?? ''" />
    @error('status')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button ?? 'save' }}</button>
</div>
