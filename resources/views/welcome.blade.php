<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vue Test</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        
    </head>
    <body class="container-fluid">
        <h1>test</h1>
        <div id="app">
           <h3>Counter: @{{ counter }}</h3>
        </div>
        
        <div id="bind-attribute">
            <span v-bind:title="message">
                Show mi
            </span>
        </div>

        <div id="event-handling">
            <p>@{{ message }}</p>
            <button v-on:click="reversMessage">Перевернуть сообщение</button>
        </div> 

        <div id="conditional-rendering">
            <span v-if="seen">Сейчас меня видно.</span>
        </div>

        <div id="list-rendering">
            <ol>
                <li v-for="todo in todos">
                    @{{todo.text}}
                </li>
            </ol>
        </div>

        <div id="test-load">
            <load-test></load-test>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
