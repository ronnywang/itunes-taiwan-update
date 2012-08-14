<?php

class IndexController extends Pix_Controller
{
    public function indexAction()
    {
        header('Content-Type: application/rss+xml');
    }

    public function listAction()
    {
    }
}
