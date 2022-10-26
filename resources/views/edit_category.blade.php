
@extends('layouts.app1')

@section('style')
    <style>
        /* body{
            background: red;
        } */
    </style>
@endsection

@section('title')
 Edit   {{ $category->title }}
@endsection

@section('content')

<h1>Edit Category</h1>
 
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
<form class="text-center border border-light p-5" action="{{ route('categories.update',$category->slug) }}" method="post" enctype="multipart/form-data">
    
    @csrf
    @method('put')

    <!-- Title -->
    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Title" value="{{ $category->title }}" name="title">

    <!-- Title -->
    <input type="file" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Image" name="image">

    <!-- Discription -->
    <div class="form-group">
    <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Discription" name="body">{{ $category->body }}</textarea>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block">Updated</button>


</form>
<!-- Default form subscription -->
      
@endsection