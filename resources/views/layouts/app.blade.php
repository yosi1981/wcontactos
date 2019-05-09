<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <!-- CSRF Token -->
                    <meta content="{{ csrf_token() }}" name="csrf-token">
                        <title>
                            {{ config('app.name', 'Laravel') }}
                        </title>
                        <!-- Styles -->
         @include('layouts.styles.styles')
        <!-- inline styles related to this page -->
        <!-- ace settings handler -->
        @include('layouts.scripts.scripts')
                            <!-- Scripts -->
                            <script>
                                window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
                            </script>
                        </link>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <div id="app">
            <div class="navbar navbar-default ace-save-state" id="navbar">
                <div class="navbar-container ace-save-state" id="navbar-container">
                    <div class="navbar-header pull-left">
                        <a class="navbar-brand" href="index.html">
                            <small>
                                <i class="fa fa-leaf">
                                </i>
                                 {{ config('app.name', 'Laravel') }}
                            </small>
                        </a>
                    </div>
                    <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    </div>
                </div>
                <!-- /.navbar-container -->
            </div>
            @yield('content')
        </div>
        <!-- Scripts -->
 
    </body>
</html>
