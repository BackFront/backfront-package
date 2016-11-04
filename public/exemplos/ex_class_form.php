<?php
require_once (dirname(__FILE__) . '/../header.php');

use Backfront\Form\Form;
?>
<div class="container">
    <div class="bfe top-20">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Instantiating class</h2>
                </div>
<pre class="col-md-6">
<code  class="language-php">
use Backfront\Form\Form;

$form = new Form('same_name_to_form');
</code>
</pre>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//$form = new Form('teste_form');
//
//$form->setAction('action.php')
//        ->setMethod('post')
//        ->setFormClass(['form-inline'])
//        ->addField(array(
//            "id" => "id_field_text",
//            "name" => "field_nome",
//            "type" => "text",
//            "placeholder" => "Digite seu nome",
//            "label" => "Seu nome",
//            //"value" => '',
//            "class" => [
//                "teste",
//                "de",
//                "class"
//            ]
//        ))
//        ->addField(array(
//            "id" => "id_field_text",
//            "name" => "field_nome",
//            "type" => "text",
//            "placeholder" => "Digite seu nome",
//            "label" => "Seu nome",
//            //"value" => '',
//            "class" => [
//                "teste",
//                "de",
//                "class"
//            ]
//        ))
//        ->build(true);

require_once (dirname(__FILE__) . '/../footer.php');
