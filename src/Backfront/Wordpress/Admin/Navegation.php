<?php
/**
 * <h1>Application</h1>
 * 
 * Project Name: Backfront
 * Project URI: https://github.com/BackFront/umbrella-packege
 * Description: Class generate admin navegation sidebar
 * Version: 0.1.0
 * Author: Douglas Alves
 * Author URI: http://alvesdouglas.com.br/
 * License: Apache License 2.0
 * 
 * @package Backfront
 * @subpackage Wordpress\Admin
 * @version 0.1.0
 * 
 * @author Douglas Alves <alves.douglaz@gmail.com>
 * @link https://github.com/BackFront/backfront-package Project Repository
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @since 0.1.0
 */

namespace Backfront\Wordpress\Admin {

    class Navegation
    {

        private $menu_id;
        private $menu_title;
        private $menu_capability;
        private $menu_dashicon;

        /**
         * Adiciona um menu no admin do Wordpress.
         * 
         * 
         * @param string $id                        The slug to this menu.
         * @param string $title                     The text to be displayed in the title tags of the page when the menu is selected.
         * @param string $capability                The required capacity to displaying this menu. <i>default: 'manage_options'</i>
         * @param object/function $callback_menu    The callback that will show the content to this menu. <i>default: null</i>
         * @param string $dashicon                  A icon for this menu @see https://developer.wordpress.org/resource/dashicons/#list-view. <i>default: ''</i>
         * @param string $position                  The position in the menu order this one should appear. <i>default: null</i>
         * 
         * @return \Backfront\Wordpress\Admin\Navegation
         * 
         * @see add_menu_page() https://developer.wordpress.org/reference/functions/add_menu_page/
         */
        public function addMenu($id, $title, $capability = 'manage_options', $callback_menu = null, $dashicon = '', $position = null)
        {
            $this->menu_id = $id;
            $this->menu_title = $title;
            $this->menu_capability = $capability;
            $this->menu_dashicon = $dashicon;

            add_menu_page($this->menu_title, $this->menu_title, $this->menu_capability, $this->menu_id, $callback_menu, $this->menu_dashicon, $position);
            return $this;
        }

        /**
         * 
         * @param slug $submenu_id                      The slug name to refer to this menu by. Should be unique for this menu page and only include lowercase alphanumeric, dashes, and underscores characters to be compatible with
         * @param slug $title                           Title to the page this submenu
         * @param type $capability                      The capability required for this menu to be displayed to the user.
         * @param type $callback_menu                   The function to be called to output the content for this page.
         * 
         * @return \Backfront\Wordpress\Admin\Navegation
         * @see add_menu_page() https://developer.wordpress.org/reference/functions/add_submenu_page/
         */
        public function addSubmenu($submenu_id, $title, $capability = 'manage_options', $callback_menu = null)
        {
            if (!isset($this->menu_id) || empty($this->menu_id))
                trigger_error("Não é possível adicionar um submenu. Selecione um menu antes de adicionar um submenu. Use o método <i>setMenu()</i>", E_USER_ERROR);

            add_submenu_page($this->menu_id, $title, $title, $capability, $submenu_id, $callback_menu);

            return $this;
        }

        /**
         * Set the current menu
         * 
         * @param string $menu_id o slug do menu.
         * @return \Backfront\Wordpress\Admin\Navegation
         */
        public function setMenu($menu_id)
        {
            $this->menu_id = $menu_id;
            return $this;
        }

        /**
         * Remove a menu from admin of the wordpress.
         * 
         * @param type $menu_slug
         * @return \Backfront\Wordpress\Admin\AdminNavMenu
         */
        
        public static function removeMenu($menu_slug)
        {
            remove_menu_page($menu_slug);
            return new AdminNavMenu();
        }

        /**
         * Remove a submenu from admin of the wordpress.
         * 
         * @param string $menu_slug         Same used on addMenu() method.
         * @param string $submenu_slug      Same used on addSubenu() method.
         * @return type
         */
        public static function removeSubmenu($menu_slug, $submenu_slug)
        {
            remove_submenu_page($menu_slug, $submenu_slug);
            return self::class;
        }

    }
}