<?php

/**
 * MyGist
 * 
 * MIT License
 * 
 * Copyright (c) 2019 Julio Hurtado Jerves
 */

$plugins->add_hook("parse_message", "gist_run");

if (!defined("IN_MYBB")) {
    die('Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.');
}
function gist_info()
{
    return array(
        "name" => "MyGist",
        "description" => "Embed gist in posts ",
        "website" => "https://ilvermorny.xyz",
        "author" => "Juliens",
        "authorsite" => "https://ilvermorny.xyz",
        "version" => "1.0",
        "guid" => "",
        "compatibility" => "18*"
    );
}
function gist_activate()
{
}

function gist_deactivate()
{
}
function gist_run($message)
{
    $message = preg_replace(
        '#\[gist\]https:\/\/gist\.github\.com\/(.*)\/([a-zA-Z0-9]+)\[\/gist\]#i',
        '<script src="https://gist.github.com/$1/$2.js"></script>',
        $message
    );
    return $message;
}

?>
