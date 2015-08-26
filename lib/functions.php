<?php
/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 22/08/2015
 * Time: 21:22
 */

function IP()
{
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if ($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if ($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

//Session_start

function createSession()
{
    // Recommended way for versions of PHP >= 5.4.0:
    if (session_status() == PHP_SESSION_NONE && !headers_sent()) {
        session_start();
    }

//        // For versions of PHP < 5.4.0:
//        if (session_id() == '' && !headers_sent()) {
//            session_start();
//        }
}

function transformDate($dateEN)
{
    //$dateEN = "2011-07-22";
    $dateBR = date("d/m/Y", strtotime($dateEN));
    //print $dataBR; // Imprime: 22/07/2011
    return $dateBR;
}

function unzipArchive()
{
    $url = "http://www.site.com/file.zip"; // Set here the URL to download from.

    set_time_limit(600); // Max time to execute this script: 600 = 10 minutes.

    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $filename = dirname(__FILE__) . '/' . substr(strrchr($url, '/'), 1);
        exec("wget $url -O $filename");
        echo "File download complete.";
        $zip = new ZipArchive;
        $res = $zip->open($filename);
        if ($res === TRUE) {
            $zip->extractTo(dirname(__FILE__) . '/' . pathinfo($filename, PATHINFO_FILENAME));
            $zip->close();
            echo ' Unzip complete.';
        }
        unlink(__FILE__); // Delete this file from server, for security reasons.
    } else {
        echo "Invalid URL. Plase, fix it.";
    }

}


function saveDefinitions($values)
{
    // Include the config file so we can re-write the values contained within it.
    if (file_exists($file = LANG_PATH . "/" . $config['app.language'] . "/definitions.php")) include $file;

    // Now add the $values to the $config array.
    if (!isset($definitions) or !is_array($definitions)) $definitions = array();
    $update = array();
    unset($values['action']);
    foreach ($values as $key => $value) {
        $update[$key] = $value;
    }
    $definitions = array_merge($definitions, $update);
    self::$definitions = array_merge(self::$definitions, $update);

    // Finally, loop through and write the config array to the config file.
    $contents = "<?php\n";
    foreach ($definitions as $k => $v) $contents .= '$definitions["' . $k . '"] = ' . var_export($v, true) . ";\n";
    $contents .= "\n// Last updated by @ " . date("r") . "\n?>";
    file_put_contents($file, $contents);
}

//    public static function loadLanguage($language = "")
//    {
//        // Clear the currently loaded definitions.
//        self::$definitions = array();
//
//        // If the specified language doesn't exist, use the default language.
//        self::$language = file_exists(LANG_PATH . "/" . sanitizeFileName($language) . "/definitions.php") ? $language : C("app.language");
//
//        // Load the main definitions file.
//        $languagePath = LANG_PATH . "/" . sanitizeFileName(self::$language);
//        self::loadDefinitions("$languagePath/definitions.php");
//
//        // Loop through the loaded plugins and include their definition files, if they exist.
//        foreach (C("app.enabledPlugins") as $plugin) {
//            if (file_exists($file = "$languagePath/definitions." . sanitizeFileName($plugin) . ".php"))
//                self::loadDefinitions($file);
//        }
//
//    }

//
//    public function C($key, $default = null)
//    {
//        return self::config($key, $default);
//    }
//
//    // CONFIGURATION
//
//    public static function loadConfig($file)
//    {
//        include $file;
//        self::$config = array_merge(self::$config, $config);
//    }
//
//    protected static function config($key, $default = null)
//    {
//        return isset(self::$config[$key]) ? self::$config[$key] : $default;
//    }

function writeConfig($wConfig = array())
{
    $file = __DIR__ . '/config/conn2.php';
    $wConfig['host'] = addslashes($wConfig['host']);
    $wConfig['user'] = addslashes($wConfig['user']);
    $wConfig['password'] = addslashes($wConfig['password']);
    $wConfig['dbname'] = addslashes($wConfig['dbname']);

    $content = '<?php ';

    $conn = array();

    foreach ($wConfig as $conf => $value) {
        $content .= '$' . "conn['$conf'] = '$value';";
    }

    //$h = fopen('configDB.php', 'w+');
    file_put_contents($file, $content);
}

function createDB()
{

// replace with file to your own project bootstrap
    require_once dirname(dirname(__FILE__)) . '/bootstrap.php';
    $tool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
    $classes = array(
        $entityManager->getClassMetadata('user'),
        $entityManager->getClassMetadata('Entities\Profile')
    );
    $tool->createSchema($classes);
}