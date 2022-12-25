<?php

abstract class BaseController extends AbstractController
{
    protected function render(string $template, array $params = []): void
    {
        $categories = $this->getModel('category');
        $result = ['categories' => $categories->getAllCategories()];

        parent::render($template, array_merge($params, $result));
    }
}