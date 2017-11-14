<?php
require_once (dirname(__FILE__) . '/../header.php');

global $app;

function content_tab_a()
{
    return "
        <h1>Exemplo</h1>
        <b>Este é um teste de como funciona a parada!!!</b>
        <p>Hello World</p>";
}

function content_tab_b()
{
    return "
        <h1>Iniciando</h1>
        <b>Instanciando a classe</b><hr>
        <p>use Backfront\Generator\Tab;" . '<br />'
            . '$tab = new Tab($app);</p>'
            . '$tab->addTabItem([' . '<br />'
            . '   "id" => <b><i>tab_id</i></b>,' . '<br />'
            . '   "text" => <b><i>nav_text</i></b>,' . '<br />'
            . '   "active" => <b><i>bool_active</i></b>' . '<br />'
            . '"], <b><i>html_content</i></b>)';
}

$tab_args = array(
    'id' => 'tab_item_id',
    'text' => 'Teste exemplo',
    'active' => true
);

$tab_args_b = array(
    'id' => 'tab_item_id_b',
    'text' => 'Como instanciar a classe'
);

use Backfront\Generator\Tab;

$tab = new Tab($app);
$tab
        ->addTabItem($tab_args, content_tab_a())
        ->addTabItem($tab_args_b, content_tab_b())
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <h3 class="panel-heading">
                <b>Generator/Tab</b>
            </h3>
            <div class="panel-body">
                <?php echo $tab->build(); ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once (dirname(__FILE__) . '/../footer.php');
