<?php


include 'db2.php';
session_start();
if ($_SESSION['login_admin'] == "") {
  header("location:index.php");
}
?>
<html>
<style>
  .usr{
    margin: -20px;;
    background-color:#197efa;
    padding-bottom: 100%;
    border: none;
  }

  .usrdetails h3 {
    text-align: center;
  }

  .usrdetails table {
    text-align: center;
    margin: 0 30% 0 30%;
    padding: 5px 15px 5px 15px;
    background-color: white;
    border: 1px solid;

  }

  .usrdetails table thead th {
    border: 1px solid;
    width: 200px;
    height: 30px;

  }

  .usrdetails table tbody tr td {
    border: 1px solid;
    width: 200px;
    height: 30px;
  }
</style>

<?php include 'side.php'; ?>

<body>
<div class="usr">
  <div class="usrdetails">
    <h3>User status</h3>
    <table>
      <thead>
        <tr>
          <th>User status</th>
          <th>User name</th>
          <th>Phone</th>
          <th>Place</th>
          <th>Role id</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $ft = mysqli_query($con, "SELECT users.*,role_db.* from users,
        role_db where users.role_id=role_db.role_id ");
        while ($f = mysqli_fetch_array($ft)) {
        ?>
          <tr>
            <td><?php echo $f['status']; ?></td>
            <td><?php echo $f['fname']; ?></td>
            <td><?php echo $f['phone']; ?></td>
            <td><?php echo $f['place']; ?></td>
            <td><?php echo $f['role_id']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      <table>
  </div>
  </div>
    <div class="usrdetails">
      <h3>Blocked workers</h3>
      <table>
        <thead>
          <tr>
            <th>User name</th>
            <th>Phone</th>
            <th>Place</th>
            <th>worker service</th>
            <th>email</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $ft = mysqli_query($con, "SELECT worker_registration_db.*,role_db.* from worker_registration_db,
                role_db where worker_registration_db.role_id=role_db.role_id and role_db.status IN ('0');");
          while ($f = mysqli_fetch_array($ft)) {
          ?>
            <tr>
              <td><?php echo $f['w_name']; ?></td>
              <td><?php echo $f['w_phone']; ?></td>
              <td><?php echo $f['w_place']; ?></td>
              <td><?php echo $f['worker_service']; ?></td>
              <td><?php echo $f['email']; ?></td> -->
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
</body>

</html>