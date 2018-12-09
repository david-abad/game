

<head>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
   <meta charset="utf-8">
   <meta name="theme-color" content="#212121" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @font-face {
            font-family: 'GoogleFont';
            src: url('Producto Sans Regular.ttf');
        }
        @font-face {
            font-family: Space;
            src: url('SPACEBAR.ttf');
        }
        html, body{
            background-image: url("background.jpeg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        .title{
            margin-bottom: 50px;
            color: white;
            font-family: Space;
        }

        .card{
            background: rgba(21, 21, 21, 0.9) !important;
            color: white;
            font-family: 'GoogleFont';
            border-radius: 20px !important;
        }

        .btn{
            border-radius: 50px !important;
            margin-left: 10px;
            transition: 0.5s;
            margin-top: 5px;
        }

        .btn:hover{
            border: 2px solid white !important;
        }

        .btn-facebook{
            background-image: radial-gradient(circle, #3b5998, #324e88, #2a4278, #213768, #182d59);
        }

        .btn-google{
            background-image: radial-gradient(circle, #ea4335, #d43628, #be291b, #a91c0e, #940b00);
        }
        
        .btn-github{
            background-image: radial-gradient(circle, #333333, #282828, #1d1d1d, #121212, #000000);
        }
        
        .btn-gitlab{
            background-image: radial-gradient(circle, #fca326, #f88d22, #f27522, #eb5d25, #e24329);
        }
        
        
        
    </style>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-social.css">
<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130570879-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130570879-1');
</script>

</head>
<body>

                               
   
     <style >
        

     </style>
<p>
                                      

</p>
<div class="container" >
    <div class="row justify-content-center">
        <h1 class="title">Juego TSW</h1>
    </div>
    <div class="row justify-content-center" >
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header" style="font-size: 28px; font-weight: 100;">{{ __('Iniciar Sesión') }}</div>
                <div class="card-body">
                    <form method="POST" action="/login">
                        @csrf                     
                        <div class="form-group ">
                            <div class="justify-content-center">
                                  <p>
                                      <label>Ingresa con alguna red social o plataforma de desarrollo:</label>
                                  </p>
                                <a  href="/login/facebook" class="btn btn-social-icon btn-facebook btn-lg"><span class=""><img src="https://img.icons8.com/ios-glyphs/30/ffffff/facebook.png" style="margin-top: 7px;"/span></a>

                                 <a  href="/login/google" class="btn btn-social-icon btn-google btn-lg"><span class=""><img src="https://img.icons8.com/ios-glyphs/30/ffffff/google-logo.png" style="margin-top: 7px;"></span></a>
                                 <a  href="/login/github" class="btn btn-social-icon btn-github btn-lg"><span class=""><img src="https://img.icons8.com/ios-glyphs/30/ffffff/github.png" style="margin-top: 7px;"></span></a>
                                 <a  href="/login/gitlab" class="btn btn-social-icon btn-gitlab btn-lg"><span class=""><img src="https://img.icons8.com/ios/30/ffffff/gitlab-filled.png" style="margin-top: 7px;"></span></a>
                                
                               

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>



