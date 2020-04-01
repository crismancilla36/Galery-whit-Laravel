@extends('welcome')

@section('title', 'Create')

@section('navigator')
<ul id="nav-mobile" class="right hide-on-med-and-down">
    <li><a href="/galery"><i class="material-icons">clear</i></a></li>
</ul>
@endsection

@section('content')
<div class="row" style="padding: 1em">
    @if ($errors->any())
        <blockquote class="alert alert-danger col s12">
        <i class="large material-icons col pink-text 1em">error</i>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </blockquote>
    @endif
    <form class="col s12 z-depth-1" method="post" enctype="multipart/form-data" action="{{ route('galery.store')}}">
      @csrf
      <h4 class="header pink-text text-lighten-1">New picture</h4>
      <div class="row">
        <div class="input-field col s6">
            <input name="title" type="text" class="validate" autofocus>
            <label for="Title">Title</label>
        </div>
        <div class="input-field col s6">
          <input type="text" class="validate" name='user'>
          <label for="user">Author</label>
        </div>
      </div>
      <div class="input-field col s12">
        <textarea name='description' class="materialize-textarea" data-length="80"></textarea>
        <label for="description">Description</label>
      </div>
    <div class="file-field input-field">
        <div class="btn">
        <span>File</span>
        <input type="file" name='image' multiple>
        </div>
        <div class="file-path-wrapper">
        <input class="file-path validate" placeholder="Upload one or more files" name='image'>
        </div>
    </div>
    <div class="input-field col s12">
        <button class="btn  right " style="background: #EE6E73" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
        </button>
    </div>
    </form>
  </div>
@endsection
