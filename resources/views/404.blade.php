@extends('layouts.app')

@section('content')

  @if (! have_posts())
    <div class="container full-height">
      <h1 class="h2"> Sorry! That page cannot be found</h1>
      <h2 class="h3">
        It looks like nothing was found at this location.</h2>
      <a href="" class="btn btn--outline">Return to Home</a>

    </div>

  @endif
@endsection
