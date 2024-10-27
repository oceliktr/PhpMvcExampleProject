<?php
require_once 'core/Controller.php';

class SiteController extends Controller
{
    private $renderer;
    // Constructor içinde RenderPage nesnesini oluştur
    public function __construct()
    {
        // `Controller` sınıfından miras aldığınız için `$this` referansını geçiyoruz.
        $this->renderer = new RenderPage($this);
    }

    /**
     * Hakkımızda sayfasını gösterir.
     */
    public function about()
    {
        $this->renderer->GetRenderPage('about', 'Hakkımızda');
    }

    public function contact()
    {

        $this->renderer->GetRenderPage('contact', 'İletişim');
    }

}