<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_logged_in()
{
    $ci = get_instance();
    if ( ! $ci->session->userdata('logged_in'))
    {
        redirect('auth');
    }
}