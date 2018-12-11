<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="controls/DataTables/datatables.min.css">
</head>

<body>
    <div class="login-card"><img src="assets/img/logo.jpeg" class="profile-img-card">
        <p class="profile-name-card"> </p>
        <form class="form-signin" method="get" action="login.php"><span class="reauth-email"> <span>OpenData Tanjungpinang</span></span>
            <input class="form-control" type="text" required="" placeholder="NIP" autofocus="" name="uname">
            <input class="form-control" type="password" required="" placeholder="Password" name="pass">
            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Login</button>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="controls/DataTables/datatables.min.js"></script>
    <script>
        $('.table').DataTable();
    </script>
</body>

</html>