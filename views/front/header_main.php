<!-- <!DOCTYPE html>
<html>
<style>
    * {
        margin: 0px;
        padding: 0px;
        font-family: Helvetica, Arial, sans-serif;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 90%;
        padding: 12px 20px;
        margin: 8px 26px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 16px;
    }

    /* Set a style for all buttons */
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 26px;
        border: none;
        cursor: pointer;
        width: 90%;
        font-size: 20px;
    }

    button:hover {
        opacity: 0.8;
    }

    /* Center the image and position the close button */
    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }

    .avatar {
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: absolute;
        z-index: 7;
        left: 0;
        top: 50;
        width: 50%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        margin-left: 400px;
    }

    /* Modal Content Box */
    .modal-content {
        background-color: #fefefe;
        margin: 4% auto 15% auto;
        border: 1px solid #888;
        width: 40%;
        padding-bottom: 30px;
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }

    /* Add Zoom Animation */
    .animate {
        animation: zoom 0.6s
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }
</style>
</style>
 signin button 

<body background="../background1.png">


    <button onclick="document.getElementById('modal-wrapper').style.display='block'" style="width:200px; margin-top:0px; margin-left:75px;">
        Login</button>

    <div id="modal-wrapper" class="modal">

        <form class="modal-content animate" action="/action_page.php">

            <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <img src="images/login.jpg" alt="Avatar" class="avatar">
                <h1 style="text-align:center">Virupedia</h1>
            </div>

            <div class="container">
                <input type="text" placeholder="Enter Username" name="uname">
                <input type="password" placeholder="Enter Password" name="psw">
                <button type="submit">Login</button>
                <input type="checkbox" style="margin:26px 30px;"> Remember me
                <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
            </div>

        </form>

    </div>

    <script>
        // If user clicks anywhere outside of the modal, Modal will close

        var modal = document.getElementById('modal-wrapper');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
 end of signin button 

<signup button 

<body background="../background2.png">


    <button onclick="document.getElementById('modal-wrapper').style.display='block'" style="width:200px; margin-top:0px; margin-left:15px;">
        Signup</button>

    <div id="modal-wrapper" class="modal">

        <form class="modal-content animate" action="">

            <div class="imgcontainer">
                <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <img src="" alt="Avatar" class="avatar">
                <h1 style="text-align:center">Virupedia</h1>
            </div>

            <div class="container">
                <input type="text" placeholder="Enter Username" name="uname">
                <input type="password" placeholder="Enter Password" name="psw">
                <button type="submit">Login</button>
                <input type="checkbox" style="margin:26px 30px;"> Remember me
                <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
            </div>

        </form>

    </div>

    <script>
        // If user clicks anywhere outside of the modal, Modal will close

        var modal = document.getElementById('modal-wrapper');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html> -->

<nav class="navbar navbar-dark py-0 bg-primary navbar-expand-lg py-md-0">
    <a class="navbar-brand" href="#">Virupedia</a>
    <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>
    <div class="navbar-collapse collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item py-0"><a href="loginsignupcss/register.html" class="nav-link">Signup</a></li>
            <li class="nav-item py-0"><a href="loginsignupcss/login.html" class="nav-link">Login</a></li>

        </ul>
    </div>
</nav>

</div>