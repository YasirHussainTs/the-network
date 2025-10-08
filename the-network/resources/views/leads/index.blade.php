@extends('layouts.app')

@section('content')
  <h2>The NetWork Leads</h2>

  <form method="GET" class="row g-2 mb-3">
    <div class="col-auto">
      <select name="status" class="form-select">
        <option value="">-- All status --</option>
        <option value="New" {{ request('status')=='New' ? 'selected' : '' }}>New</option>
        <option value="Contacted" {{ request('status')=='Contacted' ? 'selected' : '' }}>Contacted</option>
        <option value="Closed" {{ request('status')=='Closed' ? 'selected' : '' }}>Closed</option>
      </select>
    </div>
    <div class="col-auto">
      <input type="text" name="source" placeholder="Source (Bayut...)" value="{{ request('source') }}" class="form-control">
    </div>
    <div class="col-auto">
      <button class="btn btn-secondary">Filter</button>
      <a href="{{ route('leads.index') }}" class="btn btn-link">Reset</a>
    </div>
  </form>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Source</th>
        <th>Status</th>
        <th>Created</th>
        <th style="width:140px">Actions</th>
      </tr>
    </thead>
    <tbody>
      @forelse($leads as $lead)
        <tr>
          <td>{{ $lead->name }}</td>
          <td>{{ $lead->phone }}</td>
          <td>{{ $lead->source }}</td>
          <td>{{ $lead->status }}</td>
          <td>{{ $lead->created_at->format('Y-m-d') }}</td>
          <td>
            <div class="d-flex gap-1">
              <a class="btn btn-sm btn-info" href="{{ route('leads.show', $lead) }}">View</a>
              <a class="btn btn-sm btn-warning" href="{{ route('leads.edit', $lead) }}">Edit</a>
          
              <form action="{{ route('leads.destroy', $lead) }}" method="POST" class="deleteForm">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
              </form>              
            </div>
          </td>          
        </tr>
      @empty
        <tr><td colspan="6" class="text-center">No leads yet.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $leads->links() }}
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('table tbody tr').click(function() {
        $(this).toggleClass('table-primary');
    });

    $('.deleteForm').submit(function(e){
        e.preventDefault();
        const form = this;

        if(confirm('Are you sure you want to delete this lead?')) {
            $(this).closest('tr').fadeOut(500, function(){
                form.submit();
            });
        }
    });
});
</script>
@endsection
