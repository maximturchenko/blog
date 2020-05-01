<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="maximturchenko">

        <title>Блог диванных путешественников</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('/css/reset.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">

    </head>
    <body>


        <header>
            <div class="wrapper">
                <a href="{{route("home")}}"><img src="{{ asset('img/logo.png')}}" class="h_logo" alt="Blogin" title=""></a>
                <nav>
                    <ul class="main_nav">
                        <li class="current"><a href="#">Главная</a></li>
                        @can('add-post')
                          <li><a href="{{route("add")}}">Добавить пост</a></li>
                        @endcan
                       <li>
                            @guest
                                <a href="{{ route('login') }}">Авторизация</a></li>
                                @if (Route::has('register'))
                                <li> <a href="{{ route('register') }}">Регистрация</a></li>
                                @endif
                            @else
                                Приветствую {{ Auth::user()->name }}
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Выход</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                             @endguest
                         </li>
                    </ul>
                </nav>
            </div>
        </header><!-- Header End -->



        <section class="main2 wrapper">
            <section class="content">
                @yield('content')
            </section><!-- Content End -->

            <aside class="sidebar">
                <section class="widget">
                    <h3 class="widget-title">About Blogin.</h3>
                    <div class="textwidget">
                        <p>Duis aute irure dolor in rhenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                        <p>Excepteur sint occaecat sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </section>

                <section class="widget">
                    <h3 class="widget-title">Search.</h3>
                    <form class="search_widget">
                        <input type="text" id="search-field" class="search-field" placeholder="What are you looking for?"/>
                    </form>
                </section>

                <section class="widget">
                    <a href="#">
                        <img src="img/ads.jpg" alt="" title="">
                    </a>
                </section>
            </aside><!-- aside(sidebar) End -->

            <nav class="pagination">
                <a href="#" class="previous"><i></i>Previous</a>
                <a href="#" class="next">Next<i></i></a>
            </nav><!-- pagination End -->
        </section><!-- Main2 End -->

        <footer>
            <div class="wrapper">
                <img class="logo_footer" src="img/logo_footer.png" alt="Blogin" title="">
                <p class="rights">© 2014 Blogin.com  -  All Rights Reserved  -  Find more free Templates at <a href="http://Pixelhint.com" target="_blink">Pixelhint.com</a> </p>
                <ul class="social_profiles">
                    <li class="f"><a href="http://facebook.com/pixelhint" target="_blink"></a></li>
                    <li class="t"><a href="http://twitter.com/pixelhint" target="_blink"></a></li>
                    <li class="be"><a href="http://behance.net/pixelhint" target="_blink"></a></li>
                    <li class="d"><a href="http://dribbble.com/pixelhint" target="_blink"></a></li>
                </ul>
            </div>
        </footer><!-- Footer End -->


        <script src="{{ asset('/js/jquery-3.5.0.min.js') }}"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            var editor_config = {
path_absolute : "/",
selector: "#tiny-mc",
plugins: [
  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
  "searchreplace wordcount visualblocks visualchars code fullscreen",
  "insertdatetime media nonbreaking save table contextmenu directionality",
  "emoticons template paste textcolor colorpicker textpattern"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
relative_urls: false,
file_browser_callback : function(field_name, url, type, win) {
  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

  var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
  if (type == 'image') {
    cmsURL = cmsURL + "&type=Images";
  } else {
    cmsURL = cmsURL + "&type=Files";
  }

  tinyMCE.activeEditor.windowManager.open({
    file : cmsURL,
    title : 'Filemanager',
    width : x * 0.8,
    height : y * 0.8,
    resizable : "yes",
    close_previous : "no"
  });
}
};

tinymce.init(editor_config);

        </script>
    </body>
</html>

