<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuAuthorization>
 */
class MenuAuthorizationFactory extends Factory
{

    // private $allModules = ModuleFactory::$modules;

    /**
     * Menu's for each role
     *
     * @var array
     */

     public static function getMenusByModuleId($moduleId)
    {
        $menus = array();
        foreach(MenuFactory::$menus as $menu) {
            if($menu[7] == $moduleId) {
                array_push($menus, $menu[0]);
            }
        }
        return $menus;
    }

    //1. Affidavit
    public static function getAffidavitMenus()
    {
        $moduleName = 'Affidavit';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    //2. Revenue
    public static function getRevenueMenus()
    {
        $moduleName = 'Revenue';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    //3. HR
    public static function getHrMenus()
    {
        $moduleName = 'Human Resources';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    //4. Security
    public static function getSecurityMenus()
    {
        $moduleName = 'Security';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    //5. Settings
    public static function getSettingsMenus()
    {
        $moduleName = 'Settings';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    //6. Probate
    public static function getProbateMenus()
    {
        $moduleName = 'Probate';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    //7. Customer Module
    public static function getCustomerMenus()
    {
        $moduleName = 'Customers';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    //8. Report Module
    public static function getReportMenus()
    {
        $moduleName = 'Reports';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    //9. Agent Module
    public static function getAgentMenus()
    {
        $moduleName = 'Agents';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    //10. Process Module
    public static function getProcessMenus()
    {
        $moduleName = 'Process';
        foreach (ModuleFactory::$modules as $module) {
            if ($module[1] == $moduleName) {
                return self::getMenusByModuleId($module[0]);
            }
        }
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
