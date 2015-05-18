<?php

namespace Acme\LearnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BatteryController extends Controller
{
    public function showAction()
    {
        return new Response('hello world');
    }

    public function addAction()
    {
        return new Response('hello world2');
    }
}
