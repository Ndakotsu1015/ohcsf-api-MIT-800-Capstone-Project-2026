<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var  string
     */
    protected $model = Module::class;
    /**
     * a list of modules to be seeded
     *
     * id
     * name
     * order_by
     * active_id
     * is_client_active
     * url
     * client_url
     * icon
     * summary
     * client_summary
     *
     * @var array
     */
    public static $modules = [
        // [0,'Generic',0,0,'#/','','','',''],
        [1, 'Self Service', 1, 1, true, 'module/affidavit/dashboard', '/portal/affidavit/dashboard', 'assets/img/undraw_judge_katerina_limpitsouni_ny-1-q.svg', 'Track Affidavit activities and information here', 'create and track affidavit activities', 'assets/images/illustration/undraw_judge.svg'],
        // [2, 'Revenue', 4, 1, false, 'module/revenue/dashboard', 'client_revenue', 'assets/img/undraw_segmentation_re_gduq.svg', 'Track and Manage Financial Operations here', 'create and track revenue activities', ''],
        [3, 'Human Resources', 5, 1, false, 'module/hr/dashboard', 'client_hr', 'assets/img/undraw_experts_re_i40h.svg', 'Employee Record Management database here', 'create and track HR activities', ''],
        [4, 'Security', 6, 1, false, 'module/security/dashboard', 'client_security', 'assets/img/undraw_security_on_re_e491.svg', 'Manage security related activities here', 'create and track security activities', ''],
        [2, 'Settings', 7, 1, false, 'module/settings/dashboard', 'client_settings', 'assets/img/undraw_slider_re_ch7w.svg', 'Customize and Modify This Application Settings', 'create and track settings activities', ''],
        // [6, 'Probate', 3, 1, false, 'module/probate/dashboard', '/portal/probate', 'assets/img/undraw_wall_post_re_y78d.svg', 'Track Probate and Process activities here', 'create and track probate activities', 'assets/images/illustration/undraw_wall_post.svg'],
        // [7, 'Customers', 9, 1, false, 'module/customer/dashboard', 'client_customers', 'assets/img/undraw_connection_re_lcud.svg', 'Track customer details here', 'create and track customer activities', ''],
        // [8, 'Reports', 10, 1, false, 'module/report/dashboard', 'client_reports', 'assets/img/undraw_data_reports_706v.svg', 'Track reporting details here', 'create and track report activities', ''],
        // [9, 'Agents', 8, 1, false, 'module/agent/dashboard', 'client_agents', 'assets/img/undraw_active_support_re_b7sj.svg', 'View all agent details here', 'create and track agent activities', ''],
        // [10, 'Process', 2, 1, false, 'module/process/dashboard', 'client_process', 'assets/img/undraw_join_re_w1lh.svg', 'Track Process activities and information here', 'create and track process activities', ''],
    ];


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $module = $this->faker->unique()->randomElement(self::$modules);
        // $module = self::$modules[$rndNum];
        return [
            'id' => $module[0],
            'name' => $module[1],
            'order_by' => $module[2],
            'active_id' => $module[3],
            'is_client_active' => $module[4],
            'url' => $module[5],
            'client_url' => $module[6],
            'created_by' => \App\Models\User::inRandomOrder()->first(),
            // 'modified_by' => $this->faker->randomNumber(),
            'icon' => $module[7],
            'client_icon' => $module[10],
            'summary' => $module[8],
            'client_summary' => $module[9],
            'bg_class' => $this->faker->word,
        ];
    }
}
