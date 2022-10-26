
@extends('layouts.app1')

@section('style')
    <style>
        /* body{
            background: red;
        } */
    </style>
@endsection

@section('title', 'Add')

@section('content')

<h1 class="my-4">Create Category</h1>
 
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
<form class="text-center border border-light p-5" action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">

    @csrf


    <!-- Title -->
    <input type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Title" name="title">

    <!-- Title -->
    <input type="file" id="defaultSubscriptionFormPassword2" class="form-control mb-4" placeholder="Image" name="image">

    <!-- Discription -->
    <div class="form-group">
    <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Discription" name="body"></textarea>
    </div>


    <!-- Sign in button -->
    <button class="btn btn-info btn-block mt-4" type="submit">Valider</button>


</form>
<!-- Default form subscription -->
      
@endsection