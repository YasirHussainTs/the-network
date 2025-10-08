@extends('layouts.app')

@section('content')
  <div class="d-flex justify-content-between align-items-start">
    <div>
      <h3>{{ $lead->name }}</h3>
      <p>
        <strong>Phone:</strong> {{ $lead->phone }}<br>
        <strong>Email:</strong> {{ $lead->email ?? '-' }}<br>
        <strong>Source:</strong> {{ $lead->source }}<br>
        <strong>Status:</strong> {{ $lead->status }}
      </p>
    </div>
    <div>
      <a class="btn btn-sm btn-secondary" href="{{ route('leads.index') }}">Back to list</a>
    </div>
  </div>

  <hr>

  <h5>Activities ({{ $lead->activities->count() }})</h5>

  <ul class="list-group mb-3">
    @forelse($lead->activities as $act)
      <li class="list-group-item">
        <strong>{{ $act->type }}</strong> — <small class="text-muted">{{ $act->created_at->diffForHumans() }}</small>
        <div>{{ $act->description }}</div>
      </li>
    @empty
      <li class="list-group-item">No activities yet.</li>
    @endforelse
  </ul>

  <h6>Add Activity</h6>
  <form method="POST" action="{{ route('leads.activities.store', $lead) }}">
    @csrf

    <div class="mb-2">
      <label class="form-label">Type</label>
      <select name="type" class="form-select">
        <option value="Note">Note</option>
        <option value="Viewing">Viewing</option>
        <option value="Meeting">Meeting</option>
      </select>
      @error('type')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <div class="mb-2">
      <label class="form-label">Description</label>
      <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
      @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
    </div>

    <button class="btn btn-primary">Add activity</button>
  </form>
@endsection
