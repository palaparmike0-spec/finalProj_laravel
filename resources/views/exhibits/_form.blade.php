<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $exhibit->title) }}">
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label">Category</label>
    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
      <option value="">-- Select --</option>
      @foreach($categories as $c)
        <option value="{{ $c->id }}" @selected(old('category_id', $exhibit->category_id) == $c->id)>{{ $c->name }}</option>
      @endforeach
    </select>
    @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-3">
    <label class="form-label">Artist</label>
    <select name="artist_id" class="form-select @error('artist_id') is-invalid @enderror">
      <option value="">-- Select --</option>
      @foreach($artists as $a)
        <option value="{{ $a->id }}" @selected(old('artist_id', $exhibit->artist_id) == $a->id)>{{ $a->name }}</option>
      @endforeach
    </select>
    @error('artist_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Year Created</label>
    <input type="number" name="year_created" class="form-control @error('year_created') is-invalid @enderror" value="{{ old('year_created', $exhibit->year_created) }}">
    @error('year_created')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Gallery Location</label>
    <input type="text" name="gallery_location" class="form-control @error('gallery_location') is-invalid @enderror" value="{{ old('gallery_location', $exhibit->gallery_location) }}">
    @error('gallery_location')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Status</label>
    <select name="status" class="form-select @error('status') is-invalid @enderror">
      @foreach(['on_display' => 'On Display', 'in_storage' => 'In Storage', 'on_loan' => 'On Loan'] as $v => $l)
        <option value="{{ $v }}" @selected(old('status', $exhibit->status ?? 'on_display') == $v)>{{ $l }}</option>
      @endforeach
    </select>
    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-12">
    <label class="form-label">Description</label>
    <textarea name="description" rows="3" class="form-control">{{ old('description', $exhibit->description) }}</textarea>
  </div>
</div>
<div class="mt-3">
  <button class="btn btn-success">Save</button>
  <a href="{{ route('exhibits.index') }}" class="btn btn-secondary">Cancel</a>
</div>