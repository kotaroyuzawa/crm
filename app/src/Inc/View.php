<?php


namespace App\Inc;

class View
{

    private string $template;

    public function __construct(string $template)
    {
        $this->template = $template;
    }

    public function e(string $data): string
    {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    public function render(array $data): string
    {
        extract($data);

        ob_start();
        include(BASE_PATH . TEMPLATE_PATH . $this->template . '.php');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}