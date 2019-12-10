<?php
  if(isset($_SESSION['u_uid']))
  {
    $u_id = $_SESSION['u_uid'];
  //  $u_pwd = $_SESSION['u_pwd'];
  }

$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">Exercise</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?= ($activePage == 'home') ? 'active':''; ?>"><a href="/home.php">Home</a></li>
        <li class="<?= ($activePage == 'blog') ? 'active':''; ?>"><a href="/blog.php">Blog</a></li>
        <?php
        if(isset($u_id)) {
          if ($u_id == "vaha123") {
              echo "<li class='no-active'><a href='/list.php'>List</a></li>";
          }else{ echo "";}
        } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php

        if (!isset($u_id)) {?>
                <li><p class="navbar-text">Already have an account?</p></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Sign in</b> <span class="caret"></span></a>
                      <ul id="login-dp" class="dropdown-menu">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                Login via
                                <div class="social-buttons">
                                  <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                  <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                </div>
                                                or
                                 <form class="form" method="POST" action="includes/login.php" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only">Email address</label>
                                       <input type="text" name="uid" class="form-control" id="exampleInputEmail2" placeholder="User name or email" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only">Password</label>
                                       <input type="password" name="pwd" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                     <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" name="submit" class="btn btn-primary btn-block">Sign in</button>
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> keep me logged-in
                                       </label>
                                    </div>
                                 </form>
                              </div>
                              <div class="bottom text-center">
                                New here ? <a href="#"><b>Join Us</b></a>
                              </div>
                           </div>
                        </li>
                      </ul>
                    </li>
            <?php
          }else{
              $u_first = $_SESSION['u_first'];
               ?>
                  <form method="POST" action="../includes/logout.php">
                    <input type="submit" name="submit" value="Logout" class="form-control" style="margin-top:10%;"/>
                  </form><?php
            }?>

      </ul><!-- end of right panel -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
