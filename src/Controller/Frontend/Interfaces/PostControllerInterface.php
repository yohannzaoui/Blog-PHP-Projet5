<?php

namespace App\Controller\Frontend\Interfaces;

/**
 *
 */
interface PostControllerInterface
{
    public function __construct();

    public function post($idPost);

    public function saveComment();
}
