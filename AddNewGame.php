<?php
session_start();
$organizerID = $_SESSION['userid'];
$action = "";
if (isset($_GET['action']))
{
  $action = $_GET['action'];
}


$_SESSION['logged_in'];
$userName = $_SESSION['name'];

if ($_SESSION['logged_in'] == 'player' || $_SESSION['logged_in'] ==null){
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title> Add New Game</title>

  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <link rel="stylesheet" type="text/css" href="css/nav_footer.css">
</head>

<body>
  <header>
    <!-- Navigator -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container"><a href="admin.php" class="navbar-brand nav-title"><img src="img/logo.png" width="40">
          Treasure: Be The King</a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
          class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

        <div id="navbarSupportedContent" class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="admin.php" class="nav-link text-uppercase font-weight-bold">Home <span
                  class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a href="orgProfile.php" class="nav-link text-uppercase font-weight-bold"><?php echo $userName?></a></li>

            <li class="nav-item"><a href="processLogout.php" class="nav-link text-uppercase font-weight-bold">Logout</a>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end Navigator -->

  </header>

  <main>

    <div id="addgame" class="newGamebg">
      <h1 class="container" style="border-radius: 25px; ">Add New Game</h1>

<?php if($action == 'error')
echo '<div class="container text-center alert alert-danger" role="alert"> Please Enter Correct Input </div>';
    
?>

      <div class="mt-2 card container">
        <form style="margin: 20px; border-radius: 25px; " method="post" action="processNewGame.php" enctype = "multipart/form-data">

          <div class="form-row pb-4">
            <label class="font-weight-bold">Title</label>
            <input type="text" name="gameTitle" class="form-control" placeholder="Title" required>
          </div>

          <div class="form-row pb-4">
            <label class="font-weight-bold">Venue</label>
            <input type="text" name="gameVenue" class="form-control" placeholder="Venue" required>
          </div>

          <div class="form-row pb-4">
            <div class="form-group col-md-6">
              <label class="font-weight-bold">Date</label>
              <input type="date" name="gameDate" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
              <label class="font-weight-bold">Time</label>
              <input type="time" name="gameTime" class="form-control" required>
            </div>

          </div>

          <div class="form-row pb-4">
          <div class=" form-group col-md-6">
            <label class="font-weight-bold">Game Description</label>
            <textarea class="form-control" name="gameDesc" rows="5" id="comment" required></textarea>
          </div>

          <div class=" form-group col-md-6">
            <label class="font-weight-bold">Game Instruction</label>
            <textarea class="form-control" name="gameInstr" rows="5" id="comment" required></textarea>
          </div>
        </div>

          <div class="form-row pb-4">

            <div class="form-group col-md-4">
              <label class="font-weight-bold">Maximum Team</label>
              <input type="number" name="gameMaxTeam" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group pb-4">
              <label class="font-weight-bold">Fee</label>
              <div class="input-group">
                <span class="input-group-text">RM</span>
                <input type="number" step=0.01 name="gameFee" class="form-control" placeholder="Fee" required>
              </div>
            </div>

            <div class="col-md-6 form-group pb-4">
              <label class="font-weight-bold">Registeration Due Date</label>
              <input type="date" name="gameRegisterDue" class="form-control" required>
            </div>
          </div>


          <div class="form-row pb-4">
            <div class="col-6">
              <label class="font-weight-bold">Poster or any photo related</label>
              <div class="custom-file">
                <input type="file" name="gamePhotoID" >
              </div>
            </div>
          </div>

          <div class="pb-3 text-center">
            <input type="submit" class="btn btn-primary font-weight-bold"></input>
            <input type="reset" class="btn btn-secondary font-weight-bold"></input>
            <a href="admin.php" type="button" class="btn btn-danger font-weight-bold"> Cancel</a>

          </div>

        </form>
      </div>

    </div>
  </main>

  <!-- ======= Footer ======= -->
  <footer class="site-footer">

    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">Treasure: <i>Be The King </i> is the largest online destination dedicated to treasure
            hunt game. Here you can discover new games from various of organizer. Join game and win the prize.</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Tag</h6>
          <ul class="footer-links">
            <li><a href="index.html#about">About Us</a></li>
            <li><a href="index.html#team">Our Team</a></li>
            <li><a href="index.html#contact">Contact Us</a></li>

          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="admin.php">Home</a></li>
            <li><a href="processLogout.php">Logout</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
            <a href="#">Treasure: Be the King</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="js/admin.js"></script>

</body>

</html>