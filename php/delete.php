<?php
    session_start();
    include '../conn.php';

    if(isset($_POST["delete"])){
        $post = $_POST["postid"];
        $deletePost = "DELETE FROM post WHERE postid = '$post'";
        if ($conn->query($deletePost)) {
            header("Location: ../pages/home.php");
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
                <title>Failed!</title>
                <link href='../dist/output.css' rel='stylesheet'>
            </head>
            <body>
                <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                    <h1 class='text-[30px] font-black text-indigo-600'>Deletion failed!</h1>
                    <a href='../pages/home.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                     outline-indigo-600 hover:opacity-80 transition-all font-medium'>Try Again</a>
                </div>
            </body>
            </html>
            "
            ;
        }
    }

    if(isset($_POST["comments"])){
        $_SESSION["id"] = $_POST["postid"];
        header("Location: ../pages/comments.php");
    }
    
    $conn->close();
?>