<?php

function getLoginRules(){
    array(
        array(
            'field' => 'username',
            'label' => 'Usuario',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El %s es requerido.'
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Contraseña',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El %s es requerido.'
            ),
        ),

    );
}