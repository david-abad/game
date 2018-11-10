<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Space Figther 3000</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <style>
      @font-face {
        font-family: Space;
        src: url('SPACEBAR.ttf');
      }
      @font-face {
        font-family: New Space;
        src: url('New Space.ttf');
      }
      h1{
        font-family: Space;
        text-align: center;
        text-shadow: 2px 2px black;
        font-size: 60px;
      }
      .dropdown-content{
        width: 250px;
        rigth: 25px !important;
      }
      .dropdown_element:hover{
        background-color: #212121 !important;
      }
    </style>
  </head>
  <body class="black">
    <header>
      <nav class="grey darken-4 z-depth-0">
        <div class="nav-wrapper">
          <a href="#" class="brand-logo" style="font-family: Space; margin-left: 25px;">Space Fighter</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a class="dropdown-trigger valign-wrapper" data-target='user_dropdown'><img class="left" src="moon_avatar.png" style="width:50px; padding:5px;">Username</a></li>
          </ul>
        </div>
      </nav>
    </header>


    <!-- Dropdown Structure -->
    <ul id='user_dropdown' class='dropdown-content grey darken-3'>
      <li class="dropdown_element"><a class="white-text">Cambiar avatar</a></li>
      <li class="divider" tabindex="-1"></li>
      <li class="dropdown_element"><a class="white-text">Cerrar sesión</a></li>
    </ul>
  </body>
    <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.dropdown-trigger').dropdown({ constrainWidth: false, closeOnClick: false, coverTrigger: false });
      $('select').formSelect();
    });
  </script>
</html>
