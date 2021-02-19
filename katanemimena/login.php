<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Σύνδεση</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="text-center">
        <img src="https://www.hua.gr/files/logo.png" alt="har-logo" style="width:400px;height:100px;" >
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="modal-title">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <p id="modal-text">Modal body text goes here.</p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">ΟΚ</button>
				      </div>
				    </div>
				  </div>
				</div>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/77/Harokopio_University_Main_Premises.jpg"alt="har-pic" style="width:470px;height:390px;" >
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Σύνδεση</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Κωδικός">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <a id="loginBtn" class="btn btn-primary btn-user btn-block">
                                            Σύνδεση
                                        </a>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Ξέχασα τον κωδικό.</a>
                                    </div>
                                    <!-- 
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
     $("#loginBtn").click(function(e){
                e.preventDefault();
				var xhrSearchFields = new XMLHttpRequest();
                var tmp = new FormData();
				xhrSearchFields.onreadystatechange = function() {
                    if ((xhrSearchFields.readyState==XMLHttpRequest.DONE)&&(xhrSearchFields.status==200)) {
                        console.log(xhrSearchFields.responseText);
                        var data = JSON.parse(xhrSearchFields.responseText);
                        console.log(data["isValid"]);

                        if(!data["isValid"]){
                            document.getElementById("modal-title").innerHTML = "Unable to connect";
                            document.getElementById("modal-text").innerHTML = "Email and Password don't match<br>Please try again!"                    
					        $("#myModal").modal('show');
                           
                        }else{
                            window.location.href = "/katanemimena/index.php";
                        }
                        
                    }
                    
                }
                tmp.append("email",document.getElementById("email").value);
                tmp.append("password",document.getElementById("password").value);
				xhrSearchFields.open('POST', 'api/login.php', true);
				xhrSearchFields.send(tmp);
    });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>