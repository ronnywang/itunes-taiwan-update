<?php

class Movie extends Pix_Table
{
    public function init()
    {
        $this->_primary = 'id';
        $this->_name = 'movie';

        // http://itunes.apple.com/tw/movie/bian-fu-xia-kai-zhan-shi-ke/id534463913?l=zh
        // => 534463913
        $this->_columns['id'] = array('type' => 'int');
        $this->_columns['url'] = array('type' => 'text');
        $this->_columns['description'] = array('type' => 'text');
        $this->_columns['created_at'] = array('type' => 'int');
    }
}
