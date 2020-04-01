@extends('welcome')

@section('title', 'Edit')

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
    <form class="col s12 z-depth-1" method="post" action="{{ route('galery.update', $id)}}"  enctype="multipart/form-data" >
      @method('PATCH')
      @csrf
      <h4 class="header pink-text text-lixghten-1">Edit picture</h4>
      <div class="row">
        <div class="input-field col s6">
        <input id="title" type="text" class="validate"name='title' value="{{$picture->title}}">
          <label for="title">Title</label>
        </div>
        <div class="input-field col s6">
          <input id="user" type="text" class="validate" name='user' value= "{{$picture->user}}">
          <label for="user">Author</label>
        </div>
      </div>
      <div class="input-field col s12">
        <textarea id="description" name='description' class="materialize-textarea" data-length="80">{{$picture->description}}</textarea>
        <label for="description">Description</label>
      </div>
      <div class="file-field input-field">
          <div class="btn">
          <span>File</span>
          <input type="file" name='image'   multiple>
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
