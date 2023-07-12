<html>

<head>
    <title>Gamefrog - Signup</title>

    <link rel="stylesheet" href="{{ url('stylesheets/form_style.css') }}">
    <link rel="stylesheet" href="{{ url('stylesheets/main.css') }}">
    <script src='{{ url("scripts/signup.js") }}' defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ url('assets/favicon.png') }}">
</head>

<body>
    <div class="logo">
        <img src="assets/site_logo.png">
        <h1>Gamefrog</h1>
    </div>

    <div id="container"> 

        @if($error == 'empty_fields')
        <section class='errror'>Error: Missing fields</section>
        @elseif($error == 'bad_password')
        <section class='errror'>Error: Password mismatch</section>
        @elseif($error == 'existing_email')
        <section class='errror'>Error: e-mail already in use</section>
        @elseif($error == 'existing_user')
        <section class='errror'>Error: Username is taken</section>
        @endif

        <form method="post" name="credentials">
            @csrf

            <div class="name">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value ='{{ old("name") }}' >
                <div id = "name_err"><img src="./assets/close.svg"/><span></span></div>
            </div>

            <div class="surname">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" value ='{{ old("surname") }}' >
                <div id= "surname_err"><img src="./assets/close.svg"/><span></span></div>
            </div>

            <div class="username">
                <label for="username">Username</label>
                <input type="text" name="username" id ="username" value ='{{ old("username") }}' >
                <div id= "username_err"><img src="./assets/close.svg"/><span></span></div>
            </div>

            <div class="email">
                <label for="email">e-mail</label>
                <input type="text" name="email" id="email" value ='{{ old("email") }}' >
                <div id= "email_err"><img src="./assets/close.svg"/><span></span></div>
            </div>

            <div class="password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <div id= "password_err"><img src="./assets/close.svg"/><span></span></div>
            </div>

            <div class="confirm_password">
                <label for="confirm_password"> Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password">
                <div id= "confirm_err"><img src="./assets/close.svg"/><span></span></div>
            </div>

            <div class="submit_container">
                <div class="submit_btn">
                    <input type='submit' value="registrati" name="registrazione">
                </div>
            </div>
        </form>

        <div class="redirect"><h4>Have an account already?</h4></div>
        <div class="redirect_btn_container"><a class="redirect_btn" href="{{ url('login') }}">Access Gameco here</a></div>
    </div>
</body>

</html>