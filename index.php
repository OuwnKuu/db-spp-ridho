<html>

<head>
    <style>
        body {
            background: #f2cd7e;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }

        fieldset {
            margin: auto;
            width: 50%;
            height: 60%;
            border: 2px solid white;
            border-radius: 10px;
            background-color: white;
        }

        label {
            font-family: tahoma;
            color: red;
        }

        input {
            position: center;
            margin: 0.5rem;
            padding: 0.75rem;
            width: 70%;
            max-width: 256px;
            height: 2rem;
            border: 2px solid black;
            border-radius: 10px;
            background-color: aliceblue;
        }

        select {
            position: center;
            margin: 0.5rem;
            padding: 0.75rem;
            width: 90%;
            height: 2rem;
            border: 1px solid white;
            border-radius: 10px;
        }
        
        .input-dan-button-login {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .input-masuk {
            margin-top: 2rem;
            padding: 0.5rem 1rem;
            width: fit-content;
            border: none;
            border-radius: 5px;
            background-color: cornflowerblue;
            cursor: pointer;
            color: white;
        }

        .input-masuk:hover {
            background-color: white;
            border: 2px solid black;
            color: black;
        }

        .cek-pembayaran {
            display: flex;
            padding-top: 1rem;
            justify-content: center;
            
        }
    </style>
</head>

<body>
    <h1 align="center"><b> SPP </b> ONLINE </h1>
    <form action="login_validasi.php" method="post">
        <fieldset>
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert'>Username dan Password tidak sesuai!</div>";
                }
            }
            ?>

            <legend align="center"> <img src="src/profile.png" width="75" height="75"></legend>
            <p align="center"> <b>LOGIN</b></p>
            <div class="input-dan-button-login">
                <input name="username" type="text" placeholder="Username" id="input">
                <input name="password" type="password" placeholder="Password" id="input">
                <input class="input-masuk" name="login" type="submit" value="LOGIN" id="submit">
            </div>
            <a class="cek-pembayaran" href="bayar.php">CEK PEMBAYARAN</a>
        </fieldset>
    </form>
</body>

</html>