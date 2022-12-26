<?php

 abstract class AbstractController
{
    abstract public function index(): void;

    protected function render(string $template, array $params = []): void
    {
        $content = 'templates/' . $template . '.php';
        $title = ucfirst($template);

        require_once 'templates/template.php';
    }
    public function renderJson ($resposne = []) {
        
        echo json_encode($resposne);
    }

    protected function getModel(string $name)
    {
        $modelClassName = ucfirst($name) . 'Model';

        require_once __DIR__ . '/../models/' . $modelClassName. '.php';

        return new $modelClassName();
    }
}