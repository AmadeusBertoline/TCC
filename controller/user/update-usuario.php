<?php
require_once '../../Global.php';


if (
    !empty($_POST['email']) &&
    !empty($_POST['password']) &&
    !empty($_POST['password-edit-confirm']) &&
    !empty($_POST['codUser'])
) {

    if (($_POST['password']) == ($_POST['password-edit-confirm'])) {

        $user = new Person();

        $user->setId($_POST['codUser']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password-edit-confirm']);

        try {
            UsuarioDao::updateUser($user);
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }
        

    }
}
