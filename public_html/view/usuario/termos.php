<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(0);
        session_start();
        if(isset($_SESSION['usuaId']) && $_SESSION['usuaId'] != ''){
            header("Location: ../../index.php");
        }
    }
    $_SESSION['dispId'] = '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solar Giro</title>
    <link rel="icon" type="image/x-icon" href="../../img/favicon/favicon.ico">
    <link rel="stylesheet" href="../../css/cadastro.css">
    <link rel="stylesheet" href="../../css/css-geral.css"> 
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function( ){
			$(".profile .icon_wrap").click(function(){
			  $(this).parent().toggleClass("active");
			});
		});
	</script>


</head> 
<body>
    <header>
    <div class="navbar">
      <div class="navbar_left">
        <a href="#"><a href="../index.php"></a>
      </div>
      <div class="navbar_center">
        <a href="../../index.php"><img src="../../img/icons/solargirologoIconW.svg"></a>
      </div> 
      <div class="navbar_right">
        <div class="profile">
        <div class="icon_wrap">
        <span class="icon"><a></a></span>
        <i class="fas fa-chevron-down"></i>
      </div>
        </div>
      </div>
    </div>
  </header>

    
    <section>
        <main class="body">
            <div class="box"  style="height: 900px; color: white;">
                <div class="form">
                    <div class="form-header">
                        <h2>Termos de licença</h2>
                    </div>
                    <div class="form-body">
                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Felis donec et odio pellentesque. Imperdiet sed euismod nisi porta lorem. Feugiat vivamus at augue eget arcu. Sit amet mattis vulputate enim nulla aliquet porttitor lacus. Dui sapien eget mi proin sed libero enim sed. Fames ac turpis egestas sed tempus urna et pharetra pharetra. Odio euismod lacinia at quis risus sed vulputate. Nunc sed id semper risus in hendrerit gravida rutrum. Tellus integer feugiat scelerisque varius. Urna id volutpat lacus laoreet non.

Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu. In massa tempor nec feugiat nisl pretium fusce id. Aliquet eget sit amet tellus. Et sollicitudin ac orci phasellus egestas tellus rutrum. Quisque non tellus orci ac auctor augue mauris augue neque. Eu sem integer vitae justo eget magna. Euismod in pellentesque massa placerat duis ultricies lacus sed. Ac turpis egestas integer eget aliquet nibh. Enim nulla aliquet porttitor lacus luctus accumsan tortor. Condimentum id venenatis a condimentum vitae sapien. Lectus vestibulum mattis ullamcorper velit sed ullamcorper. Tincidunt arcu non sodales neque sodales ut etiam. Phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam. Semper risus in hendrerit gravida rutrum quisque.

Nullam vehicula ipsum a arcu cursus vitae congue. Sapien et ligula ullamcorper malesuada proin. Nullam vehicula ipsum a arcu cursus vitae congue mauris rhoncus. Maecenas accumsan lacus vel facilisis. Id neque aliquam vestibulum morbi. Turpis massa tincidunt dui ut ornare lectus sit amet est. Ultricies leo integer malesuada nunc vel risus. Donec ac odio tempor orci. Imperdiet nulla malesuada pellentesque elit eget gravida. Donec adipiscing tristique risus nec. At risus viverra adipiscing at in tellus integer feugiat scelerisque. Ac ut consequat semper viverra nam libero. Ornare aenean euismod elementum nisi quis eleifend. Sodales ut etiam sit amet nisl. Nibh tortor id aliquet lectus proin nibh nisl. Augue ut lectus arcu bibendum at varius vel pharetra. Semper quis lectus nulla at volutpat diam ut venenatis tellus.

Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Lorem ipsum dolor sit amet consectetur adipiscing. Aliquam ut porttitor leo a. Amet est placerat in egestas. Dignissim cras tincidunt lobortis feugiat vivamus at. Sagittis vitae et leo duis ut diam. Diam in arcu cursus euismod quis viverra nibh. Id faucibus nisl tincidunt eget nullam non nisi. Faucibus a pellentesque sit amet. A pellentesque sit amet porttitor eget. Diam volutpat commodo sed egestas egestas fringilla phasellus. Gravida dictum fusce ut placerat orci nulla. Erat nam at lectus urna duis convallis.
</p>
                    </div>
                </div>
                <div class="form-footer">
                
                </div>
            </div>
        </main>
    </section>
    <script src="../../js/cadastro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>