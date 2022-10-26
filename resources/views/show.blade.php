
@extends('layouts.app1')

@section('style')
    <style>
        /* body{
            background: red;
        } */
    </style>
@endsection

@section('title')
    {{$post->title }}
@endsection
@section('content')
    <!-- Grid row -->
    <div class="row">
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
              <!-- Text -->
              <p class="mb-2">{{ $post->body }}</p>
              
              @if (auth()->check()) 
                @if (auth()->user()->id == $post->user_id || auth()->user()->is_admin)
              <a href="{{ route('post.edit',$post->slug) }}" class="btn btn-info btn-block" type="submit">Edit</a>
              <form id="{{ $post->id }}" action="{{ route('post.delete',$post->slug) }}" method="post">
                @csrf
                @method('delete')
                
              </form>
              <button onclick="event.preventDefault(); 
              if(confirm('are you sure'))
              document.getElementById({{ $post->id }}).submit();" class="btn btn-danger btn-block" type="submit">delete</button>                
              @endif
              
              @endif

            </div>
  
          </div>
          <!-- Card -->
  
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->

      
@endsection