<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{

    /**
     * Permission Categories
     *
     * @var array
     */
    public static $categories = [
        [1, 'affidavit'],
        [2, 'probate'],
        [3, 'probate_summary'],
        [4, 'probate_familyrelations'],
        [5, 'probate_familyresolution'],
        [6, 'probate_legalpublication'],
        [7, 'probate_bankenquiry'],
        [8, 'probate_pensionenquiry'],
        [9, 'probate_probateletter'],
        [10, 'probate_bankcertificate'],
        [11, 'probate_pensionstatement'],
        [12, 'probate_uploadeddocuments'],
        [13, 'probate_statutoryaffidavit'],
        [14, 'probate_justificationofsureties'],
        [15, 'probate_bigamount'],
        [16, 'probate_smallamount'],
        [17, 'probate_inventory'],
        [18, 'probate_inventoryresealing'],
        [19, 'probate_supplementaryresealing'],
        [20, 'probate_oathadmin'],
        [21, 'probate_oathadminwill'],
        [22, 'probate_affidavitattesting'], // 3
        [23, 'probate_adminbond'], // 3
        [24, 'probate_adminbondwill'], // 3
        [25, 'probate_renunciationadmin'], // 3
        [26, 'probate_letteradmin'], // 3
        [27, 'probate_reissuance'], // 5
        [28, 'probate_statutoryaffidavitexternal'], // 5
        [29, 'probate_caveat'], // 2
        [30, 'probate_wills'], // 14
        [31, 'revenue'], // 3
        [32, 'hr'], // 3
        [33, 'customer'], // 2
        [34, 'security'], // 2
    ];

    public static $permissions = [
        // the last item is a collection of privilege ids of privileges that should have the permission in question!
        [1, 'can_read_affidavit_application', 'read', 0 , [1,2,8,9]],
        [2, 'can_create_affidavit_application', 'create', 0 , [1,2,8,9]],
        [3, 'can_update_affidavit_application', 'update', 0 , [1,2,8,9]],
        [4, 'can_process_affidavit_application_payment', 'process', 0 , [1,2,8,9]],
        [5, 'can_query_affidavit_application', 'query', 0 , [1,2,8]],
        [6, 'can_approve_affidavit_application', 'approve', 0 , [1,2,8]],
        [7, 'can_preview_affidavit_application', 'preview', 0 , [1,2,8,9]],
        [8, 'can_create_probate_application', 'create', 1 , [1,2,10,6]],
        [9, 'can_read_probate_application', 'read', 1 , [1,2,10,6]],
        [10, 'can_edit_probate_application', 'edit', 1 , [1,2,10,6]],
        [11, 'can_process_probate_application_payment', 'process', 1 , [1,2,10,6]],
        [12, 'can_approve_probate_application', 'approve', 1 , [1,2,6]],
        [13, 'can_view_summary_section', 'view', 2 , [1,2]],
        [14, 'can_caveat_file', 'caveat', 2 , [1,2]],
        [15, 'can_put_file_on_hold', 'put', 2 , [1,2]],
        [16, 'can_view_family_relation_section', 'view', 3 , [1,2]],
        [17, 'can_add_family_relation_entry', 'add', 3 , [1,2]],
        [18, 'can_edit_family_relation_entry', 'edit', 3 , [1,2]],
        [19, 'can_view_family_resolution_section', 'view', 4 , [1,2]],
        [20, 'can_add_comment_on_family_resolution', 'add', 4 , [1,2]],
        [21, 'can_approve_or_terminate_family_resolution', 'approve', 4 , [1,2]],
        [22, 'can_view_legal_publication_section', 'view', 5 , [1,2]],
        [23, 'can_edit_legal_publication_entry', 'edit', 5 , [1,2]],
        [24, 'can_view_bank_enquiry_section', 'view', 6 , [1,2]],
        [25, 'can_edit_bank_enquiry_entry', 'edit', 6 , [1,2]],
        [26, 'can_generate_bank_enquiry_loe', 'generate', 6 , [1,2]],
        [27, 'can_view_pension_enquiry_section', 'view', 7 , [1,2]],
        [28, 'can_edit_pension_enquiry_entry', 'edit', 7 , [1,2]],
        [29, 'can_generate_pension_enquiry_loe', 'generate', 7 , [1,2]],
        [30, 'can_view_probate_letter_section', 'view', 8 , [1,2]],
        [31, 'can_edit_probate_letter_entry', 'edit', 8 , [1,2]],
        [32, 'can_generate_probate_letter', 'generate', 8 , [1,2]],
        [33, 'can_view_bank_certificate_section', 'view', 9 , [1,2]],
        [34, 'can_edit_bank_certificate_entry', 'edit', 9 , [1,2]],
        [35, 'can_generate_bank_certificate_letter', 'generate', 9 , [1,2]],
        [36, 'can_view_pension_statement_section', 'view', 10 , [1,2]],
        [37, 'can_edit_pension_statement_entry', 'edit', 10 , [1,2]],
        [38, 'can_generate_pension_statement_letter', 'generate', 10 , [1,2]],
        [39, 'can_view_uploaded_documents_section', 'view', 11 , [1,2]],
        [40, 'can_view_uploaded_documents_entry', 'view', 11 , [1,2]],
        [41, 'can_add_probate_document', 'add', 11 , [1,2]],
        [42, 'can_edit_uploaded_documents_entry', 'edit', 11 , [1,2]],
        [43, 'can_delete_uploaded_documents_entry', 'delete', 11 , [1,2]],
        [44, 'can_view_statutory_affidavit_of_nok_section', 'view', 12 , [1,2]],
        [45, 'can_edit_statutory_affidavit_of_nok_entry', 'edit', 12 , [1,2]],
        [46, 'can_generate_statutory_affidavit_of_nok_letter', 'generate', 12 , [1,2]],
        [47, 'can_view_justification_of_sureties_section', 'view', 13 , [1,2]],
        [48, 'can_edit_justification_of_sureties_entry', 'edit', 13 , [1,2]],
        [49, 'can_generate_justification_of_sureties_letter', 'generate', 13 , [1,2]],
        [50, 'can_view_big_amount_form_section', 'view', 14 , [1,2]],
        [51, 'can_add_big_amount_form_entry', 'add', 14 , [1,2]],
        [52, 'can_edit_big_amount_form_entry', 'edit', 14 , [1,2]],
        [53, 'can_generate_big_amount_form_letter', 'generate', 14 , [1,2]],
        [54, 'can_view_small_amount_form_section', 'view', 15 , [1,2]],
        [55, 'can_add_small_amount_form_entry', 'add', 15 , [1,2]],
        [56, 'can_edit_small_amount_form_entry', 'edit', 15 , [1,2]],
        [57, 'can_generate_small_amount_form_letter', 'generate', 15 , [1,2]],
        [58, 'can_view_inventory_section', 'view', 16 , [1,2]],
        [59, 'can_edit_inventory_entry', 'edit', 16 , [1,2]],
        [60, 'can_generate_inventory_letter', 'generate', 16 , [1,2]],
        [61, 'can_view_inventory_to_resealing_section', 'view', 17 , [1,2]],
        [62, 'can_edit_inventory_to_resealing_entry', 'edit', 17 , [1,2]],
        [63, 'can_process_inventory_to_resealing_inventory', 'process', 17 , [1,2]],
        [64, 'can_process_inventory_to_resealing_payment', 'pay', 17 , [1,2]],
        [65, 'can_generate_inventory_to_resealing_letter', 'generate', 17 , [1,2]],
        [66, 'can_view_supplementary_to_resealing_section', 'view', 18 , [1,2]],
        [67, 'can_read_supplementary_to_resealing_entry', 'read', 18 , [1,2]],
        [68, 'can_edit_supplementary_to_resealing_entry', 'edit', 18 , [1,2]],
        [69, 'can_process_supplementary_to_resealing_inventory', 'process', 18 , [1,2]],
        [70, 'can_process_supplementary_to_resealing_payment', 'process', 18 , [1,2]],
        [71, 'can_generate_supplementary_to_resealing_letter', 'generate', 18 , [1,2]],
        [72, 'can_view_oath_of_administration_section', 'view', 19 , [1,2]],
        [73, 'can_edit_oath_of_administration_entry', 'edit', 19 , [1,2]],
        [74, 'can_generate_oath_of_administration_letter', 'generate', 19 , [1,2]],
        [75, 'can_view_oath_of_admin_with_will_section', 'view', 20 , [1,2]],
        [76, 'can_edit_oath_of_admin_with_will_entry', 'edit', 20 , [1,2]],
        [77, 'can_generate_oath_of_admin_with_will_letter', 'generate', 20 , [1,2]],
        [78, 'can_view_affidavit_of_attesting_witness_of_will_section', 'view', 21 , [1,2]],
        [79, 'can_edit_affidavit_of_attesting_witness_of_will_entry', 'edit', 21 , [1,2]],
        [80, 'can_generate_affidavit_of_attesting_witness_of_will_letter', 'generate', 21 , [1,2]],
        [81, 'can_view_admin_bond_without_will_section', 'view', 22 , [1,2]],
        [82, 'can_edit_admin_bond_without_will_entry', 'edit', 22 , [1,2]],
        [83, 'can_generate_admin_bond_without_will_letter', 'generate', 22 , [1,2]],
        [84, 'can_view_admin_bond_with_will_section', 'view', 23 , [1,2]],
        [85, 'can_edit_admin_bond_with_will_entry', 'edit', 23 , [1,2]],
        [86, 'can_generate_admin_bond_with_will_letter', 'generate', 23 , [1,2]],
        [87, 'can_view_renunciation_of_admin_without_will_section', 'view', 24 , [1,2]],
        [88, 'can_edit_renunciation_of_admin_without_will_entry', 'edit', 24 , [1,2]],
        [89, 'can_generate_renunciation_of_admin_without_will_letter', 'generate', 24 , [1,2]],
        [90, 'can_view_letter_of_admin_section', 'view', 25 , [1,2]],
        [91, 'can_edit_letter_of_admin_entry', 'edit', 25 , [1,2]],
        [92, 'can_generate_letter_of_admin_letter', 'generate', 25 , [1,2]],
        [93, 'can_create_reissuance_application', 'create', 26 , [1,2]],
        [94, 'can_read_reissuance_application_entry', 'read', 26 , [1,2]],
        [95, 'can_edit_reissuance_application_entry', 'edit', 26 , [1,2]],
        [96, 'can_process_reissuance_application_payment', 'process', 26 , [1,2]],
        [97, 'can_approve_reissuance_application', 'approve', 26 , [1,2]],
        [98, 'can_create_statutory_affidavit_application', 'create', 27 , [1,2]],
        [99, 'can_read_statutory_affidavit_application_entry', 'read', 27 , [1,2]],
        [100, 'can_edit_statutory_affidavit_application_entry', 'edit', 27 , [1,2]],
        [101, 'can_process_statutory_affidavit_payment', 'process', 27 , [1,2]],
        [102, 'can_generate_statutory_affidavit_letter', 'generate', 27 , [1,2]],
        [103, 'can_read_caveat', 'read', 28 , [1,2]],
        [104, 'can_remove_caveat', 'remove', 28 , [1,2]],
        [105, 'can_read_rejected_requests', 'read', 29 , [1,2]],
        [106, 'can_read_rejected_request_entry', 'read', 29 , [1,2]],
        [107, 'can_create_will_deposit', 'create', 29 , [1,2]],
        [108, 'can_read_request', 'read', 29 , [1,2]],
        [109, 'can_view_request_details', 'view', 29 , [1,2]],
        [110, 'can_read_codicil', 'read', 29 , [1,2]],
        [111, 'can_create_codicil', 'create', 29 , [1,2]],
        [112, 'can_retrieve_record', 'retrieve', 29 , [1,2]],
        [113, 'can_read_will', 'read', 29 , [1,2]],
        [114, 'can_edit_request', 'edit', 29 , [1,2]],
        [115, 'can_process_request_payment', 'process', 29 , [1,2]],
        [116, 'can_approve_request', 'approve', 29 , [1,2]],
        [117, 'can_reject_request', 'reject', 29 , [1,2]],
        [118, 'can_generate_request_letter', 'generate', 29 , [1,2]],
        [119, 'can_read_payment_details', 'read', 30 , [1,2, 4, 5]],
        [120, 'can_read_transaction_details', 'read', 30 , [1,2, 4, 5]],
        [121, 'can_update_service_fee', 'update', 30 , [1,2, 4]],
        [122, 'can_add_employee', 'add', 31 , [1,2]],
        [123, 'can_view_employee_details', 'view', 31 , [1,2]],
        [124, 'can_edit_employee_details', 'edit', 31 , [1,2]],
        [125, 'can_read_customer_details', 'read', 32 , [1,2]],
        [126, 'can_read_application_details', 'read', 32 , [1,2]],
        [127, 'can_activate_or_deactivate_user', 'activate', 33 , [1,2]],
        [128, 'can_add_authorisations', 'add', 33, [1,2]]
    ];


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $permission = $this->faker->unique()->randomElement(self::$permissions);
        return [
            'id' => $permission[0],
            'name' => $permission[1],
            'code' => $permission[2],
            'category' => self::$categories[$permission[3]][1],
            'created_at' => now(),
        ];
    }
}
