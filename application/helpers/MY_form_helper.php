<?php

function set_error($input_name) {
    if (form_error($input_name)) {
      return ' has-error';
    }
}

function warning() {
    $CI = get_instance();
    if ($CI->session->warning) {
        return '<div class="alert alert-warning" role="alert">'.$CI->session->warning.'</div>';
    }
}
