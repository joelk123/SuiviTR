<?php

namespace Suivitr;

class EnseignantsController extends \F3il\Controller {

    function __construct() {
        $this->setDefaultActionName('SujetEC');
        $model = new LoginModel();
        if (!\F3il\Authentication::isAuthenticated()) {
            \F3il\HttpHelper::redirect("?controller=login");
        } else if ($model->UserAdmin($_SESSION['f3il.authentication']) == 1) {
            \F3il\HttpHelper::redirect("?controller=admin");
        }
    }

    public function BadgesujetAction() {
        $model = new SujetModel();
        $data = $model->BadgeEnseignant();
        echo $data;
    }

    public function SearchBarAction() {
        $model = new SearchbarModel();
        $data = $model->SBEnseignant();
        echo $data;
    }

    public function SujetECAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('enseignants');
        $page->setView('sujetEC_Enseignant');
    }

    public function gridSujetECAction() {
        $model = new SujetModel();
        $data = $model->SujetECEnseignant($_SESSION['f3il.authentication']);
        echo $data;
    }

    public function SujetNAAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('enseignants');
        $page->setView('sujetNA_Enseignant');
    }

    public function gridSujetNAAction() {
        $model = new SujetModel();
        $data = $model->SujetNAEnseignant($_SESSION['f3il.authentication']);
        echo $data;
    }

    public function SujetTAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('enseignants');
        $page->setView('sujetT_Enseignant');
        
        
    }

    public function gridSujetTAction() {
        $model = new SujetModel();
        $data = $model->SujetTEnseignant($_SESSION['f3il.authentication']);
        echo $data;
    }
     public function CloturerSujetAction() {
         $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect("?controller=enseignants&action=sujetEC");
        }
        $model = new SujetModel();
        $model->cloturer($id);
        
        \F3il\Messenger::setMessage("Sujet cloturé avec succès !");

        \F3il\HttpHelper::redirect("?controller=enseignants&action=SujetT");
     }
    public function NouveauSujetAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('enseignants');
        $page->setView('Nouveausujet');

        $form = new NouveausujetForm('?controller=enseignants&action=NouveauSujet', \F3IL\Form::EDIT_MODE);
        $page->form = $form;

        if (!\F3il\Request::isPost()) {
            return;
        }

        //if(!\F3il\CsrfHelper::checkToken()) {throw new \F3il\Error("Erreur formulaire");}

        $form->loadData($_POST);
        if (!$form->_validate()) {
            return;
        }

        $model = new SujetModel();
        $model->creer($form->getData());

        \F3il\Messenger::setMessage("Nouveau sujet enregistré");

        \F3il\HttpHelper::redirect("?controller=enseignants&action=SujetNA");
    }

    public function EditerSujetAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('enseignants');
        $page->setView('Editersujet');

        $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect("?controller=enseignants&action=sujetNA");
        }
        $sm = new SujetModel();
        if (!$sm->isActif($id)) {
            \F3il\HttpHelper::redirect("?controller=enseignants&action=sujetNA");
        }

        $data = $sm->lire($id);

//            if(!$data){
//                \F3il\HttpHelper::redirect('$url2');
//            }


        $form = new EditersujetForm('?controller=enseignants&action=EditerSujet&id=' . $id, \F3il\Form::EDIT_MODE);
        $page->form = $form;

        $form->loadData($data);

        if (!\F3il\Request::isPost()) {
            return;
        }

        //if(!\F3il\CsrfHelper::checkToken()) {throw new \F3il\Error("Erreur formulaire");}

        $form->loadData($_POST);
        if (!$form->_validate()) {
            return;
        }

        $sm->editer($form->getData(), $id);

        \F3il\Messenger::setMessage("Sujet édité avec succés !");
        \F3il\HttpHelper::redirect("?controller=enseignants&action=SujetNA");
    }

    public function SupprimerSujetAction() {
        $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect("?controller=enseignants&action=sujetNA");
        }
        $sm = new SujetModel();
        if (!$sm->isActif($id)) {
            \F3il\HttpHelper::redirect("?controller=enseignants&action=sujetNA");
        }
        $sm->supprimer($id);

        \F3il\Messenger::setMessage("Sujet supprimé avec succés !");

        \F3il\HttpHelper::redirect("?controller=enseignants&action=sujetNA");
    }

    public function DecoAction() {
        session_destroy();
        \F3il\HttpHelper::redirect("?controller=login");
    }

    public function SuiviSujetAction() {
        $page = \F3il\Page::getInstance();
        $page->setTemplate('enseignants');
        $page->setView('suiviSujet');
        $model = new SujetModel();
        $id = filter_var(\F3il\Request::get('id'), FILTER_VALIDATE_INT);
        if (!$id) {
            \F3il\HttpHelper::redirect("?controller=enseignants");
        }
        $data = $model->getSuivitSujet($id);
        if (is_null($data)) {
            \F3il\HttpHelper::redirect("?controller=enseignants");
        }
        
        $form = new SuivisujetForm('?controller=enseignants&action=suivisujet&id=' . $id, \F3IL\Form::EDIT_MODE, $model->isCloturer($id));
        $page->form = $form;
        $form->loadData($data);
        if (!\F3il\Request::isPost()) {
            return;
        }
        $form->loadData($_POST);
        if ($form->_validate()) {
            return;
        }

        $model->editerSuiviSujet($form->getData(), $id);
        \F3il\Messenger::setMessage("Sujet édité avec succés !");
        
    }

}
