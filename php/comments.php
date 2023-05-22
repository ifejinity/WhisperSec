<?php
    session_start();
    include '../conn.php';

    if(isset($_POST["comments"])){
        $username = $_SESSION["user"];
        $comment = $_POST["commentText"];
        $postid = $_SESSION["id"];
        $userPost = $_POST["userPost"];

        $sql = "INSERT INTO messages (postid, sender, reciever, message)
                VALUES ('$postid', '$username', '$userPost','$comment')";

        if ($conn->query($sql) === TRUE) {
            header('location: ../pages/comments.php');
        } else {
            echo 
            "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Error</title>
                <link href='../dist/output.css' rel='stylesheet'>
            </head>
            <body>
                <div class='w-full h-screen flex flex-col justify-center items-center text-center gap-5'>
                    <h1 class='text-[30px] font-black text-indigo-600'>Failed to comment!</h1>
                    <a href='../pages/comments.php' class='p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                     outline-indigo-600 hover:opacity-80 transition-all font-medium'>Go back</a>
                </div>
            </body>
            </html>
            "
            ;
        }
    }

    $conn->close();
?>