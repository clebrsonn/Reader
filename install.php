<?php
$con = __DIR__ . "/lib/config/conn.php";
require_once __DIR__ . '/lib/functions.php';

if (file_exists($con)) {
    require_once $con;
} else {
    die("Config.php is not found");
}

if ($config['app.installed'] == '1') {
    $messageType = 'info';
    $message = 'Please delete "install.php" file in your root directory before launching your site';
}

$app['name'] = $config['app.title'];

createDB();


//if (isset($_POST['install']) && $_POST['install'] == '1') {
//    writeConfig(array(
//            'host' => $_POST['data']['DB_HOST'],
//            'user' => $_POST['data']['DB_USER'],
//            'password' => $_POST['data']['DB_PASSWORD'],
//            'dbname' => $_POST['data']['DB_NAME'],
//            'dbprefix' => $_POST['data']['TABLES_PREFIX'],
//            'driver' => 'pdo_mysql',
//        )
//    );
//    createDB();
//
//    //  WASD::loadConfig(ROOT_DIR . "/config.php");
//    // WASD::setDB();
//}
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title> Install <?php echo $app['name'] ?></title>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="//netdna.bootstrapcdn.com/bootswatch/3.0.3/yeti/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" media="screen"
          href="lib/vendor/twitter/bootstrap/dist/css/bootstrap.min.css">
    <!-- <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script> -->
    <script type="text/javascript" src="lib/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="lib/vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>


</head>
<body>

<div class="container">

    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Install <?php echo $app['name'] ?></h1>
            </div>
        </div>
    </div>

    <div class="bs-docs-section">

        <!-- Headings -->

        <div class="row">
            <div class="col-lg-8">
                <div class="bs-example">
                    <h3>Before installation</h3>

                    <p>
                        Please read the documentation carefully before installing. <br/>
                        Make sure your web host have the minimum requirements to run <?php echo $app['name'] ?>. <br/>
                    </p>
                    <hr>


                    <div class="clearfix"></div>


                    <hr>
                    <?php if (isset($message)): ?>
                        <div
                            class="alert alert-dismissable alert-<?php echo $messageType ?>"><?php echo $message ?></div>
                    <?php endif; ?>

                    <?php if (!isset($message) || $messageType == 'danger'): ?>
                        <h3>Insert database info</h3>
                        <br/>
                        <form class="bs-example form-horizontal" method="POST" action="">
                            <input type="hidden" name="INSTALL" value="1">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Database HOST</label>

                                    <div class="col-lg-10">
                                        <input type="text" name="data[DB_HOST]" class="form-control" id="inputEmail"
                                               required placeholder="127.0.0.1">
                                        <label>Insert an IP address will help the system run faster than a hostname. Eg.
                                            127.0.0.1 instead of localhost</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Username (*)</label>

                                    <div class="col-lg-10">
                                        <input type="text" name="data[DB_USER]" class="form-control" id="inputPassword"
                                               required placeholder="Database USER">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Password</label>

                                    <div class="col-lg-10">
                                        <input type="password" name="data[DB_PASSWORD]" class="form-control"
                                               id="inputPassword" placeholder="Database password for user above">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Database NAME</label>

                                    <div class="col-lg-10">
                                        <input type="text" name="data[DB_NAME]" class="form-control" id="inputPassword"
                                               required placeholder="Database Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Database PREFIX</label>

                                    <div class="col-lg-10">
                                        <input type="text" name="data[TABLES_PREFIX]" class="form-control"
                                               id="inputPassword" placeholder="Database Prefix (Optional)">
                                        <label>This field is optional, if you install two applications with one
                                            database, use prefix to distinguish them apart</label>
                                    </div>
                                </div>
                                <hr>

                                <h3>Site details</h3>
                                <br/>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">SITE NAME</label>

                                    <div class="col-lg-10">
                                        <input type="text" name="data[UNIK_SITE]" class="form-control"
                                               id="inputPassword" required placeholder="<?php echo $app['name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">SITE URL</label>

                                    <div class="col-lg-10">
                                        <input type="url" name="data[UNIK_URL]" class="form-control" id="inputPassword"
                                               required placeholder="http://hyteck.com.br">

                                    </div>
                                </div>

                                <hr>
                                <h3>Insert Admin username and password</h3>
                                <br/>

                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Username</label>

                                    <div class="col-lg-10">
                                        <input type="text" name="data[AD_USERNAME]" required class="form-control"
                                               id="inputUser" placeholder="ADMIN">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email</label>

                                    <div class="col-lg-10">
                                        <input type="email" name="data[AD_EMAIL]" required class="form-control"
                                               id="inputEmail" placeholder="admin@hyteck.com.br">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Password</label>

                                    <div class="col-lg-10">
                                        <input type="password" name="data[AD_PW]" required class="form-control"
                                               id="inputPassword" placeholder="PASSWORD">
                                    </div>
                                </div>
                                <input type="hidden" name="install" value="1">
                                <button type="submit" class="btn btn-info col-lg-offset-2">Install</button>

                        </form>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </div>

</div>

</body>
</html>