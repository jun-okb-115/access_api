<?php

class img_base64 extends CI_Controller {

    public function img()
    {
        $url = 'https://images.unsplash.com/photo-1506361797048-46a149213205?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=493e200df17b54d1ef10eb61e1df148a&amp;auto=format&amp;fit=crop&amp;w=2850&amp;q=80';
        $img = file_get_contents($url);
        header('Content-type: image/png');
        echo $img;
    }

    public function base64()
    {
        $url = 'https://images.unsplash.com/photo-1506361797048-46a149213205?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=493e200df17b54d1ef10eb61e1df148a&amp;auto=format&amp;fit=crop&amp;w=2850&amp;q=80';

        $base64 = base64_encode(file_get_contents($url));

        $src = sprintf('data:image/jpg;base64,%s', $base64);
        printf('<img src="%s" height="400" width="680" alt="base64" />', $src);
    }

    public function img_download()
    {

        $url = 'https://images.unsplash.com/photo-1506361797048-46a149213205?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=493e200df17b54d1ef10eb61e1df148a&amp;auto=format&amp;fit=crop&amp;w=2850&amp;q=80';
        $img = file_get_contents($url);
    }
}