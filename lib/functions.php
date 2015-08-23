<?php

/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 22/08/2015
 * Time: 21:22
 */
class functions
{

    private static $definitions = array();
    private static $language = "";


    public function IP()
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
    public function createSession()
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

    public function transformDate($dateEN)
    {
        //$dateEN = "2011-07-22";
        $dateBR = date("d/m/Y", strtotime($dateEN));
        //print $dataBR; // Imprime: 22/07/2011
        return $dateBR;
    }

    public function unzipArchive()
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



    public static function saveDefinitions($values)
    {
        // Include the config file so we can re-write the values contained within it.
        if (file_exists($file = LANG_PATH . "/" . C('app.language') . "/definitions.php")) include $file;

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

    public static function loadLanguage($language = "")
    {
        // Clear the currently loaded definitions.
        self::$definitions = array();

        // If the specified language doesn't exist, use the default language.
        self::$language = file_exists(LANG_PATH . "/" . sanitizeFileName($language) . "/definitions.php") ? $language : C("app.language");

        // Load the main definitions file.
        $languagePath = LANG_PATH . "/" . sanitizeFileName(self::$language);
        self::loadDefinitions("$languagePath/definitions.php");

        // Loop through the loaded plugins and include their definition files, if they exist.
        foreach (C("app.enabledPlugins") as $plugin) {
            if (file_exists($file = "$languagePath/definitions." . sanitizeFileName($plugin) . ".php"))
                self::loadDefinitions($file);
        }

    }


}