
@extends('layouts.app1')

@section('style')
    <style>
        /* body{
            background: red;
        } */
    </style>
@endsection

@section('title', 'Home')

@section('content')

    @if (session()->has('success'))
      <div class="alert alert-success my-5">
        {{ session()->get('success') }}
      </div>
    @endif

    <!-- Grid row -->
    <div class="row">
        @if ($category->posts)
        @foreach ($category->posts as $post)
        
        <!-- Grid column -->
        <div class="col-lg-4 mb-lg-0 my-4 ">
  
          <!-- Card -->
          <div class="card hoverable">
  
            <!-- Card image -->
            <img class="card-img-top" src={{ asset('./uploads/'.$post->image) }} alt="Card image cap">
  
            <!-- Card content -->
            <div class="card-body">
  
              <!-- Title -->
              <p class="card-title text-muted text-uppercase font-small mt-1 mb-3">{{ $post->id }}</p>
              <p class="card-title text-muted text-uppercase font-small mt-1 mb-3">{{ $post->title }}</p>
              <p class="card-title text-muted text-uppercase font-small mt-1 mb-3">{{ $post->user ? $post->user->name : null }}</p>
              <!-- Text -->
              <p class="mb-2">{{ $post->body }}</p>
             
              
              
              <a href="{{ route('post.show',$post->slug) }}" class="btn purple-gradient">Read more</a>
            </div>
  
          </div>
          <!-- Card -->
  
        </div>
        <!-- Grid column -->
        @endforeach
        @endif
      </div>
      <!-- Grid row -->

      {{-- <div class="d-flex justify-content-center my-3">
        {{ $categories->links() }}
      </div> --}}
      
@endsection

@section('script')
    <script>
      $("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 2000 ); // 5 secs

});
    </script>
@endsection