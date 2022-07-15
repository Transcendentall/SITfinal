<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

require_once join(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'vendor', 'autoload.php']);

class Viewer
{
    private string $templatesPath;
    private Environment $view;
    private FilesystemLoader $loader;

    public function __construct()
    {
        $this->templatesPath = join(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'templates']);
        $this->loader = new FilesystemLoader($this->templatesPath);
        $this->view = new Environment($this->loader);
    }

    public function show(string $path)
    {
        try
        {
            echo $this->view->render($path);
        }
        catch (LoaderError|RuntimeError|SyntaxError $e) {
            echo $e;
        }
    }
}

