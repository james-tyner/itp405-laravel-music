{{-- this layout acts like a template for all other pages, so you can have headers and footers --}}

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title> {{-- includes the title we defined on the invoices page --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  </head>
  <body>

    <div class="container-fluid pl-0 pr-0">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav">
            @if (Auth::check())
              <li class="nav-item"><a href="/invoices" class="nav-link">Invoices</a></li>
              <li class="nav-item"><a href="/profile" class="nav-link">Profile</a></li>
              <li class="nav-item"><a href="/settings" class="nav-link">Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="/logout">Log out</a></li>
            @else
              <li class="nav-item"><a class="nav-link" href="/signup">Sign up</a></li>
              <li class="nav-item"><a class="nav-link" href="/login">Log in</a></li>
            @endif
          </ul>
        </div>
      </nav>

      <div class="pl-5 pr-5">
        @yield('main') {{-- includes a section called main right here --}}
      </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
