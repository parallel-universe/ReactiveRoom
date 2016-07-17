<?php
namespace ReactiveRoom;

class TwigLoaderFactory
{
    public function create()
    {
        return new \Twig_Loader_Filesystem(__DIR__ . '/../');
    }
}
