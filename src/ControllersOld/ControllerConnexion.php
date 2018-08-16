<?php

//namespace BlogControllers;
//require_once 'vendor/autoload.php';

require_once 'etc/Controller.php';
require_once 'src/Repository/UserRepository.php';


class ControllerConnexion extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new UserRepository();
    }

    public function index()
    {
        $this->genererVue();
    }

    public function connecter()
    {
        if ($this->requete->existeParametre("pseudo") && $this->requete->existeParametre("pass")) {
            $pseudo = $this->requete->getParametre("pseudo");
            $pass = $this->requete->getParametre("pass");
            if ($this->user->connecter($pseudo, $pass)) {
                $utilisateur = $this->user->getUtilisateur($pseudo, $pass);
                $this->requete->getSession()->setAttribut("id",
                        $utilisateur['id']);
                $this->requete->getSession()->setAttribut("pseudo",
                        $utilisateur['pseudo']);
                $this->rediriger("admin");
            }
            else
                $this->genererVue(array('msgErreur' => 'Login ou mot de passe incorrects'),
                        "index");
        }
        else
            throw new Exception("Action impossible : login ou mot de passe non défini");
    }

    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->redirect("Home");
    }

}
