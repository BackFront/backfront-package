<?php
/**
 * <h1>Tab</h1>
 * 
 * Project Name: Backfront
 * Project URI: https://github.com/BackFront/umbrella-packege
 * Description: Responsible to Generate a tab
 * Version: 1.0.0
 * Author: Douglas Alves
 * Author URI: http://alvesdouglas.com.br/
 * License: Apache License 2.0
 * 
 * @package Backfront
 * @subpackage Form
 * @version 1.0.0
 * 
 * @author Douglas Alves <alves.douglaz@gmail.com>
 * @link https://github.com/BackFront/backfront-package Project Repository
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @since 1.0.0
 * 
 * @example /public/examples/ex_class_generator-tab.php explanation of generate a tab
 * @see <https://semantic-ui.com/modules/tab.html>
 */

namespace Backfront\Generator
{

    use Backfront\Application;

    class Tab
    {

        protected $app;
        protected $form;
        protected $navs = array();
        protected $tabs = array();
        protected $panels = array();
        public $forms;

        function __construct(Application $ApplicationClass)
        {
            $ApplicationClass->TPLPATH = Application::dirname(__FILE__, 2, '/Views');
            $this->app = $ApplicationClass;
        }

        /**
         * <h3>addMenuItem</h3>
         * Create a single field
         * 
         * @param array $tab_args
         * @example /public/examples/ex_class_generator-tab.php
         * 
         * @param string $content_painel conteudo que será exibido quando a tab for ativada
         * @return Instance of class Tab (this class)
         */
        public function addTabItem(array $tab_args, $content_painel)
        {
            $painel['id'] = $tab_args['id'];
            $painel['html'] = $content_painel;
            
            $tab_args['active'] = (!empty($tab_args['active']) && $tab_args['active']) ? ' active' : '';
            $painel['active'] = (!empty($tab_args['active']) && $tab_args['active']) ? ' active' : '';
            
            $this->navs[] = $tab_args;
            $this->panels[] = $painel;
            
            return $this;
        }

        /**
         * <h3>build</h3>
         * render the HTML of the Tab
         * 
         * @param bool $show display tab after render
         */
        public function build($show = false)
        {

            $tab = $this->app->twig()->render('/Modules/Tab.twig', array(
                'navs' => $this->navs,
                'painels' => $this->panels
            ));

            if ($show)
                echo $tab;
            return $tab;
        }

    }
}
