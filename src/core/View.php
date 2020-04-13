<?php

class View
{

    function generate($content_view, $layout, $data = null)
    {
        if(is_array($data)) {
            extract($data);
        }

        include 'src/views/' . $layout;
    }
}
