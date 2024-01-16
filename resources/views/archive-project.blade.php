{{--
  Template Name: Projects Archive
--}}

@extends('layouts.app')

@section('content')

  @while(have_posts())
    @php(the_post())
    @include('partials.page-header')
    <div class="container">
      @php(dynamic_sidebar('sidebar-project-header'))
    </div>
    @include('partials.project-query')
    @include('partials.content-page')
  @endwhile

@endsection
