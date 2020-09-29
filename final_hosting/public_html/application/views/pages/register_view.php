<?php session_destroy(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Register View </title>
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

        .register {
            background: url("<?=base_url('assets/backgrounds/register.jpg')?>");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .account-register {
            width: 500px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        p a {
            padding-left: 2px;
        }

        .account-register h1 {
            font-size: 25px;
            text-align: left;
            color: #009cff;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
        }

        .register-form input {
            width: 100%;
            position: relative;
            border-bottom: 1px solid #a39e9e;
            background:rgba(255, 255, 255, 0.7);
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            box-shadow: none;
            height: 56px;
            border-radius: 5px;
        }

        .register-form select {
            width: 100%;
            position: relative;
            border-bottom: 1px solid #a39e9e;
            background:rgba(255, 255, 255, 0.7);
            box-shadow: none;
            height: 56px;
            border-radius: 5px;
            padding : 6px 10px 6px 10px;
        }

        .register-form {
            background:rgba(255, 255, 255, 0.7);
            float: left;
            width: 100%;
            padding: 16px;
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
            .account-register {
                width: 90%;
            }
        }
    </style>

    <?php if($registered == TRUE){ ?>
        <script>
            document.onload = alert('Account creation successful!');
        </script>
    <?php } ?>
</head>

<body>
    <div class="register">
        <div class="account-register">
            <h1> Register </h1>

            <?php
                echo form_open(current_url(), ['class' => 'register-form']);
                    echo "<div class='form-group'>";
                        echo form_input([
                            'name'          => 'uname',
                            'id'            => 'uname',
                            'required'      => 'required',
                            'type'          => 'text',
                            'placeholder'   => 'Username (4-100 chars, A-Za-z0-9_- allowed)',
                            'value'         => set_value('uname'),
                            'minLength'     => '4',
                            'maxlength'     => '100',
                            'class'         => 'form-control'
                        ]);
                        echo form_error('uname');
                    echo "</div>";

                    echo "<div class='form-group'>";
                        echo form_input([
                            'name'          => 'passwd',
                            'id'            => 'passwd',
                            'required'      => 'required',
                            'type'          => 'password',
                            'placeholder'   => 'Password (8-100 chars)',
                            'value'         => '',
                            'minLength'     => '8',
                            'maxlength'     => '100',
                            'class'         => 'form-control'
                        ]);
                        echo form_error('passwd');
                    echo "</div>";
                    
                    echo "<div class='form-group'>";
                        echo form_input([
                            'name'          => 'conf_passwd',
                            'id'            => 'conf_passwd',
                            'required'      => 'required',
                            'type'          => 'password',
                            'placeholder'   => 'Confirm Password',
                            'value'         => '',
                            'minLength'     => '8',
                            'maxlength'     => '100',
                            'class'         => 'form-control'
                        ]);
                        echo form_error('conf_passwd');
                    echo "</div>";
                    
                    echo "<div class='form-group'>";
                        echo form_input([
                            'name'          => 'dob',
                            'id'            => 'dob',
                            'value'         => set_value('dob'),
                            'required'      => 'required',
                            'type'          => 'date',
                            'class'         => 'form-control'
                        ]);
                        echo form_error('dob');
                    echo "</div>";

                    echo "<div class='form-group'>";
                        echo form_input([
                            'name'          => 'full_name',
                            'id'            => 'full_name',
                            'required'      => 'required',
                            'type'          => 'text',
                            'placeholder'   => 'Full Name (Max 100 chars)',
                            'value'         => set_value('full_name'),
                            'maxlength'     => '100',
                            'class'         => 'form-control'
                        ]);
                        echo form_error('full_name');
                    echo "</div>";

                    echo "<div class='form-group'>";
                        echo form_dropdown('gender', $genders, set_value('gender'));
                        echo form_error('gender');
                    echo "</div>";

                    echo "<div class='form-group'>";
                        echo form_dropdown('country', $countries, set_value('country'));
                        echo form_error('country');
                    echo "</div>";

                    echo form_button([
                        'type'      => 'submit',
                        'class'     => 'btn btn-lg',
                        'content'   => 'Register'
                    ]);

                    echo "<p> Already have an account? " . anchor('login', 'Log In') . " </p>";

                    echo 'Photo by Nino Satria from <a href="https://freeimages.com/">FreeImages</a>';
                echo form_close();
            ?>
        </div>
    </div>
</body>

</html>