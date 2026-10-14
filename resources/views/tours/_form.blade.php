<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $tour->title) }}">
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Exhibit</label>
    <select name="exhibit_id" class="form-select @error('exhibit_id') is-invalid @enderror">
      <option value="">-- Select --</option>
      @foreach($exhibits as $e)
        <option value="{{ $e->id }}" @selected(old('exhibit_id', $tour->exhibit_id) == $e->id)>{{ $e->title }}</option>
      @endforeach
    </select>
    @error('exhibit_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Guide Name</label>
    <input type="text" name="guide_name" class="form-control @error('guide_name') is-invalid @enderror" value="{{ old('guide_name', $tour->guide_name) }}">
    @error('guide_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Tour Date</label>
    <input type="date" name="tour_date" class="form-control @error('tour_date') is-invalid @enderror" value="{{ old('tour_date', $tour->tour_date) }}">
    @error('tour_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Capacity</label>
    <input type="number" name="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', $tour->capacity) }}">
    @error('capacity')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Price</label>
    <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $tour->price) }}">
    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-12">
    <label class="form-label">Description</label>
    <textarea name="description" rows="3" class="form-control">{{ old('description', $tour->description) }}</textarea>
  </div>
</div>
<div class="mt-3">
  <button class="btn btn-success">Save</button>
  <a href="{{ route('tours.index') }}" class="btn btn-secondary">Cancel</a>
</div>