<?php
    include '../conn.php';
    session_start();
    if(isset($_POST["signin"])){
        $username = $_POST["inUser"];
        $password = $_POST["inPass"];

        $sql = "SELECT * FROM user where username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $user=$row["username"];
            }
            if ($user == $username){
                header("Location: ../pages/home.php");
                $_SESSION["user"] = $username;
            }
            else{
                echo 
                "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Sign in Failed!</title>
                    <link href='../dist/output.css' rel='stylesheet'>
                </head>
                <body>
                    <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                        <h1 class='text-[30px] font-black text-indigo-600'>Username Incorrect!</h1>
                        <a href='../index.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                        outline-indigo-600 hover:opacity-80 transition-all font-medium'>Try Again</a>
                    </div>
                </body>
                </html>
                "
                ;
            }
        } else {
            echo 
            "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Sign in Failed!</title>
                <link href='../dist/output.css' rel='stylesheet'>
            </head>
            <body>
                <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                    <h1 class='text-[30px] font-black text-indigo-600'>Sign in failed!</h1>
                    <a href='../index.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                     outline-indigo-600 hover:opacity-80 transition-all font-medium'>Try Again</a>
                </div>
            </body>
            </html>
            "
            ;
        }
        $conn->close();
    }
?>