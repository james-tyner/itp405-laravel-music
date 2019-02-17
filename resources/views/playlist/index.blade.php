@extends('layout') {{-- tells Laravel where to find the layout that this page is linked to --}}

@section('title', 'Playlists')

@section('main')

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-brand">
      Playlists
    </div>
    <a href="/playlists/new" class="btn btn-primary">Add a Playlist</a>
  </nav>

  <div class="row">
    <div class="col-3">
      <ul class="nav flex-column">
        @forelse($playlists as $playlist)
            <li class="nav-item">
              <a class="nav-link" href="/playlists/{{$playlist->PlaylistId}}">{{$playlist->Name}}</a>
            </li>
        @empty
          <li class="nav-item">No Playlists</li>
        @endforelse
      </ul>
    </div>
    <div class="col-9">
      <ul class="list-group list-group-flush">
        @forelse ($tracks as $track)
          <li class="list-group-item">{{$track->Name}}</li>
        @empty
          <div class="alert alert-warning" role="alert">
            No tracks for this playlist.
          </div>
        @endforelse
      </ul>

    </div>
  </div>

@endsection
