<?php

require_once 'core/RenderPage.php';

class Controller
{
    // View dosyasını yükleme metodu
    public function view($view, $data = [])
    {
        // Controller adını dinamik olarak belirle
        $className = strtolower(str_replace('Controller', '', get_class($this)));

        // View dosyasının tam yolunu oluştur
        $viewPath = "app/views/{$className}/{$view}.php";

        if (file_exists($viewPath)) {
            extract($data); // Verileri değişken olarak kullanmak için extract
            require_once $viewPath;
        } else {
            echo "View dosyası bulunamadı: {$viewPath}";
        }
    }

    // Model dosyasını yükleme metodu
    public function model($model)
    {
        require_once 'app/models/' . $model . '.php';
        return new $model;
    }
}