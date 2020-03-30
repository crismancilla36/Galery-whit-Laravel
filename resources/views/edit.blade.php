@extends('welcome')

@section('title', 'Edit')

@section('navigator')
<ul id="nav-mobile" class="right hide-on-med-and-down">
    <li><a href="/galery"><i class="material-icons">clear</i></a></li>
</ul>
@endsection


@section('content')
<div class="row" style="padding: 1em">
    <form class="col s12 z-depth-1" method="post" action="{{ route('galery.update', $id)}}" >
      @method('PUT')
      @csrf
      <h4 class="header pink-text text-lixghten-1">New picture</h4>
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
      <div class="input-field col s12">
        <button class="btn  right " style="background: #EE6E73" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>
@endsection
