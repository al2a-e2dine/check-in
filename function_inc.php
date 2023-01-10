<?php
//getInfoById
function getInfoById($type, $id) {
    $dbc = mysqli_connect('localhost', 'root', '', 'cow');
    mysqli_set_charset($dbc, "utf8");
    $qq = "SELECT * FROM $type WHERE id='$id'";
    $rr = mysqli_query($dbc, $qq);
    if ($rr) {
        return mysqli_fetch_assoc($rr);
    } else {
        return mysqli_error($dbc);
    }
}