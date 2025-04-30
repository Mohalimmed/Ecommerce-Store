<div class="form-group">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}"
        class="form-control @error('name')
        is-invalid
    @enderror">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
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
    <label for="" class="form-label">Description</label>
    <textarea type="text" name="description" class="form-control">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="" class="form-label">Image</label>
    <input type="file" name="image" class="form-control" accept="image/*">
    @if (isset($category->image))
        <img src="{{ asset('storage/' . $category->image) }}" alt="" height="50">
    @endif
</div>
<div class="form-group  mb-4">
    <label for="" class="form-label">Status</label>
    <div class="form-check">
        <input type="radio" name="status" value="active" class="form-check-input" @checked(old('status', $category->status ?? '') == 'active')>
        <label class="form-check-label">Active</label>
    </div>
    <div class="form-check">
        <input type="radio" name="status" value="archived" class="form-check-input">
        <label class="form-check-label" @checked(old('status', $category->status ?? '') == 'archived')>Archived</label>
    </div>
    @error('status')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $button ?? 'save' }}</button>
</div>
