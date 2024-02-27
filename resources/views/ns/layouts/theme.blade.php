@if(session('theme') == 'theme1')
    <style>
        /* Estilos para el tema 1 */
        body {
            background-color: #f0f0f0;
            color: #333;
        }
    </style>
@elseif(session('theme') == 'theme2')
    <style>
        /* Estilos para el tema 2 */
        body {
            background-color: #333;
            color: #fff;
        }
    </style>
@elseif(session('theme') == 'theme3')
    <style>
        /* Estilos para el tema 3 */
        body {
            background-color: #ffcc00;
            color: #333;
        }
    </style>
@elseif(session('theme') == 'theme4')
    <style>
        /* Estilos para el tema 4 */
        body {
            background-color: #6699ff;
            color: #fff;
        }
    </style>
@endif