<?php

function admin_template($view, $data)
{
    $tampilan = get_instance();
    $tampilan->load->view('backend_template/header.php', $data);
    $tampilan->load->view('backend_template/sidebar.php');
    $tampilan->load->view('backend_template/topbar.php');
    $tampilan->load->view($view);
    $tampilan->load->view('backend_template/footer.php');
}

function customer_template($view, $data)
{
    $tampilan = get_instance();
    $tampilan->load->view('frontend_template/header.php', $data);
    $tampilan->load->view('frontend_template/topbar.php');
    $tampilan->load->view($view);
    $tampilan->load->view('frontend_template/footer.php');
}

function deleteImage($deleted_image, $path)
{
    preg_match_all('/<img[^>]+>/i', $deleted_image, $imgTags);
    for ($i = 0; $i < count($imgTags[0]); $i++) {
        preg_match('/src="([^"]+)/i', $imgTags[0][$i], $imgage);
        $images[] = str_ireplace('src="', '',  $imgage[0]);
    }

    foreach ($images as $image) {
        $extract = explode('/', $image);
        $img = end($extract);

        $thumbnail = $path . $img;
        if (is_file($thumbnail)) {
            unlink($thumbnail);
        }
    }
}
