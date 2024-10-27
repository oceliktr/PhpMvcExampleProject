<?php

class RenderPage
{
    private $controller;

    // Constructor içinde Controller nesnesini al
    public function __construct($controller)
    {
        $this->controller = $controller;
    }
    /**
     * Sayfayı dinamik olarak layout ile render eder.
     *
     * @param string $viewName Görüntü dosyasının adı
     * @param string $pageTitle Sayfa başlığı
     */
    public function GetRenderPage(string $viewName, string $pageTitle,array $data = [])
    {
        ob_start();
        $this->controller->view($viewName, $data);
        $content = ob_get_clean();

        $title = $pageTitle;
        require_once 'app/views/layout.php';
    }
}