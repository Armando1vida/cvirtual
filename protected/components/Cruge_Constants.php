<?php

/**
 * Constantes del modulo cruge
 * @author Miguel Alba <malba@tradesystem.com.ec>
 */
class Cruge_Constants {

    //constantes para roles
    const administradores_master = "administradores_master";
//    const administradores_master = "Administrar Usuarios";
    const usuarios_administradores = "usuarios_administradores";
    const vendedores = "vendedores";
    const gestionar_empresas = "gestionar_empresas";
    const usuarios_registrados = "usuarios_registrados";
    const admin = "admin";
    const admin_rol = "";

    public static function getGrupoTipoArray() {
        return array(
            self::usuarios_administradores => self::usuarios_administradores,
            self::vendedores => self::vendedores,
            self::administradores_master => self::administradores_master,
        );
    }

    public static function getUrlAdministracion($tipo) {
        if ($tipo) {
            if (in_array($tipo, getGrupoTipoArray())) {
                return "usermanagementadminroles";
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    /**
     * Metodo en el cual de acuerdo al nombre del rol se asignara
     * el rol de registro para el usuario a registrar
     * @author Miguel Alba <malba@tradesystem.com.ec>
     * @param String type $nameRol
     * @return String type
     */
    public static function getAsignarRolUsuario($nameRol) {
        $rolAsignado = "";
        switch ($nameRol) {
            case self::administradores_master:
                $rolAsignado = self::usuarios_administradores;
                break;
            case self::usuarios_administradores:
                $rolAsignado = self::vendedores;
                break;
            case self::vendedores:
                $rolAsignado = self::gestionar_empresas;
                break;
            case self::admin_rol:
                $rolAsignado = self::admin;
                break;
        }
        return $rolAsignado;
    }

    public static function getNameLabelRolUsuario($nameRol) {
        $rolAsignado = "";
        switch ($nameRol) {
            case self::administradores_master:
                $rolAsignado = self::usuarios_administradores;
                break;
            case self::usuarios_administradores:
                $rolAsignado = self::vendedores;
                break;
            case self::vendedores:
                $rolAsignado = self::gestionar_empresas;
                break;
            case self::admin_rol:
                $rolAsignado = self::admin;
                break;
        }
        return $rolAsignado;
    }

}
