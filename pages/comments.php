<?php
    session_start();
    if($_SESSION["user"] == ""){
        header("Location: ../index.php");
    }

    if($_SESSION["id"] == ""){
        header("Location: ../home.php");
    }

    include '../conn.php';
    $username = $_SESSION["user"];
    $postid = $_SESSION["id"];

    $selectPost = "SELECT * FROM post where postid = '$postid'";
    $result = $conn->query($selectPost);
    while($row = $result->fetch_assoc()) {
       $usernamePost = $row["username"];
       $postUser = $row["post"];
    }

    $selectcomment = "SELECT * FROM messages where postid = '$postid'";
    $resultcomment = $conn->query($selectcomment);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhisperSec | Comments</title>
    <link rel="stylesheet" href="../dist/output.css">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class=" bg-indigo-50 flex justify-center">

    <!-- url modal -->
    <div class="w-full h-screen fixed z-[2] bg-black/30 hidden justify-center items-center" id="modalCopyUrl">
        <div class="w-full max-w-[500px] h-fit bg-indigo-50 rounded-lg mx-[5%] md:mx-[10%] p-5 flex flex-col gap-5">
            <div class="flex w-full justify-between items-center">
                <h1 class="text-indigo-600 font-bold text-2xl">Share your post</h1>
            </div>
            <div action="../php/create.php" method="post" class="gap-5 flex flex-col">
                <div id="qrcode"></div>
                <input class="p-2 outline-none rounded-lg" id="url"
                 value = <?php echo "http://localhost/whispersec/php/url.php?postID=$postid"?> readonly>
                <button class="p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                outline-indigo-600 hover:opacity-80 transition-all font-medium w-[100px] self-end" id="close">Okay</button>
            </div>
        </div>
    </div>

    <div class="h-full flex flex-col relative mx-[5%] md:mx-[10%] max-w-[1440px] w-full mb-20">
        <header class="w-full flex justify-between items-center py-5">
            <a href="../pages/home.php" class="text-indigo-600 font-bold text-[25px]"><?php echo $username ?></a>
            <form action="../php/signout.php" method="POST">
                <button type="submit" class="p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                outline-indigo-600 hover:opacity-80 transition-all font-medium w-[100px]" name="signout">Sign out</button>
            </form>
        </header>

        <div class="flex md:flex-row flex-col gap-5 w-full h-fit">
            <!-- post -->
            <div class="flex flex-col gap-5 md:w-[40%]">
                
                <!-- search post -->
                <div class="w-full flex flex-col">
                    <h1 class="text-[25px] font-bold">Search Post</h1>
                    <form action="../php/search.php" method="get" class="w-full">
                        <div class="flex flex-row w-full gap-2">
                            <input type="text" placeholder="Post ID"
                            class="p-2 outline-none border-b-2 border-indigo-600 arrow w-full" name="postID" id="postID" required>
                            <button type="submit" name="search" class="py-3 px-4 bg-indigo-600 text-white rounded-lg focus:outline focus:outline-offset-2 focus:outline-2 outline-indigo-600 hover:opacity-80 transition-all font-medium">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <h1 class="text-[25px] font-bold">Comments on</h1>
                <div class="bg-indigo-200 p-5 rounded-lg flex flex-col gap-3 relative">
                    <div class="flex">
                        <h1 class="text-indigo-600 font-medium"><?php echo $usernamePost ?></h1>
                        <i class="absolute bi bi-share-fill text-indigo-900 text-2xl hover:bg-indigo-50 p-2 rounded-md font-bold
                        right-2 top-2" id="share"></i>
                    </div>
                    <p><?php echo $postUser ?></p>
                </div>

                <!-- write a comment -->
                <?php
                    if($usernamePost != $username){
                ?>
                        <div>
                            <form action="../php/comments.php" method="post" class="gap-5 flex flex-col">
                                <textarea name="commentText" cols="30" rows="5" placeholder="Reply to this post" class="w-full p-5
                                outline-none resize-none" required></textarea>
                                <input type="hidden" name="userPost" id="" value="<?php echo $usernamePost?>">
                                <button type="submit" class="p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                                outline-indigo-600 hover:opacity-80 transition-all font-medium w-[100px] self-end" name="comments">Comment</button>
                            </form>
                        </div>
                <?php
                    }
                ?>
            </div>

            <!-- comments -->
            <div class="md:w-[60%] w-full h-fit bg-indigo-100 rounded-lg flex flex-wrap p-5 justify-center items-start gap-5
            content-baseline">
                <?php
                    if ($resultcomment->num_rows > 0) {
                        // output data of each row
                        while($rowcomment = $resultcomment->fetch_assoc()) {
                ?>
                            <div class="w-[245px] flex flex-col bg-indigo-50 rounded-lg p-5 gap-3 h-fit break-words">
                                <h1 class="font-medium text-indigo-600">Anonymous</h1>
                                <p class=""><?php echo $rowcomment["message"] ?></p>
                            </div>
                <?php
                        }
                    } else {
                ?>
                        <div>
                            <h1 class="text-[30px] font-black text-indigo-600 text-center">No comment yet!</h1>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const share = document.querySelector("#share");
        const modalCopy = document.querySelector("#modalCopyUrl");

        share.addEventListener("click", function(){
            modalCopy.style.display = "flex";
        }); 

        const closeUrl = document.querySelector("#close");

        closeUrl.addEventListener("click", function(){
            modalCopy.style.display = "none";
        });
    </script>
</body>

</html>