<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?version=2">
    <link rel="stylesheet" href="../responsive.css">
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign up</title>
    <style>
    section {
        top: 2%;
        height: 97%;
    }
    </style>
</head>

<body>
    <?php
session_start();
if(isset($_SESSION['error'])){
    echo '<div style="z-index:2;" class="alert alert-warning d-flex alert-dismissible align-items-center fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div> Error    ' . $_SESSION['error'] .  ' 
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    session_destroy();      
}
if(isset($_SESSION['success'])){
    echo '<div style="z-index:2;" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!  </strong> ' . $_SESSION['success'] .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  unset($_SESSION['success']); 
    header("refresh:1;url=../../");
}

?>
    <section>
        <form action="handle.php" method="post">
            <!--to be changed-->
            <div class="container">
                <lord-icon
                    onclick="window.location.href = '../../'"
                    src="https://cdn.lordicon.com/iifryyua.json" 
                    trigger="hover"
                    style="width:40px;height:40px;transform: rotate(180deg);display: inline-block;position: relative;left:18px;"><!--to be changed-->
                </lord-icon>
                <div class="heading font">
                    Sign up
                </div>
                <div class="inputs">
                    <div>
                        <input maxlength="20" name="name" type="text" required>
                        <label class="font">Username</label>
                    </div>
                    <div>
                        <input maxlength="30" name="email" type="email" required>
                        <label class="font">Email</label>
                    </div>
                    <div>
                        <input maxlength="20" name="pass" id="pass" class="pass" type="password" required>
                        <label class="font">Password</label>
                    </div>
                    <div>
                        <input maxlength="20" name="cpass" id="cpass" class="cpass" type="password" required>
                        <label class="font">Confirm Password</label>
                    </div>
                </div>
                <div class="toggle">
                    <input onclick="seePass()" class="hover" type="checkbox" id="check">
                    <p class="font">Show Password</p>
                </div>
                <div class="captcha">
                    <div class="g-recaptcha" data-sitekey="6LdUyigfAAAAAHCuKxdb3PQot6s-N_k5fXwKSpRc"></div>
                </div>
                <div class="submit">
                    <button class="hover" type="submit">Sign up</button>
                </div>
                <div class="refer">
                    <p class="font">Already have an Account?</p><a href="../login/">Log in</a>
                    <!--to be changed-->
                </div>
            </div>
        </form>
    </section>
</body>

</html>

<script>
const pass = document.querySelector('#pass');
const cpass = document.querySelector('#cpass');

function seePass() {
    if (pass.type === "password" && cpass.type === "password") {
        pass.type = "text";
        cpass.type = "text";
    } else {
        pass.type = "password";
        cpass.type = "password";
    }
}
</script>
<a href="/index.php"></a>
<!-- email @ icon 

<lord-icon
    src="https://cdn.lordicon.com/iicmtpsq.json"
    trigger="hover"
    style="width:250px;height:250px">
</lord-icon>

-->

<!-- avatar or username icon

<lord-icon
    src="https://cdn.lordicon.com/dklbhvrt.json"
    trigger="hover"
    style="width:250px;height:250px">
</lord-icon>

-->

<!-- arrow icon

<lord-icon
    src="https://cdn.lordicon.com/iifryyua.json"
    trigger="hover"
    style="width:250px;height:250px">
</lord-icon>

-->