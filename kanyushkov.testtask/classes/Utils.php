<?php

namespace NK;

class Utils {
    public static function dump(...$vars) {
        $file = fopen($_SERVER["DOCUMENT_ROOT"] . "/log.txt", 'a');
        $time = date("H:i:s ");
        fwrite($file, $time . str_repeat("=", 30) . "\n");
        foreach ($vars as $var) {
            fwrite($file, print_r($var, true) . "\n\n");
        }
        fclose($file);
    }

    public static function dumpCallStack($full = false) {
        $stacktrace = debug_backtrace();
        unset($stacktrace[0]); // hide dumpCallStack call
        if ($full) {
            Utils::dump($stacktrace);
            return;
        }
        $res = '';
        foreach($stacktrace as $n => $node) {
            $res .= "$n. ".basename($node['file']) .": " .$node['function'] ." (" .$node['line'].")\n";
        }
        Utils::dump($res);
    }
}
