<?php
session_start();

    print_r($_POST);
    if (!isset($_POST['marka'])) {
        die("<script> alert('nem szavaztal kútya')</script>");
    }
    if (!file_exists("szavazas.txt")) {
        $fp = fopen("szavazas.txt" ,"w");
		fclose( $fp );
	}

    $fp = fopen("szavazas.txt", "a");
    fwrite($fp, $_POST['marka']);
    fclose( $fp );

    $_SESSION['szavazva'] ="igen";
?>