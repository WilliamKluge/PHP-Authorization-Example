<?php

function load($page, $pid)
{
    # Begin URL with protocol, domain, and current directory.
    $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

    # Remove trailing slashes then append page name to URL and the print id.
    $url = rtrim( $url, '/\\' ) ;
    $url .= '/' . $page . '?id=' . $pid;

    # Execute redirect then quit.
    session_start( );

    header( "Location: $url" ) ;

    exit() ;
}

?>