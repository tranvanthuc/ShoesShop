<?php 
  session_start();

  function blockPage() 
  {
    $blockRoutes = ['login'];
    $currentUri = $_SERVER['REQUEST_URI']; //todos/edit/....

    foreach($blockRoutes as $route) 
    {
      if(strpos($currentUri, $route)){
        return true;
      }
    }

    return false;
  }


  if(!blockPage() && !$_SESSION['user'])
    redirect('login');
  else if(!blockPage())
    $user = $_SESSION['user'];
?>

<nav>
  <ul> 
    

  <?php if(!blockPage()) { ?>
    <li><a href="/" >Home</a></li>
    <li><a href="/about" >About</a></li>
    <li><a href="/todos" >Todos</a></li>
    <li><a href="/contact" >Contact</a></li>
    <li><a href="/logout">Logout</a> </li>
  <?php } ?>
  </ul>
</nav>

   
  
