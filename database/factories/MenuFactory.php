<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 * id
 * title
 * link
 * order
 * is_active
 * icon
 * parent_id
 * module_id
 */
class MenuFactory extends Factory
{

    public static $menus = [
        [1, 'Dashboard', 'module/affidavit/dashboard', 1, 1, 'home', null, 1],
        [2, 'List of Affidavits', 'module/affidavit/affidavits/list', 1, 1, 'circle', 3, 1],
        [3, 'Affidavits', '#', 3, 1, 'file', null, 1],
        [4, 'Affidavit Templates', 'module/affidavit/templates/list', 8, 1, 'layers', null, 2],
        [5, 'Dashboard', 'module/revenue/dashboard', 5, 1, 'home', null, 2],
        [6, 'Payments List', 'module/revenue/payments/list', 6, 1, 'list', null, 2],
        [7, 'Collect Payment', 'module/revenue/payments/collect', 6, 1, 'credit-card', null, 2],
        [19, 'Other Payment', 'module/revenue/other-payment/list', 6, 1, 'calendar', null, 2],
        [8, 'Validate Payment', 'module/revenue/payments/validate', 7, 1, 'check-circle', null, 2],
        [9, 'Service Fee', 'module/revenue/service-fee/list', 7, 1, 'calendar', null, 2],
        [10, 'Dashboard', 'module/hr/dashboard', 8, 1, 'home', null, 3],
        [11, 'New Employee', 'module/hr/employees/new', 9, 1, 'user-plus', null, 3],
        [12, 'Employee List', 'module/hr/employees/list', 10, 1, 'users', null, 3],
        [13, 'Dashboard', 'module/security/dashboard', 11, 1, 'home', null, 4],
        [14, 'Users List', 'module/security/users/list', 12, 1, 'users', null, 4],
        // To Do: migrate these to security module
        [15, 'Menu Authorisation', 'menu/menuauthorise', 12, 1, 'columns', null, 4],
        [16, 'Privilege Assignment', 'privilege/privilege-detail', 12, 1, 'eye-off', null, 4],
        [17, 'General Settings', '#', 2, 1, 'settings', null, 5],
        [18, 'Manage Courts', 'module/settings/courts', 9, 1, 'circle', 17, 5],
        // [19, 'Manage LGAs', 'module/settings/lgas', 2, 1, 'circle', 17, 5],
        [20, 'Affidavit Settings', 'module/settings/affidavit-settings', 3, 1, 'circle', 17, 5],
        // To Do: migrate these to settings module
        [21, 'Menus', 'menu/menu', 4, 1, 'circle', 80, 5],
        [22, 'Privileges', 'privilege/privilege', 5, 1, 'circle', 80, 5],
        [23, 'Privilege Class', 'privilege/privilege-class', 6, 1, 'circle', 80, 5],
        [24, 'All Applications', 'module/affidavit/applications/list', 2, 1, 'circle', 3, 1],
        [25, 'List Approved', 'module/affidavit/applications/list-approved', 3, 1, 'circle', 3, 1],
        [26, 'List Pending', 'module/affidavit/applications/list-pending', 4, 1, 'circle', 3, 1],
        [27, 'List Queried', 'module/affidavit/applications/list-queried', 5, 1, 'circle', 3, 1],
        [28, 'List Draft', 'module/affidavit/applications/list-draft', 6, 1, 'circle', 3, 1],
        // settings
        [29, 'Payment Settings', 'module/settings/payment-settings', 7, 1, 'circle', 17, 5],
        [30, 'Dashboard', 'module/probate/dashboard', 1, 1, 'home', null, 6],
        [31, 'Probate Files', '#', 3, 1, 'file-text', null, 6],
        [32, 'List Files', 'module/probate/file/list', 1, 1, 'circle', 31, 6],
        [33, 'Applications', '#', 3, 1, 'file', null, 6],
        [34, 'All Applications', 'module/probate/draft/list', 2, 1, 'circle', 33, 6],
        [35, 'New Application', 'module/probate/draft/new', 1, 1, 'circle', 33, 6],
        // settings
        [36, 'Pension Managers', 'module/settings/pension-manager', 7, 1, 'circle', 17, 5],
        [37, 'Manage Newspapers', 'module/settings/newspaper', 8, 1, 'circle', 17, 5],
        // [38, 'Will Deposit', 'module/probate/will-deposit/list', 4, 2, 'archive', null, 6],
        // will deposit menu keeps showing up even after setting it to inactive,
        // so i just duplicated and change the menu to the new menu from $otherMenus
        [38, 'Deposit', 'module/probate/will-deposit/list', 3, 1, 'circle', 68, 6],
        // settings
        [39, 'Dashboard', 'module/settings/dashboard', 1, 1, 'home', null, 5],
        [40, 'Manage Banks', 'module/settings/banks', 10, 1, 'circle', 17, 5],
        [41, 'Manage Currency', 'module/settings/currency', 11, 1, 'circle', 17, 5],
        [42, 'New Application', 'module/affidavit/applications/new', 1, 1, 'circle', 3, 1], //
        [43, 'Transactions List', 'module/revenue/payments/list-transactions', 6, 1, 'list', null, 2],
        [44, 'Probate Settings', 'module/settings/probate-settings', 3, 1, 'circle', 17, 5],
        [45, 'Dashboard', 'module/customer/dashboard', 1, 1, 'home', null, 7],
        [46, 'All Customers', 'module/customer/list', 2, 1, 'list', null, 7],
        [47, 'Dashboard', 'module/report/dashboard', 1, 1, 'circle', null, 8],
        [48, 'Affidavit Reports', 'module/report/affidavit-report', 2, 1, 'circle', null, 8],
        [49, 'Payments', '#', 3, 1, 'circle', null, 8],
        [50, 'Affidavit Payments', 'module/report/affidavit-payment', 1, 1, 'circle', 49, 8],
        [51, 'Split Payments', 'module/report/split-payment', 2, 1, 'circle', 49, 8],
        [52, 'Verify Paystack-Payment', 'module/revenue/payments/verify-paystack', 7, 1, 'check-circle', null, 2],
        [53, 'Dashboard', 'module/agent/dashboard', 1, 1, 'circle', null, 9],
        // [54, 'Legal', 'module/agent/legal', 2, 1, 'circle', null, 9],
        // [55, 'All', 'module/agent/legal/list/all', 1, 1, 'circle', 54, 9],
        // [56, 'Approved', 'module/agent/legal/list/approved', 2, 1, 'circle', 54, 9],
        // [57, 'Pending', 'module/agent/legal/list/pending', 3, 1, 'circle', 54, 9],
        [58, 'Partners', 'module/agent/partner', 3, 1, 'circle', null, 9],
        [59, 'All', 'module/agent/partner/list/all', 1, 1, 'circle', 58, 9],
        [60, 'Approved', 'module/agent/partner/list/approved', 2, 1, 'circle', 58, 9],
        [61, 'Pending', 'module/agent/partner/list/pending', 3, 1, 'circle', 58, 9],
        // settings
        // agent settings menus
        [62, 'Agent Subscriptions', 'module/settings/agent-sub-setting', 13, 1, 'circle', 79, 5],
        [63, 'Document Checklist', 'module/settings/agent-doc-checklist-setting', 14, 1, 'circle', 79, 5],
        [64, 'Statutory Affidavit Of NOK', 'module/probate/statutory-affidavit-of-nok/list', 4, 1, 'file-text', null, 6],
        [65, 'Justification Of Surety', 'module/probate/justification-of-surety/list', 4, 0, 'award', null, 6],
        [66, 'Caveats', 'module/probate/caveat/list', 7, 1, 'alert-triangle', null, 6],
        [67, 'Resealing', '#', 8, 1, 'droplet', null, 6],
        [68, 'Wills', '#', 9, 1, 'book-open', null, 6],
        // [69, 'Deposit', 'module/probate/will-deposit/list', 2, 1, 'circle', 68, 6],
        [69, 'Requests List', 'module/probate/will-requests/list', 2, 1, 'circle', 68, 6],
        [70, 'Codicil', 'module/probate/codicil/list', 4, 1, 'circle', 68, 6],
        [71, 'Retrieval', 'module/probate/retrieval/list', 4, 1, 'circle', 68, 6],
        [72, 'Reading', 'module/probate/reading/list', 5, 1, 'circle', 68, 6],
        [73, 'Search', 'module/probate/will/search', 1, 1, 'circle', 68, 6],
        [74, 'New Application', 'module/probate/resealing-draft/new', 1, 1, 'circle', 67, 6],
        [75, 'List Applications', 'module/probate/resealing-draft/list', 2, 1, 'circle', 67, 6],
        [76, 'List Files', 'module/probate/resealing-file/list', 3, 1, 'circle', 67, 6],
        [77, 'Activity Log', 'module/security/users/activity-log', 100, 1, 'list', null, 4],
        // Reissuance
        [78, 'Re-issuance', 'module/probate/re-issuance/list', 2, 1, 'circle', 31, 6],
        // settings
        [79, 'Agent Settings', '#', 3, 1, 'globe', null, 5],
        [80, 'Privilege Settings', '#', 4, 1, 'layers', null, 5],
        [81, 'Maintenance', 'module/settings/maintenance', 10, 1, 'circle', 17, 5],
        [82, 'Publication Payments', 'module/revenue/payments/legal-publication/list', 6, 1, 'list', null, 2],
        // integrators
        [93, 'Integrators', 'module/agent/integrator', 4, 1, 'circle', null, 9],
        [94, 'New', 'module/agent/integrator/new', 1, 1, 'circle', 91, 9],
        [95, 'All', 'module/agent/integrator/list/all', 2, 1, 'circle', 91, 9],
        [96, 'Approved', 'module/agent/integrator/list/approved', 3, 1, 'circle', 91, 9],
        [97, 'Pending', 'module/agent/integrator/list/pending', 4, 1, 'circle', 91, 9],
        //  process
        [83, 'Dashboard', 'module/process/dashboard', 1, 1, 'home', null, 10],
        [84, 'Process', '#', 2, 1, 'file', null, 10],
        [85, 'New Application', 'module/process/applications/new', 2, 1, 'circle', 84, 10],
        [86, 'All Applications', 'module/process/applications/list', 3, 1, 'circle', 84, 10],
        [87, 'List Approved', 'module/process/applications/list-approved', 4, 1, 'circle', 84, 10],
        [88, 'List Pending', 'module/process/applications/list-pending', 5, 1, 'circle', 84, 10],
        // more revenue menus
        [89, 'Verify Remita-Payment', 'module/revenue/payments/verify-remita', 7, 1, 'check-circle', null, 2],
        //more settings menus
        [90, 'Agent Access Codes', 'module/settings/agent-access-code-setting', 10, 1, 'unlock', 17, 5],
        [91, 'Manage Modules', 'module/settings/module-settings', 11, 1, 'circle', 17, 5],
        [92, "Manage Court's Modules", 'module/settings/court-module-setting', 12, 1, 'circle', 17, 5],

    ];

    public static $menusAdditional = [
        // id * title * link * order * is_active * icon * parent_id * module_id
        [98, 'Reconcile Payments', 'module/revenue/payments/reconcile-payment-entry', 10, 1, 'circle', null, 2],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $menu = $this->faker->unique()->randomElement(self::$menus);
        return [
            'id' => $menu[0],
            'title' => $menu[1],
            'link' => $menu[2],
            'order' => $menu[3],
            'is_active' => $menu[4],
            'icon' => $menu[5],
            'parent_id' => $menu[6],
            'module_id' => $menu[7],
            'created_at' => date('Y-m-d')
        ];
    }
}
