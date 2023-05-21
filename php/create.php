<?php
    session_start();
    include '../conn.php';
    if(isset($_POST["post"])){
        $postText = $_POST["postText"];
        $username = $_SESSION["user"];

        $post = $conn->prepare("INSERT INTO post (username, post) VALUES (?, ?)");
        $post->bind_param("ss", $username, $postText);

        if ($post->execute()) {
            echo 
            "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Posted!</title>
                <link href='../dist/output.css' rel='stylesheet'>
            </head>
            <body>
                <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                    <h1 class='text-[30px] font-black text-indigo-600'>Post Succesfully!</h1>
                    <a href='../index.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                     outline-indigo-600 hover:opacity-80 transition-all font-medium'>Go back Home</a>
                </div>
            </body>
            </html>
            "
            ;
        } else {
            "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Failed!</title>
                <link href='../dist/output.css' rel='stylesheet'>
            </head>
            <body>
                <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                    <h1 class='text-[30px] font-black text-indigo-600'>Post Failed!</h1>
                    <a href='../index.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                     outline-indigo-600 hover:opacity-80 transition-all font-medium'>Try Again</a>
                </div>
            </body>
            </html>
            "
            ;
        }
        $post->close();
    }
    $conn->close();
?>