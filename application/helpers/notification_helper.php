<?php

/**
 * Formatting provided to string to toastr notification format
 * @param  [string] $type    [required]
 * @param  [string] $message [required]
 * @param  [string] $title   [required]
 * @return [string]          [formatted string]
 */
function message($type="success", $message="Your messge appear here", $title="Your Title"){

    $msg = 'toastr.'.$type.'("'.$message.'", "'.$title.'")';
    return $msg;

}



/**
 * Formatting provided to string to toastr notification format
 * @param  [string] $type    [required]
 * @param  [string] $message [required]
 * @param  [string] $title   [required]
 * @return [string]          [formatted string]
 */
function swal_message($type="success", $message="Your messge appear here", $title="Your Title"){

    $msg = 'Swal.fire({
            title: "'.$title.'",
            text: "'.$message.'",
            icon: "'.$type.'",
          })';
    return $msg;

}
