@extends('layouts.app')

@section('content')
  <h3>Add New Lead</h3>
  <hr>

  <form method="POST" action="{{ route('leads.store') }}" class="mt-3">
    @include('leads.form', ['buttonText' => 'Create Lead'])
  </form>
@endsection
