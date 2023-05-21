<?php
    include '../conn.php';

    if(isset($_POST["signup"])){
        $fullname = $_POST["upName"];
        $username = $_POST["upUser"];
        $password = $_POST["upPass"];
        $vpassword = $_POST["upVpass"];
        

        // check if the username is unique
        $sql = "SELECT * FROM user where username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo 
            "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Sign up Failed!</title>
                <link href='../dist/output.css' rel='stylesheet'>
            </head>
            <body>
                <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                    <h1 class='text-[30px] font-black text-indigo-600'>This Username is Already Taken!</h1>
                    <a href='../index.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                     outline-indigo-600 hover:opacity-80 transition-all font-medium'>Try Again</a>
                </div>
            </body>
            </html>
            "
            ;
        }
        else {
            $insert = $conn->prepare("INSERT INTO user (fullname, username, password) VALUES (?, ?, ?)");
            $insert->bind_param("sss", $fullname, $username, $password);

            if($password === $vpassword){
                if ($insert->execute()) {
                    echo 
                    "
                    <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Sign up Success!</title>
                        <link href='../dist/output.css' rel='stylesheet'>
                    </head>
                    <body>
                        <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                            <h1 class='text-[30px] font-black text-indigo-600'>Sign up Successful!</h1>
                            <a href='../index.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                            outline-indigo-600 hover:opacity-80 transition-all font-medium'>Sign in</a>
                        </div>
                    </body>
                    </html>
                    "
                    ;
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
                        <title>Sign up Failed!</title>
                        <link href='../dist/output.css' rel='stylesheet'>
                    </head>
                    <body>
                        <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                            <h1 class='text-[30px] font-black text-indigo-600'>Sign up Failed!</h1>
                            <a href='../index.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                            outline-indigo-600 hover:opacity-80 transition-all font-medium'>Try Again</a>
                        </div>
                    </body>
                    </html>
                    "
                    ;
                }
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
                    <title>Sign up Failed!</title>
                    <link href='../dist/output.css' rel='stylesheet'>
                </head>
                <body>
                    <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                        <h1 class='text-[30px] font-black text-indigo-600'>Password Verification Failed!</h1>
                        <a href='../index.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                        outline-indigo-600 hover:opacity-80 transition-all font-medium'>Try Again</a>
                    </div>
                </body>
                </html>
                "
                ;
            }

            $insert->close();
        }
        }

    $conn->close();
?>