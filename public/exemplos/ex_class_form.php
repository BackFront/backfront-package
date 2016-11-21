<?php
require_once (dirname(__FILE__) . '/../header.php');

use Backfront\Form\Form;
use Backfront\Form\SemanticUI\FormFields;

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
                                "id" => "bootstrap_title", //required
                                "type" => "title", //required
                                "title" => "Title", //required
                                "subtitle" => "subtitle example" //optional
                            ))
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
                                "id" => "bootstrap_field_select", //required
                                "name" => "bootstrap_field_select", //required
                                "type" => "select", //required
                                "label" => "Select", //optional
                                "selected" => "lemon", //optional
                                "options" => array(
                                    "banana" => "Banana",
                                    "lemon" => "Lemon",
                                    "guitar" => array(
                                        "value" => "Guitar",
                                        "attrs" => [
                                            'disabled' => true
                                        ]
                                    ),
                                )
                            ))
                            ->addField(array(
                                "id" => "bootstrap_field_multiple_select", //required
                                "name" => "bootstrap_field_multiple_select", //required
                                "type" => "select", //required
                                "multiple" => true,
                                "label" => "Select multiple", //optional
                                "selected" => array(2, 4, 7), //Set array to multiple selections
                                "options" => array(
                                    1 => "One",
                                    2 => "Two",
                                    3 => "Tree",
                                    4 => "Four",
                                    5 => "Five",
                                    6 => "Six",
                                    7 => "Seven"
                                )
                            ))
                            ->addField(array("type" => "separator"))
                            ->addField(array(
                                "id" => "bootstrap_field_checkbox", //required
                                "type" => "checkbox", //required
                                "label" => "Checkbox", //optional
                                "value" => "hello world", //optional
                                "checked" => true, //optional | default: false
                            ))
                            ->addField(array(
                                "id" => "bootstrap_field_checkbox_disabled", //required
                                "type" => "checkbox", //required
                                "label" => "Disabled", //optional
                                "value" => "hello world", //optional
                                "disabled" => true, //optional
                            ))
                            ->addField(array("type" => "separator"))
                            ->addField(array(
                                "id" => "bootstrap_field_radio", //required
                                "name" => "bootstrap_field_radio", //required
                                "type" => "radio", //required
                                "label" => "Radio", //optional
                                "value" => "It's my radio button", //optional
                                "checked" => false, //optional | default: false
                            ))
                            ->addField(array(
                                "id" => "bootstrap_field_radio2", //required
                                "name" => "bootstrap_field_radio", //required
                                "type" => "radio", //required
                                "label" => "Radio 02", //optional
                                "value" => "", //optional
                                "checked" => false, //optional | default: false
                            ))
                            ->addField(array(
                                "id" => "bootstrap_field_radio3", //required
                                "name" => "bootstrap_field_radio", //required
                                "type" => "radio", //required
                                "disabled" => true, //optional
                                "label" => "Radio 03 disabled", //optional
                                "value" => "", //optional
                                "checked" => false, //optional | default: false
                            ))
                            ->addField(array("type" => "separator"))
                            ->addField(array(
                                "id" => "bootstrap_button", //required
                                "type" => "button", //required
                                "label" => "Default button"
                            ))
                            ->addField(array(
                                "id" => "bootstrap_button", //required
                                "type" => "button", //required
                                "label" => "Primary",
                                "button" => array(
                                    "attrs" => array(
                                        "class" => "btn btn-primary"
                                    ))
                            ))
                            ->addField(array(
                                "id" => "bootstrap_button", //required
                                "type" => "button", //required
                                "label" => "Success",
                                "button" => array(
                                    "attrs" => array(
                                        "class" => "btn btn-success"
                                    ))
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
                                "id" => "semantic_title", //required
                                "type" => "title", //required
                                "title" => "Title", //required
                                "subtitle" => "subtitle example" //optional
                            ))
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
                            ->addField(array(
                                "id" => "semantic_field_select", //required
                                "name" => "semantic_field_select", //required
                                "type" => "select", //required
                                "label" => "Select", //optional
                                "selected" => "lemon", //optional
                                "options" => array(
                                    "banana" => "Banana",
                                    "lemon" => "Lemon",
                                    "guitar" => array(
                                        "value" => "Guitar",
                                        "attrs" => [
                                            'disabled' => true
                                        ]
                                    ),
                                )
                            ))
                            ->addField(array(
                                "id" => "semantic_field_multiple_select", //required
                                "name" => "semantic_field_multiple_select", //required
                                "type" => "select", //required
                                "multiple" => true,
                                "label" => "Select multiple", //optional
                                "selected" => array(2, 4, 7), //Set array to multiple selections
                                "options" => array(
                                    1 => "One",
                                    2 => "Two",
                                    3 => "Tree",
                                    4 => "Four",
                                    5 => "Five",
                                    6 => "Six",
                                    7 => "Seven"
                                )
                            ))
                            ->addField(array("type" => "separator"))
                            ->addField(array(
                                "id" => "semantic_checkbox_field_checkbox", //required
                                "type" => "checkbox", //required
                                "label" => "Checkbox", //optional
                                "value" => "hello", //optional
                                "checked" => true, //optional | default: false
                            ))
                            ->addField(array(
                                "id" => "semantic_checkbox_field_checkbox_disabled", //required
                                "type" => "checkbox", //required
                                "label" => "Disabled", //optional
                                "value" => "hello", //optional
                                "disabled" => true, //optional | default: false
                            ))
                            ->addField(array("type" => "separator"))
                            ->addField(array(
                                "id" => "semantic_field_radio", //required
                                "name" => "semantic_field_radio", //required
                                "type" => "radio", //required
                                "label" => "Radio default", //optional
                                "checked" => false, //optional | default: false
                            ))
                            ->addField(array(
                                "id" => "semantic_field_radio2", //required
                                "name" => "semantic_field_radio", //required
                                "type" => "radio", //required
                                "variation" => "slider", //required
                                "label" => "Radio slider", //optional
                                "value" => "", //optional
                                "checked" => false, //optional | default: false
                            ))
                            ->addField(array(
                                "id" => "semantic_field_radio3", //required
                                "name" => "semantic_field_radio", //required
                                "type" => "radio", //required
                                "variation" => 'toggle', //optional
                                "label" => "Radio toogle", //optional
                                "value" => "", //optional
                            ))
                            ->addField(array("type" => "separator"))
                            ->addField(array(
                                "id" => "bootstrap_button", //required
                                "type" => "button", //required
                                "label" => "Default button"
                            ))
                            ->addField(array(
                                "id" => "bootstrap_button", //required
                                "type" => "button", //required
                                "label" => "Primary",
                                "button" => array(
                                    "attrs" => array(
                                        "class" => "ui button primary"
                                    ))
                            ))
                            ->addField(array(
                                "id" => "bootstrap_button", //required
                                "type" => "button", //required
                                "label" => "Secundary",
                                "button" => array(
                                    "attrs" => array(
                                        "class" => "ui basic button green"
                                    ))
                            ))
                            ->build(true);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load Scripts-->
<script src="<?php echo ASSETS_URL ?>/js/ex_class_form.js"></script>

<?php
require_once (dirname(__FILE__) . '/../footer.php');
