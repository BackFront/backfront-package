<?php
require_once (dirname(__FILE__) . '/../header.php');

use Backfront\Form\Form;
use Backfront\Form\FormFieldsSemanticUI as FormFields;

$form = new Form('form_bootstrap');
$form_semantic_ui = new Form('form_semantic_ui', new FormFields);
?>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Bootstrap form</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?php
                    $form->setAction('action.php')
                            ->setMethod('post')
                            //->setFormClass(['form-horizontal'])
                            ->addField(array(
                                "id" => "bootstrap_field_text", //required
                                "name" => "bootstrap_field_text", //optional
                                "type" => "text", //required
                                "label" => "Text field", //optional
                                "input" => array(
                                    "attrs" => [
                                        "class" => "form-control",
                                        "placeholder" => "Placeholder"
                                    ]
                                )
                            ))
                            ->addField(array(
                                "id" => "bootstrap_field_textarea", //required
                                "type" => "textarea", //required
                                "label" => "Textarea", //optional
                                "textarea" => array(
                                    "attrs" => [
                                        "class" => "form-control",
                                        "placeholder" => "Placeholder"
                                    ]
                                )
                            ))
                            ->addField(array(
                                "id" => "bootstrap_field_checkbox", //required
                                "type" => "checkbox", //required
                                "label" => "Textarea", //optional
                                "value" => "hello world", //optional
                                "checked" => true, //optional | default: false
                            ))
                            ->build(true);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Semantic-UI form</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?php
                    $form_semantic_ui
                            ->setAction('action.php')
                            ->setMethod('post')
                            ->setFormClass(['ui', 'form', 'huge'])
                            ->addField(array(
                                "id" => "semantic_field_text", //required
                                "name" => "field_nome", //optional
                                "type" => "text", //required
                                "label" => "Text field", //optional
                                "input" => array(
                                    "attrs" => [
                                        "placeholder" => "Placeholder"
                                    ]
                                )
                            ))
                            ->addField(array(
                                "id" => "semantic_field_textarea", //required
                                "type" => "textarea", //required
                                "label" => "Textarea", //optional
                                "textarea" => array(
                                    "attrs" => [
                                        "class" => "form-control",
                                        "placeholder" => "Placeholder"
                                    ]
                                )
                            ))
                            ->build(true);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once (dirname(__FILE__) . '/../footer.php');
