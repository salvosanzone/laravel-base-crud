<header class="p-2">
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link {{(Route::currentRouteName() === 'home')? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{(Route::currentRouteName() === 'comics.index')? 'active' : ''}}" href="{{route('comics.index')}}">Fumetti</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{(Route::currentRouteName() === 'contacts')? 'active' : ''}}" href="{{route('contacts')}}">Contatti</a>
    </li>
</header>