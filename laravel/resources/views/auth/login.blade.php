

<head>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <style>
       body{
            background-image: url("background.jpeg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;

        }   

        .btn{

            
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


    <div class="row justify-content-center" >
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header" >{{ __('TSW Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="/login">
                        @csrf                     
                        <div class="form-group ">
                            <div class="col-md-10 ">
                                  <p>
                                      <label>Ingresa con alguna red social</label>
                                  </p>
                                <a  href="/login/facebook" class="btn btn-social-icon btn-facebook btn-lg"><span class=""><img src="https://img.icons8.com/ios-glyphs/30/ffffff/facebook.png" style="margin-top: 7px;"/span></a>

                                 <a  href="/login/google" class="btn btn-social-icon btn-google btn-lg"><span class=""><img src="https://img.icons8.com/ios-glyphs/30/ffffff/google-logo.png" style="margin-top: 7px;"></span></a>
                                 <a  href="/login/github" class="btn btn-social-icon btn-github btn-lg"><span class=""><img src="https://img.icons8.com/ios-glyphs/30/ffffff/github.png" style="margin-top: 7px;"></span></a>
                                <a  href="/login/linkedin" class="btn btn-social-icon btn-linkedin btn-lg"><span class=""><img src="https://img.icons8.com/ios-glyphs/30/ffffff/linkedin-2.png" style="margin-top: 7px;"></span></a>
                                <a  href="/login/instagram" class="btn btn-social-icon btn-instagram btn-lg"><span class=""><img src="https://img.icons8.com/ios-glyphs/30/ffffff/instagram-new.png" style="margin-top: 7px;"></span></a>
                                 
                                 <a  href="/login/gitlab" class="btn btn-social-icon btn-foursquare btn-lg"><span class=""><img src="https://img.icons8.com/ios/30/ffffff/gitlab-filled.png" style="margin-top: 7px;"></span></a>
                                
                               

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>



