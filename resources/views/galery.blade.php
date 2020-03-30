@extends('welcome')

@section('title', 'Galery')

@section('navigator')
<ul id="nav-mobile" class="right hide-on-med-and-down">
    <li><a href="/galery/create"><i class="material-icons">add</i></a></li>
</ul>
@endsection

@section('content')
    <div class="row">
    @if (sizeof($pictures) == 0)
      <p class="header pink-text text-lighten-1">The galery is empty</p>
    @endif
    @foreach ($pictures as $picture)
      <div class="col s8 m4">
        <div class="card">
          <div class="card-image">
            <img src="http://blogs.agu.org/georneys/files/2012/12/IMG_7273-1024x682.jpg">
            <span class="card-title" style="width: 100%">
                {{$picture->title}}
                <div class="right">
                    <a href="{{route('galery.edit', $picture->id)}} " class= "col"><i class="material-icons white-text">edit</i></a>
                    <form action="{{ route('galery.destroy', ['galery' => $picture]) }}" method="POST" class="col right">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{$picture->id}}">
                        <button type = "submit" style="background-color: rgba(0, 0, 0, 0); border: none; margin:0; padding:0;">
                            <i class="material-icons white-text">clear</i>
                        </button>
                    </form>
                </div>
            </span>
          </div>
          <div>
            <span class = "right blue-text s1" style="padding: 1em">By {{ $picture->user}}</span>
            </div>
          <div class="card-content">
            <p>{{ $picture->description}}</p>
          </div>
        </div>
      </div>

    @endforeach
    </div>
@endsection
