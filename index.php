<?php
    session_start();
    error_reporting(0);
    if($_SESSION["user"] != ""){
        header("Location: ./pages/home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhisperSec</title>
    <!-- tailwind -->
    <link href="./dist/output.css" rel="stylesheet">
</head>
<body class="px-[5%] md:px-[10%] bg-indigo-200">
    <div class="w-full h-screen flex flex-col justify-center items-center gap-6 relative">
        <!-- <img src="./src//resources/logo.png" class="w-[50vw] min-w-[300px]
            absolute top-0 z-[-1]" alt="" srcset=""> -->

        <!-- sign in -->
        <div class="max-w-[500px] w-full h-fit shadow-2xl rounded-lg hidden flex-col gap-5 p-5 bg-indigo-50 relative"
        id="signinForm">
                <img src="./src//resources/logo.png" class="w-[150px] bg-white rounded-full border-[10px] border-indigo-200
                absolute m-auto top-[-100px] self-center" alt="" srcset="">
            <div class="full mt-[40px]">
                <h1 class="text-indigo-600 font-black text-2xl">Sign in your Account</h1>
            </div>

            <form method="POST" action="./php/signin.php" class="flex flex-col gap-5 justify-center items-center">
                

                <div class="grid xs:grid-cols-2 grid-cols-1 w-full gap-3">
                    <input type="text" placeholder="Username"
                    class="p-2 outline-none border-b-2 border-indigo-600" name="inUser" id="inUser">
                    <input type="password" placeholder="Password"
                    class="p-2 outline-none border-b-2 border-indigo-600" name="inPass" id="inPass">
                </div>

                <div class="w-full flex justify-end">
                    <button type="submit" class="p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                    outline-indigo-600 hover:opacity-80 transition-all font-medium w-[100px]" name="signin">Sign in</button>
                </div>
            </form>
        </div>

        <!-- sign up -->
        <div class="max-w-[500px] w-full h-fit shadow-2xl rounded-lg hidden flex-col gap-5 p-5 bg-indigo-50 relative"
        id="signupForm">
            <img src="./src//resources/logo.png" class="w-[150px] bg-white rounded-full border-[10px] border-indigo-200
                absolute m-auto top-[-100px] self-center" alt="" srcset="">
            <div class="full mt-[40px]">
                <h1 class="text-indigo-600 font-black text-2xl">Sign up an Account</h1>
            </div>

            <form method="POST" action="./php/signup.php" class="flex flex-col gap-5">
                <div class="grid xs:grid-cols-2 grid-cols-1 w-full gap-3">
                    <input type="text" placeholder="Full Name"
                    class="p-2 outline-none border-b-2 border-indigo-600" id="upName" name="upName" required>

                    <input type="text" placeholder="Username"
                    class="p-2 outline-none border-b-2 border-indigo-600" id="upUser" name="upUser" required>

                    <input type="password" placeholder="Password"
                    class="p-2 outline-none border-b-2 border-indigo-600" id="upPass" name="upPass" required>

                    <input type="password" placeholder="Verify Password"
                    class="p-2 outline-none border-b-2 border-indigo-600" id="upVpass" name="upVpass" required>
                </div>

                <div class="w-full flex justify-end">
                    <button type="submit" class="p-3 rounded-lg bg-indigo-600 text-white focus:outline focus:outline-offset-2 focus:outline-2 
                    outline-indigo-600 hover:opacity-80 transition-all font-medium w-[100px]" name="signup">Sign up</button>
                </div>
            </form>
        </div>

        <div class="max-w-[500px] w-full grid xs:grid-cols-2 grid-cols-1 gap-3 text-center">
            <button id="signinButton" class="">Sign in</button>
            <button id="signupButton" class="">Sign up</button>
        </div>

        <div class="fixed bottom-0 w-full flex flex-col text-center bg-indigo-900 p-5 text-white">
            <h1 class="font-medium">Developed By: Jeffrey Lonzanida</h1>
        </div>
    </div>

    <script src="./index.js"></script>
</body>
</html>