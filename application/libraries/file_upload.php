<?php
defined('BASEPATH') or exit('No direct script access allowed');

class file_upload
{
    public function _sanitize_name($filename)
    {
        $filename = $this->_remove_invisible_characters($filename, FALSE);
        $filename = preg_replace('/^\d+/', '_', $filename);
        return $filename;
    }
}
