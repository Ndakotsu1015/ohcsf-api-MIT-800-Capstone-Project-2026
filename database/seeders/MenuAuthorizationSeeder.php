<?php

namespace Database\Seeders;

use Database\Factories\MenuAuthorizationFactory;
use Database\Factories\PrivilegeFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuAuthorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get privilege id's to prevent guessing games
        $superadminId = PrivilegeFactory::getPrivilegeIdByName('Super Administrator');
        $administratorId = PrivilegeFactory::getPrivilegeIdByName('Administrator');
        $revenueAdminId = PrivilegeFactory::getPrivilegeIdByName('Revenue Administrator');
        $revenueStaffId = PrivilegeFactory::getPrivilegeIdByName('Revenue Staff');
        $processAdminId = PrivilegeFactory::getPrivilegeIdByName('Process Administrator');
        $processStaffId = PrivilegeFactory::getPrivilegeIdByName('Process Staff');
        $adminFreshFileId = PrivilegeFactory::getPrivilegeIdByName('Admin-Fresh-File');
        $probateAdminId = PrivilegeFactory::getPrivilegeIdByName('Probate Administrator');

        // get all menus categorized by their modules
        $affidavitMenus = MenuAuthorizationFactory::getAffidavitMenus();
        $revenueMenus = MenuAuthorizationFactory::getRevenueMenus();
        $hrMenus = MenuAuthorizationFactory::getHrMenus();
        $securityMenus = MenuAuthorizationFactory::getSecurityMenus();
        $settingsMenus = MenuAuthorizationFactory::getSettingsMenus();
        $probateMenus = MenuAuthorizationFactory::getProbateMenus();
        $customerMenus = MenuAuthorizationFactory::getCustomerMenus();
        $reportMenus = MenuAuthorizationFactory::getReportMenus();
        $agentMenus = MenuAuthorizationFactory::getAgentMenus();
        $processMenus = MenuAuthorizationFactory::getProcessMenus();

        // nitpicking out unique menus for each privilege
        $superAdminMenuIds = array_merge($affidavitMenus, $revenueMenus, $hrMenus, $probateMenus, $customerMenus, $reportMenus, $agentMenus, $securityMenus, $settingsMenus, $processMenus);
        $administratorMenuIds = array_merge($affidavitMenus, $revenueMenus, $hrMenus, $probateMenus, $customerMenus, $reportMenus, $agentMenus);
        $revenueAdministratorMenuIds = $revenueMenus;
        $revenueStaffMenuIds = array_diff($revenueMenus, [9]); // without "service fee" menu
        $processAdministratorMenuIds = $affidavitMenus;
        $processStaffMenuIds = $affidavitMenus;
        $adminFreshFileMenuIds = [31,32,33,34,35];
        $probateAdminMenuIds = $probateMenus;

        // prepare menuauthorization data for upsert
        $menuData = [];

        // Helper function to populate menu data
        $this->populateMenuData($menuData, $superAdminMenuIds, $superadminId);
        $this->populateMenuData($menuData, $administratorMenuIds, $administratorId);
        $this->populateMenuData($menuData, $revenueAdministratorMenuIds, $revenueAdminId);
        $this->populateMenuData($menuData, $revenueStaffMenuIds, $revenueStaffId);
        $this->populateMenuData($menuData, $processAdministratorMenuIds, $processAdminId);
        $this->populateMenuData($menuData, $processStaffMenuIds, $processStaffId);
        $this->populateMenuData($menuData, $adminFreshFileMenuIds, $adminFreshFileId);
        $this->populateMenuData($menuData, $probateAdminMenuIds, $probateAdminId);

        // Use upsert to insert or update data based on menu_id and privilege_id
        DB::table('menu_authorizations')->upsert(
            $menuData,
            ['menu_id', ], // Conflict detection based on these columns
            ['privilege_id','created_at', ]  // Columns to update
        );
    }

    /**
     * Populate menu data array for upsert.
     *
     * @param array $menuData
     * @param array $menuIds
     * @param int $privilegeId
     * @return void
     */
    private function populateMenuData(&$menuData, $menuIds, $privilegeId)
    {
        foreach ($menuIds as $menuId) {
            array_push($menuData, [
                'menu_id' => $menuId,
                'privilege_id' => $privilegeId,
                'created_at' => now(),
            ]);
        }
    }
}
