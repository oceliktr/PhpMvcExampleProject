<?php
require_once 'core/Controller.php';

class UserController extends Controller
{
    private $renderer;

    public function __construct()
    {
        $this->renderer = new RenderPage($this);
    }

    public function index()
    {
        // Kullanıcı modelini yükle ve veriyi al
        $userModel = $this->model('User');
        $users = $userModel->getAllUsers();

        $this->renderer->GetRenderPage('userList', 'Kullanıcı Listesi', ['users' => $users]);
    }

    public function create()
    {
        $this->renderer->GetRenderPage('userForm', 'Kullanıcı Kayıt');
    }
    public function detail($id)
    {
        $userModel = $this->model('User');
        $user = $userModel->getUserById($id);

        // Kullanıcı bulunamadıysa, bir hata mesajı göster veya yönlendir
        if (!$user) {
            $this->renderer->GetRenderPage('notFound', 'Kullanıcı bulunamadı',['message' => 'Kullanıcı bulunamadı.']);
            return;
        }

        $this->renderer->GetRenderPage('userDetail', 'Kullanıcı Detayı',['user' => $user]);
    }
    public function store()
    {
        // Kullanıcı modelini yükle
        $userModel = $this->model('User');

        // Formdan gelen veriyi al
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Kullanıcıyı kaydet
        $userModel->createUser($username, $password,$role);

        // Listeye yönlendir
        header("Location: /User/List");
    }
}