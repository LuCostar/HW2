<html>
    <head>
    <link rel="stylesheet" href="{{ url('stylesheets/form_style.css') }}">
    <link rel="stylesheet" href="{{ url('stylesheets/main.css') }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="assets/favicon.png">

        <title>Gamefrog - Accesso</title>
    </head>
    <body>
        <div class="logo">
            <img src="assets/site_logo.png">
            <h1>Gamefrog</h1>
        </div>
        <div id="container">
                <h5>Please, enter your login credentials</h5>

                <form name='credentials' method='post'>
                    @csrf

                    <div class="username">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value ='{{ old("username") }}'>
                    </div>

                    <div class="password">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </div>

                    @if($error == 'empty_fields')
                    <section class='error'>Please enter username/password</section>
                    @elseif($error == 'wrong_user')
                    <section class='error'>Inexistent User</section>
                    @elseif($error == 'wrong_password')
                    <section class='error'>Wrong password</section>
                    @endif

                    <div class="submit_container">
                        <div class="submit_btn">
                            <input type='submit' value="accedi" name="accesso">
                        </div>
                    </div>
                </form>
                <div class="redirect"><h4>Not subscribed?</h4>
                <div class="redirect_btn_container"><a class="redirect_btn" href="{{ url('register') }}">Create an account!</a></div>
                </div>
            </div>
    </body>
</html>