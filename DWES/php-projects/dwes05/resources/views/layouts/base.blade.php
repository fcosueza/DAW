
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Francisco Sueza Rodríguez" />
        <meta name="description"  content="Página de gestión de talleres de la Asociación Respira" />

        <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}" />

        <title>@yield('titulo') - Asociación Respira</title>
    </head>

    <body>

    <header class="flex center header">
        <form action="/ubicaciones/create" method="GET">
            <button class="button">Crear Ubicación</button>
        </form>
        <form action="/ubicaciones" method="GET">
            <button class="button" >Lista de Ubicaciones</button>
        </form>
    </header>

    @yield('content')
</body>
</html>