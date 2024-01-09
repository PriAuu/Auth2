<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/assets/style//nav.css">
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url('') ?>">
        CARE BEARS
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Home page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Product list</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('edit_profile') ?>">Edit Profile</a>
          </li>

          <?php if (empty($this->session->userdata['email'])) { ?>

            <div style="margin-left:auto;">
              <div class="font nav-item">
                <li class="nav-item">
                  <a class="nav-link active text-light font20 login" aria-current="page" href="<?php echo base_url('auth/login') ?>">Login</a>
                </li>
              </div>
            </div>
            <div>
              <li class="nav-item">
                <a class="nav-link active text-light font20 register" aria-current="page" href="<?php echo base_url('auth/register') ?>">Register</a>
              </li>
            </div>
            <div style="width: 40px;"></div>

          <?php } else { ?>

            <li class="nav-item">
              <a href="<?php echo base_url('logout') ?>"><button type="submit" class="btn btn-danger">Log Out</button></a>
            </li>

          <?php } ?>

        </ul>
      </div>
    </div>
  </nav>
</body>

</html>