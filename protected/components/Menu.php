<?php

class Menu {

    private static $_controller;

    public static function getMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<i class="icon-home"></i> Home', 'url' => Yii::app()->homeUrl),
        );

        return self::generateMenu($items);
    }

    public static function getAdminMenu($controller) {
        self::$_controller = $controller;
        $items = array(
            array('label' => '<i class="icon-mail-reply"></i>  Regresar a la App', 'url' => Yii::app()->homeUrl),
            array('label' => '<i class="icon-user"></i>  Usuarios', 'url' => Yii::app()->user->ui->userManagementAdminUrl, 'access' => 'Cruge.ui.*', 'active_rules' => array('module' => 'cruge')),
            array('label' => '<i class="icon-map-marker"></i>  Catálogos', 'url' => '#', 'items' => array(
                    array('label' => 'Pais', 'url' => array('/crm/pais/admin'), 'access' => 'action_pais_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'pais')),
                    array('label' => 'Provincia', 'url' => array('/crm/provincia/admin'), 'access' => 'action_provincia_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'provincia')),
                    array('label' => 'Ciudad', 'url' => array('/crm/ciudad/admin'), 'access' => 'action_ciudad_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'ciudad')),
                )),
//            array('label' => '<i class="icon-dollar"></i>  Entidades', 'url' => '#', 'items' => array(
//                    array('label' => 'Entidad Bancaria', 'url' => array('/crm/entidadBancaria/admin'), 'access' => 'action_entidadBancaria_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'entidadBancaria')),
//                    array('label' => 'Sucursal', 'url' => array('/crm/sucursal/admin'), 'access' => 'action_sucursal_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'sucursal')),
//                )),
//            array('label' => '<i class="icon-tasks"></i>  Etapa Registro', 'url' => array('/crm/personaEtapa/admin'), 'access' => 'action_personaEtapa_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'personaEtapa')),
//            array('label' => '<i class="icon-leaf"></i> Actividad Económica', 'url' => array('/crm/actividadEconomica/admin'), 'access' => 'action_actividadEconomica_admin', 'active_rules' => array('module' => 'crm', 'controller' => 'actividadEconomica')),
        );

        return self::generateMenu($items);
    }

    /**
     * Function to create a menu with acces rules and active item
     * @param array $items items to build the menu
     * @return array the formated menu
     */
    private static function generateMenu($items) {
        $menu = array();

        foreach ($items as $k => $item) {
            $access = false;
            $menu_item = $item;

            // Check children access
            if (isset($item['items'])) {
                $menu_item['items'] = array();
                // Check childrens access
                foreach ($item['items'] as $j => $children) {
                    if ($access = Yii::app()->user->checkAccess($children['access'])) {
                        $menu_item['items'][$j] = $children;
                        if (isset($children['active_rules']) && self::getActive2($children['active_rules'])) {
                            $menu_item['items'][$j]['active'] = true;
                            $menu_item['active'] = true;
                        }
                    }
                }
            } else {
                // Check item access
                if (isset($item['access'])) {
                    $access = Yii::app()->user->checkAccess($item['access']);
                } else {
                    $access = true;
                }
                // Check active
                if (isset($item['active_rules'])) {
                    $menu_item['active'] = self::getActive2($item['active_rules']);
                }
            }

            // If acces to the item or any child add to the menu
            if ($access) {
                $menu[] = $menu_item;
            }
        }

        return $menu;
    }

    /**
     * Function to compare the menu active rules with the current url
     * @param array $active_rules the array of rules to compare
     * @return boolean true if the rules match the current url
     */
//    private static function getActive($active_rules) {
//        $current = false;
//
//        if (self::$_controller) {
//            if (is_array(current($active_rules))) {
//                foreach ($active_rules as $rule) {
//                    $operator = isset($rule['operator']) ? $rule['operator'] : '==';
//
//                    if (isset($rule['module']) && self::$_controller->module) {
//                        if ($operator == "==")
//                            $current = self::$_controller->module->id == $rule['module'];
//                        if ($operator == "!=")
//                            $current = self::$_controller->module->id != $rule['module'];
//                    }
//                    if (isset($rule['controller'])) {
//                        if ($operator == "==")
//                            $current = self::$_controller->id == $rule['controller'];
//                        if ($operator == "!=")
//                            $current = self::$_controller->id != $rule['controller'];
//                    }
//                    if (isset($rule['action'])) {
//                        if ($operator == "==")
//                            $current = self::$_controller->action->id == $rule['action'];
//                        if ($operator == "!=")
//                            $current = self::$_controller->action->id != $rule['action'];
//                    }
//
//                    if (!$current)
//                        break;
//                }
//            } else {
//                $operator = isset($active_rules['operator']) ? $active_rules['operator'] : '==';
//
//                if (isset($active_rules['module']) && self::$_controller->module) {
//                    if ($operator == "==")
//                        $current = self::$_controller->module->id == $active_rules['module'];
//                    if ($operator == "!=")
//                        $current = self::$_controller->module->id != $active_rules['module'];
//                }
//                if (isset($active_rules['controller'])) {
//                    if ($operator == "==")
//                        $current = self::$_controller->id == $active_rules['controller'];
//                    if ($operator == "!=")
//                        $current = self::$_controller->id != $active_rules['controller'];
//                }
//                if (isset($active_rules['action'])) {
//                    if ($operator == "==")
//                        $current = self::$_controller->action->id == $active_rules['action'];
//                    if ($operator == "!=")
//                        $current = self::$_controller->action->id != $active_rules['action'];
//                }
//            }
//        }
//        return $current;
//    }


    private static function getActive2($active_rules) {
        $current = false;
        //MODULE
        $module = false;
        //CONTROLLER
        $controller = FALSE;
        //ACTION
        $action = false;
        if (self::$_controller) {
            if (is_array(current($active_rules))) {
                foreach ($active_rules as $rule) {
                    $operator = isset($rule['operator']) ? $rule['operator'] : '==';
                    if (isset($rule['module'])) {
                        if (self::$_controller->module) {
                            $module = self::BooleanOperator($operator, self::$_controller->module->id, $rule['module']);
                        }
                    } else {
                        $module = true;
                    }
                    if (isset($rule['controller'])) {
                        $controller = self::BooleanOperator($operator, self::$_controller->id, $rule['controller']);
                    } else {
                        $controller = true;
                    }
                    if (isset($rule['action'])) {
                        $action = self::BooleanOperator($operator, self::$_controller->action->id, $rule['action']);
                    } else {
                        $action = true;
                    }
                    if (!isset($rule['controller']) && !isset($rule['module']) && !isset($rule['action']))
                        $current = false;
                    else
                        $current = $module && $controller && $action;
                    if (!$current)
                        break;
                }
            } else {
                $operator = isset($active_rules['operator']) ? $active_rules['operator'] : '==';
                if (isset($active_rules['module'])) {
                    if (self::$_controller->module) {
                        $module = self::BooleanOperator($operator, self::$_controller->module->id, $active_rules['module']);
                    }
                } else {
                    $module = true;
                }
                if (isset($active_rules['controller'])) {
                    $controller = self::BooleanOperator($operator, self::$_controller->id, $active_rules['controller']);
                } else {
                    $controller = true;
                }
                if (isset($active_rules['action'])) {
                    $action = self::BooleanOperator($operator, self::$_controller->action->id, $active_rules['action']);
                } else {
                    $action = true;
                }
                if (!isset($active_rules['controller']) && !isset($active_rules['module']) && !isset($active_rules['action']))
                    $current = false;
                else
                    $current = $module && $controller && $action;
//                var_dump($current);
            }
        }
        return $current;
    }

    private static function BooleanOperator($operator, $compare1, $compare2) {
        $result = FALSE;
        if ($operator == "==")
            $result = $compare1 == $compare2;
        if ($operator == "!=")
            $result = $compare1 != $compare2;

        return $result;
    }

}
