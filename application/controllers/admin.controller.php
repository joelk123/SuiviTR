    <?php

namespace Suivitr;

class AdminController extends \F3il\Controller {

    function __construct() {
        $this->setDefaultActionName('sujetEC');
        $model = new LoginModel();
        if (!\F3il\Authentication::isAuthenticated()) {
            \F3il\HttpHelper::redirect("?controller=login");
        } else if ($model->UserAdmin($_SESSION['f3il.authentication']) == 0) {
            \F3il\HttpHelper::redirect("?controller=enseignants&action=sujetC");
        }
    }

    public function BadgesujetAction() {
        $model = new SujetModel();
        $data = $model->BadgeAdmin();
        echo $data;
    }

    public function SearchBarAction() {
        $model = new SearchbarModel();
        $data = $model->SBAdmin();
        echo $data;
    }

    public function AttribuerSAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('Attribuersujet');
    }

    public function IAttribuerSAction() {
        $model = new SujetModel();
        $model->attribuer();
    }

    public function EleveNAAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('EleveNA');
    }

    public function gridEleveNAAction() {
        $model = new EleveModel();
        $data = $model->EleveNA();
        echo $data;
    }

    public function EleveAAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('EleveA');
    }

    public function gridEleveAAction() {
        $model = new EleveModel();
        $data = $model->EleveA();
        echo $data;
    }

    public function AfficherEnseignantAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('One_Enseignant_Admin');
        
        $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect('?controller=admin&action=Enseignant');
        }
    }
    
    public function GetEnseignantAction(){
        $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect('?controller=admin&action=Enseignant');
        }
        $model = new EnseignantModel();
        $data = $model->getEnseignant($id);
        echo $data;
        
    }
    
    public function gridSujetEC_EnseignantAction(){
        $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect('?controller=admin&action=Enseignant');
        }
        
        $model = new SujetModel();
        $data = $model->SujetECEnseignant($id);
        echo $data;
    }
    
     public function gridSujetNA_EnseignantAction(){
        $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect('?controller=admin&action=Enseignant');
        }
        
        $model = new SujetModel();
        $data = $model->SujetNAEnseignant($id);
        echo $data;
    }
    
     public function gridSujetT_EnseignantAction(){
        $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect('?controller=admin&action=Enseignant');
        }
        
        $model = new SujetModel();
        $data = $model->SujetTEnseignant($id);
        echo $data;
    }
    
    public function EnseignantAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('Enseignant_Admin');
    }

    public function gridEnseignantAction() {
        $model = new EnseignantModel();
        $data = $model->ListEnseignant();
        echo $data;
    }

    public function SuiviSujetAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('suiviSujet');
        $model = new SujetModel();
        $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect('?controller=admin&action=SujetT');
        }
        $data = $model->getSuivitSujet($id);
        if (is_null($data)) {
            \F3il\HttpHelper::redirect('?controller=admin&action=index');
        }
        $form = new SuivisujetForm('?controller=admin&action=Suivisujet&id='.$id, \F3IL\Form::EDIT_MODE, true);
        $page->form = $form;
        $form->loadData($data);
        if (!\F3il\Request::isPost()) {
            return;
        }
        $form->loadData($_POST);
        if (!$form->_validate()) {
            return;
        }
    }

    public function AjouterEnseignantAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('AjouterEnseignant_Admin');

        $form = new AjouterenseignantForm('?controller=admin&action=AjouterEnseignant', \F3IL\Form::CREATE_MODE);
        $page->form = $form;

        if (!\F3il\Request::isPost()) {
            return;
        }

        if (!\F3il\CsrfHelper::checkToken()) {
            throw new \F3il\Error("Erreur formulaire");
        }

        $form->loadData($_POST);
        if (!$form->_validate()) {
            return;
        }

        $EnsModel = new EnseignantModel();
        $EnsModel->creer($form->getData());

        \F3il\Messenger::setMessage("Enseignant créé avec succès !");

        \F3il\HttpHelper::redirect("?controller=admin&action=enseignant");
    }


    public function RandomSAction() {
        $model = new SujetModel();
        $data = $model->random();
        echo $data;
    }

    public function SujetECAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('sujetEC_Admin');
    }

    public function gridSujetECAction() {
        $model = new SujetModel();
        $data = $model->SujetECAdmin();
        echo $data;
    }

    public function SujetNAAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('sujetNA_Admin');
    }

    public function gridSujetNAAction() {
        $model = new SujetModel();
        $data = $model->SujetNAAdmin();
        echo $data;
    }

    public function SujetTAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('admin');
        $page->setView('sujetT_Admin');
    }

    public function gridSujetTAction() {
        $model = new SujetModel();
        $data = $model->SujetTAdmin();
        echo $data;
    }

    public function DecoAction() {
        session_destroy();
        \F3il\HttpHelper::redirect("?controller=login");
    }

}
