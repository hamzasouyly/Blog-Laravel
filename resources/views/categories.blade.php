
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
        @foreach ($categories as $category)
        
        <!-- Grid column -->
        <div class="col-lg-4 mb-lg-0 my-4 ">
  
          <!-- Card -->
          <div class="card hoverable">
  
            <!-- Card image -->
            <img class="card-img-top" src={{ asset('./uploads/'.$category->image) }} alt="Card image cap">
  
            <!-- Card content -->
            <div class="card-body">
  
              <!-- Title -->
              <p class="card-title text-muted text-uppercase font-small mt-1 mb-3">{{ $category->id }}</p>
              <p class="card-title text-muted text-uppercase font-small mt-1 mb-3">{{ $category->title }}</p>
              <p class="card-title text-muted text-uppercase font-small mt-1 mb-3">{{ $category->user ? $category->user->name : null }}</p>
              <!-- Text -->
              <p class="mb-2">{{ $category->body }}</p>
             
              
              
              <a href="{{ route('categories.show',$category->slug) }}" class="btn purple-gradient">Read more</a>
            </div>

            @if (auth()->check()) 
            @if (auth()->user()->id == $category->user_id || auth()->user()->is_admin)
          <a href="{{ route('categories.edit',$category->slug) }}" class="btn btn-info btn-block" type="submit">Edit</a>
          <form id="{{ $category->id }}" action="{{ route('categories.destroy',$category->slug) }}" method="post">
            @csrf
            @method('delete')
            
          </form>
          <button onclick="event.preventDefault(); 
          if(confirm('are you sure'))
          document.getElementById({{ $category->id }}).submit();" class="btn btn-danger btn-block" type="submit">delete</button>                
          @endif
          
          @endif
  
          </div>
          <!-- Card -->
  
        </div>
        <!-- Grid column -->
        @endforeach
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