<?php
function dd($arr) {
    if(php_sapi_name() === 'cli') {
        print_r($arr);
        echo "\n";
    } else {
        print("<pre>".print_r($arr,true)."</pre>");
    }
}

function ddd() {
    $args = func_get_args();
    foreach($args as $arg) {
        dd($arg);
    }
}

function ddc($arr) {
    if(php_sapi_name() === 'cli') {
        print_r($arr);
        echo "\n";
    } else {
        $content = str_replace("'", "\\'", print_r($arr, TRUE));
        $content = str_replace("\n", "\\n", $content);
        $content = str_replace("\r", "", $content);
        print_r('<script type="text/javascript">');
        print_r("console.log('DEBUG:');\n");
        print_r("console.log('{$content}');\n");
        print_r('</script>');
    }
}

function dddd() {
    $args = func_get_args();
    foreach($args as $arg) {
        dd($arg);
    }
    die();
}

function redirect($url) {
    header("Location: $url");
    exit;
}
