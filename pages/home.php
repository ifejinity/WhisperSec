<?php
    session_start();
    if($_SESSION["user"] == ""){
        header("Location: ../index.php");
    }

    include '../conn.php';
    $username = $_SESSION["user"];

    $selectPost = "SELECT * FROM post WHERE username = '$username'";
    $resultPost = $conn->query($selectPost);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./src/resources/logo.png">
    <title>WhisperSec | Home</title>
    <link rel="stylesheet" href="../dist/output.css">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class=" bg-indigo-50 flex justify-center">
    <!-- create post modal -->
    <div class="w-full h-screen fixed z-[2] bg-black/30 hidden justify-center items-center" id="createModal">
        <div class="w-full max-w-[500px] h-fit bg-indigo-50 rounded-lg mx-[5%] md:mx-[10%] p-5 flex flex-col gap-5">
            <div class="flex w-full justify-between items-center">
                <h1 class="text-indigo-600 font-bold text-2xl">Create a Post</h1>
                <i class="bi bi-x-lg text-2xl hover:bg-indigo-200 px-1 rounded-md font-bold" id="close"></i>
            </div>
            <form action="../php/create.php" method="post" class="gap-5 flex flex-col">
                <textarea name="postText" cols="30" rows="5" placeholder="What's on your mind?" class="w-full p-5
                outline-none resize-none" required></textarea>
                <button type="submit" class="p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                outline-indigo-600 hover:opacity-80 transition-all font-medium w-[100px] self-end" name="post">Post</button>
            </form>
        </div>
    </div>

    <div class="h-screen flex flex-col relative mx-[5%] md:mx-[10%] max-w-[1440px] w-full">
        <header class="w-full flex justify-between items-center py-5">
            <p class="text-indigo-600 font-bold text-[25px]"><?php echo $username ?></p>
            <form action="../php/signout.php" method="POST">
                <button type="submit" class="p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                outline-indigo-600 hover:opacity-80 transition-all font-medium w-[100px]" name="signout">Sign out</button>
            </form>
        </header>

        <button class="fixed p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
         outline-indigo-600 hover:opacity-80 transition-all font-medium bottom-5 right-5 shadow-xl" name="" id="create">Create a Post</button>

         <div class="w-full flex flex-wrap gap-5 justify-center pb-[100px]">
            <?php
                if ($resultPost->num_rows > 0) {
                while($row = $resultPost->fetch_assoc()) {
            ?>
                <form action="../php/delete.php" method="post">
                    <div class="w-[290px] flex flex-col bg-indigo-100 rounded-lg p-5 gap-3">
                        <h1 class="font-medium text-indigo-600"><?php echo $row["username"] ?></h1>
                        <p class=""><?php echo $row["post"] ?></p>
                        <input type="hidden" name="postid" id="postid" value="<?php echo $row["postid"] ?>">
                        <div class="flex flex-row justify-end gap-4">
                            <button type="submit" class="p-2 rounded-lg bg-indigo-50 text-black focus:outline focus:outline-offset-2 focus:outline-2 
                            outline-indigo-600 hover:opacity-80 transition-all font-medium bottom-5 right-0 w-[100px]" name="comments" id="comments">Comments</button>
                            <button type="submit" class="p-2 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                            outline-indigo-600 hover:opacity-80 transition-all font-medium bottom-5 right-0 w-[100px]" name="delete" id="">Delete</button>
                        </div>
                    </div>
                </form>
            <?php
                }
                }
                else{
            ?>
                    <div>
                        <h1 class="text-[30px] font-black text-indigo-600 text-center">No post yet!</h1>
                    </div>
            <?php
                }
            ?>
         </div>
    </div>

    <script>
        // create post
        const createBtn = document.querySelector("#create");
        const createModal = document.querySelector("#createModal");
        const closeModal = document.querySelector("#close");

        createBtn.addEventListener("click", function(){
            createModal.style.display = "flex";
        });

        closeModal.addEventListener("click", function(){
            createModal.style.display = "none";
        });
    </script>
</body>
</html>