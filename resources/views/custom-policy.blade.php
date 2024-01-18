{{--
  Template Name: Policy Template
--}}

@extends('layouts.app')

@section('content')

  @while(have_posts())
    @php(the_post())
    <div class="container">
      @include('partials.content-page')
    </div>
  @endwhile

@endsection
