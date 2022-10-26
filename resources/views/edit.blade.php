
@extends('layouts.app1')

@section('style')
    <style>
        /* body{
            background: red;
        } */
    </style>
@endsection

@section('title')
 Edit   {{ $post->title }}
@endsection

@section('content')

<h1>Edit Post</h1>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    <!-- Default form subscription -->
<form class="text-center border border-light p-5" action="{{ route('post.update',$post->slug) }}" method="post" enctype="multipart/form-data">
    
    @csrf
    @method('put')

    <!-- Title -->
    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Title" value="{{ $post->title }}" name="title">

    <!-- Title -->
    <input type="file" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Image" name="image">

    <!-- Discription -->
    <div class="form-group">
    <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Discription" name="body">{{ $post->body }}</textarea>
    </div>


    <select class="form-control" id="exampleFormControlSelect1" name="category_id" multiple>
        @foreach ($categories as $category)
                
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                
        @endforeach
        </select>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block">Updated</button>


</form>
<!-- Default form subscription -->
      
@endsection