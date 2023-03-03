

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css">
</head>
<body>
<h1>Home</h1>

<h2>Votre message secret</h2>


@if(session('status'))
    <div>
        <h3>{{session('status')}}</h3>
    </div>
@endif

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form name="form-message" id="form-message"  style="margin: 50px auto" action="" method="POST" >
    @csrf
    <label for="email">Le destinataire
        <input type="email" id="email" name="email">
    </label>
    <label for=""> Écrivez votre message secret ici
        <textarea id="message" name="message" ></textarea>
    </label>
    <button type="submit">Envoyer</button>
</form>



</body>
</html>









