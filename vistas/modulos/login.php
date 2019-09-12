<div id="back"></div>

  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>

<div class="bodyfondo">
  <!-- <h1 style="margin-top: 50px;margin-bottom: 50px;">Ingenieria de Bioservicios</h1> -->
  <a href="http://ingbioservicios.com.co/"><img style="margin-top: 50px;margin-bottom: 50px;" src="vistas/img/plantilla/Logoreal.png"></a>
  <div class="w3ls-login">
    <!-- form starts here -->
    <form method="post">
      <div class="agile-field-txt">
        <label>
          <i class="fa fa-user" aria-hidden="true"></i> Usuario :</label>
        <input type="text" name="ingUsuario" required/>
      </div>
      <div class="agile-field-txt">
        <label>
          <i class="fa fa-lock" aria-hidden="true"></i> Contraseña :</label>
        <input type="password" name="ingPassword" placeholder="" id="myInput" />
        <div class="agile_label">
          <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
          <label class="check" for="check3">Mostrar Contraseña</label>
        </div>
      </div>
      <script>
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
      </script>
      <!-- //script for show password -->
      <div class="w3ls-login  w3l-sub">
        <input type="submit" value="Ingresar">
      </div>
       <?php
 
        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>
    </form>
  </div>
  <!-- //form ends here -->
  <!--copyright-->
  <div class="copy-wthree">
    <p>© 2018 Ingebioservicios | Creado Por
      <a href="https://marktech.co" target="_blank">Marktech</a>
    </p>
  </div>
  </div>

  <!--//copyright-->
