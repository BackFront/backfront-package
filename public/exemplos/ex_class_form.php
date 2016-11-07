<?php
require_once (dirname(__FILE__) . '/../header.php');

use Backfront\Form\Form;

$form = new Form('teste_form');

$form->setAction('action.php')
        ->setMethod('post')
        ->setFormClass(['form-inline'])
        ->addField(array(
            "id" => "id_field_text",
            "name" => "field_nome",
            "type" => "text",
            "placeholder" => "Digite seu nome",
            "label" => "Seu nome",
            //"value" => '',
            "class" => [
                "teste",
                "de",
                "class"
            ]
        ))
        ->addField(array(
            "id" => "id_field_text",
            "name" => "field_nome",
            "type" => "text",
            "placeholder" => "Digite seu nome",
            "label" => "Seu nome",
            //"value" => '',
            "class" => [
                "teste",
                "de",
                "class"
            ]
        ))
        ->build(true);

require_once (dirname(__FILE__) . '/../footer.php');
