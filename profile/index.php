<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="icon" href="../asset/svg/home/logo.svg">
  <link rel="stylesheet" href="../asset/css/profile/style.css" />
</head>

<body>
  <main>
    <div class="title">
      <h1>Profile</h1>
    </div>
     <?php 
      include ("../features/connect.php");
      $id = $_GET["id"];
      $sql = "SELECT * FROM tbl_user WHERE userId = '$id'";
      $result = mysqli_query($koneksi,$sql);
      $row = mysqli_fetch_array($result);

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        unset($_SESSION['userId']);
        header('Location: ../home/');
        exit;
      }
       ?>


     <form action="" method="POST">
        <label for="fullname">Fullname</label>
          <input type="text" name="fullname" id="fullname" value="<?= $row['fullname']?>" disabled required>
        <label for="email">Email</label>
          <input type="email" name="email" id="email" value="<?= $row['email']?>" disabled required>
        <!-- <label for="password">Password</label>
          <input type="password" name="password" id="password" value="<?= $row['password']?>" required> -->
            <button id="btn-hapus">Sign Out</button>
      </form>
      <div class="profile">
        <h1>Profile</h1>
      </div>
    </main>
    <script></script>
</body>

</html>
