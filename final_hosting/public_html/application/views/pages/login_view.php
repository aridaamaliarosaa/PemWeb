<?php session_destroy(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }

        .login {
            background: url("<?=base_url('assets/backgrounds/login.jpg')?>");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .account-login {
            width: 500px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        p a {
            padding-left: 2px;
        }

        .account-login h1 {
            font-size: 25px;
            text-align: right;
            color: #009cff;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
        }

        .login-form input {
            width: 100%;
            position: relative;
            border-bottom: 1px solid #a39e9e;
            background:rgba(255, 255, 255, 0.7);
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            box-shadow: none;
            height: 63px;
            border-radius: 0px;
        }

        .login-form {
            background:rgba(255, 255, 255, 0.7);
            float: left;
            width: 100%;
            padding: 40px;
            border-radius: 5px;
        }

        button.btn {
            width: 100%;
            background: #009cff;
            font-size: 20px;
            padding: 11px;
            color: #fff;
            border: 0px;
            margin: 10px 0px 20px;
        }

        .btn:hover {
            color: #fff;
            opacity: 0.8;
        }

        p {
            float: left;
            width: 100%;
            text-align: center;
            font-size: 14px;
        }

        @media (max-width: 767px) {
            .account-login {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="account-login">
            <h1> Login </h1>

            <?php
                echo form_open('login/authenticate', array('class' => 'login-form'));
                    echo "<div class='form-group'>";
                        echo form_input(array(
                            'name'          => 'uname',
                            'id'            => 'uname',
                            'required'      => 'required',
                            'type'          => 'text',
                            'placeholder'   => 'Username',
                            'value'         => '',
                            'minLength'     => '4',
                            'maxlength'     => '80',
                            'class'         => 'form-control'
                        ));
                    echo "</div>";

                    echo "<div class='form-group'>";
                        echo form_input(array(
                            'name'          => 'passwd',
                            'id'            => 'passwd',
                            'required'      => 'required',
                            'type'          => 'password',
                            'placeholder'   => 'Password',
                            'value'         => '',
                            'minLength'     => '8',
                            'maxlength'     => '80',
                            'class'         => 'form-control'
                        ));
                    echo "</div>";

                    if($login_failed == TRUE){
                        echo '<h5 class="text-danger"> Invalid Username or Password! </h5>';
                    }

                    echo form_button(array(
                        'type'      => 'submit',
                        'class'     => 'btn btn-lg',
                        'content'   => 'Login'
                    ));

                    echo "<p> Don't have an account? " . anchor('register', 'Sign Up') . " </p> ";
                    
                    echo '<p> <h6> Photo by Odan Jaeger from <a href="https://freeimages.com/">FreeImages</a> </h6> </p>';
                echo form_close();
            ?>

            </form>
        </div>
    </div>
</body>

</html>