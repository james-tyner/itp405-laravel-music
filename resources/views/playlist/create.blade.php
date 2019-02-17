@extends('layout') {{-- tells Laravel where to find the layout that this page is linked to --}}

@section('title', 'Create a Playlist')

@section('main')

  <div class="row">
    <div class="col">
      <form action="/playlists" method="post">
        @csrf {{-- used to prevent bad things from happening... it's like CORS for Laravel --}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}"> {{-- prepopulate the field with the old (pre-redirect) name, if there is one --}}
        </div>
        <div class="form-row">
          <button type="submit" class="btn btn-primary">Save</button>
          <div class="text-danger">
            {{$errors->first('name')}} {{-- show the first error for the name field. see PlaylistController--}}
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
