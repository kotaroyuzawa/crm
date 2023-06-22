<?php

namespace App\Inc;

class Frame {

    private static FRAME $instance;
    private View $view;
    private array $jsFiles = [];
    private array $cssFiles = [];

    private function __construct()
    {
        $this->view = new View('frame');
    }

    public static function addJsFile(string $filename): void
    {
        self::getInstance()->addJs($filename);
    }

    public static function addCssFile(string $filename): void
    {
        self::getInstance()->addCss($filename);
    }

    public static function render(string $content): string
    {
        return self::getInstance()->renderView($content);
    }

    private function renderView(string $content): string
    {
        return $this->view->render([
            'files' => $this->getFiles(),
            'content' => $content
        ]);
    }

    private function getFiles(): string
    {
        $files = '';

        foreach ($this->jsFiles as $js) {
            $path = JS_PATH . $js;
            $files .= "<script src='{$path}' type='text/javascript' ></script>";
        }

        foreach ($this->cssFiles as $css) {
            $path = CSS_PATH . $css;
            $files .= "<link rel='stylesheet' href='{$path}'>";
        }

        return $files;
    }

    private function addJs(string $filename): void
    {
        $this->jsFiles[] = $filename;
    }

    private function addCss(string $filename): void
    {
        $this->cssFiles[] = $filename;
    }

    private static function getInstance(): Frame
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}
