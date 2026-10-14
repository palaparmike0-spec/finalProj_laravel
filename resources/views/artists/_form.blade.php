<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $artist->name) }}">
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Nationality</label>
    <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror" value="{{ old('nationality', $artist->nationality) }}">
    @error('nationality')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Birth Year</label>
    <input type="number" name="birth_year" class="form-control @error('birth_year') is-invalid @enderror" value="{{ old('birth_year', $artist->birth_year) }}">
    @error('birth_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Death Year</label>
    <input type="number" name="death_year" class="form-control @error('death_year') is-invalid @enderror" value="{{ old('death_year', $artist->death_year) }}">
    @error('death_year')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-12">
    <label class="form-label">Biography</label>
    <textarea name="biography" rows="4" class="form-control">{{ old('biography', $artist->biography) }}</textarea>
  </div>
</div>
<div class="mt-3">
  <button class="btn btn-success">Save</button>
  <a href="{{ route('artists.index') }}" class="btn btn-secondary">Cancel</a>
</div>