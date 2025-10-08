@extends('layouts.app')

@section('content')
  <h3>Edit Lead</h3>
  <hr>

  <form method="POST" action="{{ route('leads.update', $lead) }}" class="mt-3">
    @method('PUT')
    @include('leads.form', ['buttonText' => 'Update Lead'])
  </form>
@endsection
