<?php 
$var_Recordset1 = "0";
if (isset($_SESSION['MM_idAdmin'])) {
  $var_Recordset1 = $_SESSION['MM_idAdmin'];
}
mysql_select_db($database_conexion, $conexion);
$query_Recordset1 = sprintf("SELECT * FROM tbladminis WHERE tbladminis.idAdmin = %s", GetSQLValueString($var_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conexion) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!-- Left links for user info navbar -->
<ul class="user-info-menu left-links list-inline list-unstyled">

<li class="hidden-sm hidden-xs">
  <a href="#" data-toggle="sidebar">
      <i class="fa-bars"></i>
  </a>
</li>
<!--
<li class="dropdown hover-line">
  <a href="#" data-toggle="dropdown">
      <i class="fa-envelope-o"></i>
      <span class="badge badge-green">15</span>
  </a>
      
  <ul class="dropdown-menu messages">
      <li>
              
          <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
          
              <li class="active">
                  <a href="#">
                      <span class="line">
                          <strong>Luc Chartier</strong>
                          <span class="light small">- yesterday</span>
                      </span>
                      
                      <span class="line desc small">
                          This ain’t our first item, it is the best of the rest.
                      </span>
                  </a>
              </li>
              
              <li class="active">
                  <a href="#">
                      <span class="line">
                          <strong>Salma Nyberg</strong>
                          <span class="light small">- 2 days ago</span>
                      </span>
                      
                      <span class="line desc small">
                          Oh he decisively impression attachment friendship so if everything. 
                      </span>
                  </a>
              </li>
              
              <li>
                  <a href="#">
                      <span class="line">
                          Hayden Cartwright
                          <span class="light small">- a week ago</span>
                      </span>
                      
                      <span class="line desc small">
                          Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
                      </span>
                  </a>
              </li>
              
              <li>
                  <a href="#">
                      <span class="line">
                          Sandra Eberhardt
                          <span class="light small">- 16 days ago</span>
                      </span>
                      
                      <span class="line desc small">
                          On so attention necessary at by provision otherwise existence direction.
                      </span>
                  </a>
              </li>
              
              <li class="active">
                  <a href="#">
                      <span class="line">
                          <strong>Luc Chartier</strong>
                          <span class="light small">- yesterday</span>
                      </span>
                      
                      <span class="line desc small">
                          This ain’t our first item, it is the best of the rest.
                      </span>
                  </a>
              </li>
              
              <li class="active">
                  <a href="#">
                      <span class="line">
                          <strong>Salma Nyberg</strong>
                          <span class="light small">- 2 days ago</span>
                      </span>
                      
                      <span class="line desc small">
                          Oh he decisively impression attachment friendship so if everything. 
                      </span>
                  </a>
              </li>
              
              <li>
                  <a href="#">
                      <span class="line">
                          Hayden Cartwright
                          <span class="light small">- a week ago</span>
                      </span>
                      
                      <span class="line desc small">
                          Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
                      </span>
                  </a>
              </li>
              
              <li>
                  <a href="#">
                      <span class="line">
                          Sandra Eberhardt
                          <span class="light small">- 16 days ago</span>
                      </span>
                      
                      <span class="line desc small">
                          On so attention necessary at by provision otherwise existence direction.
                      </span>
                  </a>
              </li>
              
          </ul>
          
      </li>
      
      <li class="external">
          <a href="blank-sidebar.html">
              <span>All Messages</span>
              <i class="fa-link-ext"></i>
          </a>
      </li>
  </ul>
</li>

<li class="dropdown hover-line">
  <a href="#" data-toggle="dropdown">
      <i class="fa-bell-o"></i>
      <span class="badge badge-purple">7</span>
  </a>
      
  <ul class="dropdown-menu notifications">
      <li class="top">
          <p class="small">
              <a href="#" class="pull-right">Mark all Read</a>
              You have <strong>3</strong> new notifications.
          </p>
      </li>
      
      <li>
          <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
              <li class="active notification-success">
                  <a href="#">
                      <i class="fa-user"></i>
                      
                      <span class="line">
                          <strong>New user registered</strong>
                      </span>
                      
                      <span class="line small time">
                          30 seconds ago
                      </span>
                  </a>
              </li>
              
              <li class="active notification-secondary">
                  <a href="#">
                      <i class="fa-lock"></i>
                      
                      <span class="line">
                          <strong>Privacy settings have been changed</strong>
                      </span>
                      
                      <span class="line small time">
                          3 hours ago
                      </span>
                  </a>
              </li>
              
              <li class="notification-primary">
                  <a href="#">
                      <i class="fa-thumbs-up"></i>
                      
                      <span class="line">
                          <strong>Someone special liked this</strong>
                      </span>
                      
                      <span class="line small time">
                          2 minutes ago
                      </span>
                  </a>
              </li>
              
              <li class="notification-danger">
                  <a href="#">
                      <i class="fa-calendar"></i>
                      
                      <span class="line">
                          John cancelled the event
                      </span>
                      
                      <span class="line small time">
                          9 hours ago
                      </span>
                  </a>
              </li>
              
              <li class="notification-info">
                  <a href="#">
                      <i class="fa-database"></i>
                      
                      <span class="line">
                          The server is status is stable
                      </span>
                      
                      <span class="line small time">
                          yesterday at 10:30am
                      </span>
                  </a>
              </li>
              
              <li class="notification-warning">
                  <a href="#">
                      <i class="fa-envelope-o"></i>
                      
                      <span class="line">
                          New comments waiting approval
                      </span>
                      
                      <span class="line small time">
                          last week
                      </span>
                  </a>
              </li>
          </ul>
      </li>
      
      <li class="external">
          <a href="#">
              <span>View all notifications</span>
              <i class="fa-link-ext"></i>
          </a>
      </li>
  </ul>
</li>
-->
</ul>

<!-- Right links for user info navbar -->
<ul class="user-info-menu right-links list-inline list-unstyled">

<li class="dropdown user-profile">
<a href="#" data-toggle="dropdown">
<img src="../imagenes/admins/<?php echo $row_Recordset1['txtImagen']; ?>" alt="Imagen <?php echo $row_Recordset1['strNombre']; ?>" width="38" class="img-circle img-inline userpic-32" />
<span><?php echo $row_Recordset1['strNombre']; ?><i class="fa-angle-down"></i></span>
</a>
  
<ul class="dropdown-menu user-profile-menu list-unstyled">

<!--
<li><a href="#edit-profile"><i class="fa-edit"></i>New Post</a></li>

<li><a href="#settings"><i class="fa-wrench"></i>Configuraci&oacute;n</a></li>
-->
<li><a href="perfil.php"><i class="fa-user"></i>Perfil</a></li>

<!--<li><a href="#help"><i class="fa-info"></i>Ayuda</a></li>
-->      
<li class="last"><a href="cerrar_sesion.php"><i class="fa-lock"></i>Salir</a></li>

</ul>
</li>

<li>
  <a href="#" data-toggle="chat">
      <i class="fa-comments-o"></i>
  </a>
</li>

</ul>
<?php
mysql_free_result($Recordset1);
?>
