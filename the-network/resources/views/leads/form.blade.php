@csrf

<div class="mb-3">
  <label class="form-label">Name</label>
  <input type="text" name="name" value="{{ old('name', $lead->name ?? '') }}" class="form-control">
  @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label">Email</label>
  <input type="email" name="email" value="{{ old('email', $lead->email ?? '') }}" class="form-control">
  @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label">Phone</label>
  <input type="text" name="phone" value="{{ old('phone', $lead->phone ?? '') }}" class="form-control">
  @error('phone')<div class="text-danger small">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label">Source</label>
  <select name="source" class="form-select">
    @php
      $sources = ['Bayut','Property Finder','Dubizzle','Website'];
    @endphp
    <option value="">-- Select Source --</option>
    @foreach($sources as $src)
      <option value="{{ $src }}" {{ old('source', $lead->source ?? '') == $src ? 'selected' : '' }}>{{ $src }}</option>
    @endforeach
  </select>
  @error('source')<div class="text-danger small">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
  <label class="form-label">Status</label>
  <select name="status" class="form-select">
    @php
      $statuses = ['New','Contacted','Closed'];
    @endphp
    @foreach($statuses as $st)
      <option value="{{ $st }}" {{ old('status', $lead->status ?? '') == $st ? 'selected' : '' }}>{{ $st }}</option>
    @endforeach
  </select>
  @error('status')<div class="text-danger small">{{ $message }}</div>@enderror
</div>

<div class="d-flex gap-2">
  <button class="btn btn-primary">{{ $buttonText ?? 'Save' }}</button>
  <a href="{{ route('leads.index') }}" class="btn btn-secondary">Cancel</a>
</div>
