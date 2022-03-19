<!DOCTYPE HTML>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@200&display=swap" rel="stylesheet">

    <title>
        The Block   
    </title>
    <head>

    </head>

    <body>
        <section class="Form my-4 mx-5">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <img src="index_wallpapers/loginbanner.jpg" class="img-fluid">
                    </div>
                    <div class="col-lg-7 px-lg-5 py-lg-5">
                        <h1 class="font-weight-bold py-5"> The Block </h1>
                        <h4> Log In</h4>
                        <form action ="checklogin.php" method="POST">
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <input type="text" placeholder="Username" name="username" class="form-control my-3 p-3" required="required">
                                </div>
                                <div class="form-row">  
                                    <div class="col-lg-7">
                                    <input type="password" placeholder="Password" name="password" class="form-control my-3 p-3" required="required">
                                </div>
   
                                    <div class="form-row">
                                        <div class="col-lg-7">
                                            <input type="submit" value="Login" class="btn1"/>
                                        </div>
                                <P>Don't have an account? <a href="register.php">Register here</a></P>                 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>  

        


    </body>




</html>
