<?php

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class InfoLogger
{
    private string $path;
    private string $pagename;
    private Logger $logger;


    public function __construct(string $pagename)
    {
        $this->pagename = $pagename;
        $this->nameofperfomanceartist = "DEFAULT";
        $this->path = join(DIRECTORY_SEPARATOR, [dirname(__DIR__), "logs", "gachilog.log"]);
        $this->logger = new Logger($this->pagename);
        $this->logger->pushHandler(new StreamHandler($this->path, Logger::INFO));

        if ($this->pagename != "notnew")
        {


        $ip = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Vladivostok");

        if ($this->pagename == "pageofbilly.php")
        {
            $this->nameofperfomanceartist = "BILLY HERRINGTON";
        }
        else
        {
            if ($this->pagename == "pageofvan.php")
            {
                $this->nameofperfomanceartist = "VAN DARKHOLME";
            }
            else
            {
                if ($this->pagename == "pageofricardo.php")
                {
                    $this->nameofperfomanceartist = "RICARDO MILOS";
                }
            }
        }
        $this->logger->info('Посетитель с IP ' . htmlspecialchars($ip) . ' зашёл на страничку ♂perfomance artist♂, известного как ♂' . htmlspecialchars($this->nameofperfomanceartist) . '♂, в дату ' . date('d.m.Y г. во время H:i:s') . " по Владивостоку.");

        }

    }

    public function print()
    {
        echo '<pre>';
        if (is_file($this->path))
        {
            foreach (array_reverse(file($this->path)) as $log) {
                echo htmlspecialchars($log);
            }
        }
        echo '<pre>';
    }
}