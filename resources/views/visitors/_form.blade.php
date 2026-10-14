<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $visitor->name) }}">
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $visitor->email) }}">
    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $visitor->phone) }}">
    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Visit Date</label>
    <input type="date" name="visit_date" class="form-control @error('visit_date') is-invalid @enderror" value="{{ old('visit_date', $visitor->visit_date) }}">
    @error('visit_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
  <div class="col-md-4">
    <label class="form-label">Tour (optional)</label>
    <select name="tour_id" class="form-select @error('tour_id') is-invalid @enderror">
      <option value="">-- No tour --</option>
      @foreach($tours as $t)
        <option value="{{ $t->id }}" @selected(old('tour_id', $visitor->tour_id) == $t->id)>{{ $t->title }}</option>
      @endforeach
    </select>
    @error('tour_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
  </div>
</div>
<div class="mt-3">
  <button class="btn btn-success">Save</button>
  <a href="{{ route('visitors.index') }}" class="btn btn-secondary">Cancel</a>
</div>