<?php 

  session_start();

  use utils\Functions;


  if(!Functions::blockPage() && !$_SESSION['user'])
    redirect('login');
  else if(!Functions::blockPage())
    $user = $_SESSION['user'];
?>

<nav>
  <ul> 
    

  <?php if(!Functions::blockPage()) { ?>
    <li><a href="/" >Home</a></li>
    <li><a href="/about" >About</a></li>
    <li><a href="/todos" >Todos</a></li>
    <li><a href="/contact" >Contact</a></li>
    <li><a href="/logout">Logout</a> </li>
  <?php } ?>
  </ul>
</nav>

   
  
