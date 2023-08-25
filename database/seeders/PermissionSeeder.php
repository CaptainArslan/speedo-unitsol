<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'view_dashboard',
                'guard_name' => 'web',
                'title' => 'Dashboard',
                'category' => 'dashboard',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'dashboard',
            ],  [
                'name' => 'add_dashboard',
                'guard_name' => 'web',
                'title' => 'Dashboard',
                'category' => 'dashboard',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'dashboard',
            ], [
                'name' => 'edit_dashboard',
                'guard_name' => 'web',
                'title' => 'Dashboard',
                'category' => 'dashboard',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'dashboard',
            ], [
                'name' => 'delete_dashboard',
                'guard_name' => 'web',
                'title' => 'Dashboard',
                'category' => 'dashboard',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'dashboard',
            ], 
            [
                'name' => 'view_class_scedule',
                'guard_name' => 'web',
                'title' => 'Class Scedule',
                'category' => 'class_scedule',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'dashboard',
            ],  [
                'name' => 'show_class_scedule',
                'guard_name' => 'web',
                'title' => 'Class Scedule',
                'category' => 'class_scedule',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'dashboard',
            ], [
                'name' => 'view_timing',
                'guard_name' => 'web',
                'title' => 'Timming',
                'category' => 'timing',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'dashboard',
            ],  [
                'name' => 'add_timing',
                'guard_name' => 'web',
                'title' => 'Timming',
                'category' => 'timing',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'dashboard',
            ], [
                'name' => 'edit_timing',
                'guard_name' => 'web',
                'title' => 'Timming',
                'category' => 'timing',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'dashboard',
            ], [
                'name' => 'delete_timing',
                'guard_name' => 'web',
                'title' => 'Timming',
                'category' => 'timing',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'dashboard',
            ], [
                'name' => 'view_schedule',
                'guard_name' => 'web',
                'title' => 'Schedule',
                'category' => 'schedule',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'calendar-check',
            ], [
                'name' => 'add_schedule',
                'guard_name' => 'web',
                'title' => 'Schedule',
                'category' => 'schedule',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'calendar-check',
            ], [
                'name' => 'edit_schedule',
                'guard_name' => 'web',
                'title' => 'Schedule',
                'category' => 'schedule',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'calendar-check',
            ], [
                'name' => 'delete_schedule',
                'guard_name' => 'web',
                'title' => 'Schedule',
                'category' => 'schedule',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'calendar-check',
            ], [
                'name' => 'view_class_type',
                'guard_name' => 'web',
                'title' => 'Class Type',
                'category' => 'class_type',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'add_class_type',
                'guard_name' => 'web',
                'title' => 'Class Type',
                'category' => 'class_type',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'edit_class_type',
                'guard_name' => 'web',
                'title' => 'Class Type',
                'category' => 'class_type',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'delete_class_type',
                'guard_name' => 'web',
                'title' => 'Class Type',
                'category' => 'class_type',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'view_term_base_booking',
                'guard_name' => 'web',
                'title' => 'Term Base Booking',
                'category' => 'term_base_booking',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'invest',
            ], [
                'name' => 'add_term_base_booking',
                'guard_name' => 'web',
                'title' => 'Term Base Booking',
                'category' => 'term_base_booking',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'invest',
            ], [
                'name' => 'edit_term_base_booking',
                'guard_name' => 'web',
                'title' => 'Term Base Booking',
                'category' => 'term_base_booking',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'invest',
            ], [
                'name' => 'delete_term_base_booking',
                'guard_name' => 'web',
                'title' => 'Term Base Booking',
                'category' => 'term_base_booking',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'invest',
            ], [
                'name' => 'copy_term_base_booking',
                'guard_name' => 'web',
                'title' => 'Term Base Booking',
                'category' => 'term_base_booking',
                'display_name' => 'Copy Term',
                'type' => 'Main',
                'icon' => 'invest',
            ], [
                'name' => 'moderate_term_base_booking',
                'guard_name' => 'web',
                'title' => 'Term Base Booking',
                'category' => 'term_base_booking',
                'display_name' => 'Moderate Booking',
                'type' => 'Main',
                'icon' => 'invest',
            ], [
                'name' => 'view_assesment_request',
                'guard_name' => 'web',
                'title' => 'Assesment Request',
                'category' => 'assesment_request',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'question',
            ],  [
                'name' => 'edit_assesment_request',
                'guard_name' => 'web',
                'title' => 'Assesment Request',
                'category' => 'assesment_request',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'question',
            ], [
                'name' => 'delete_assesment_request',
                'guard_name' => 'web',
                'title' => 'Assesment Request',
                'category' => 'assesment_request',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'question',
            ], [
                'name' => 'view_class_promot_request',
                'guard_name' => 'web',
                'title' => 'Class Promot Request',
                'category' => 'class_promot_request',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'file-doc',
            ],  [
                'name' => 'accept_class_promot_request',
                'guard_name' => 'web',
                'title' => 'Class Promot Request',
                'category' => 'class_promot_request',
                'display_name' => 'Accept Request',
                'type' => 'Main',
                'icon' => 'file-doc',
            ],
            [
                'name' => 'view_asset_type',
                'guard_name' => 'web',
                'title' => 'Asset Type',
                'category' => 'asset_type',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'add_asset_type',
                'guard_name' => 'web',
                'title' => 'Asset Type',
                'category' => 'asset_type',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'edit_asset_type',
                'guard_name' => 'web',
                'title' => 'Asset Type',
                'category' => 'asset_type',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'delete_asset_type',
                'guard_name' => 'web',
                'title' => 'Asset Type',
                'category' => 'asset_type',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'view_assessment',
                'guard_name' => 'web',
                'title' => 'Assessment',
                'category' => 'assessment',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'update',
            ], [
                'name' => 'add_assessment',
                'guard_name' => 'web',
                'title' => 'Assessment',
                'category' => 'assessment',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'update',
            ], [
                'name' => 'edit_assessment',
                'guard_name' => 'web',
                'title' => 'Assessment',
                'category' => 'assessment',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'update',
            ], [
                'name' => 'delete_assessment',
                'guard_name' => 'web',
                'title' => 'Assessment',
                'category' => 'assessment',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'update',
            ], [
                'name' => 'view_student',
                'guard_name' => 'web',
                'title' => 'Student',
                'category' => 'student',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'users',
            ], [
                'name' => 'detail_student',
                'guard_name' => 'web',
                'title' => 'Student',
                'category' => 'student',
                'display_name' => 'Profile',
                'type' => 'Main',
                'icon' => 'users',
            ], [
                'name' => 'edit_student',
                'guard_name' => 'web',
                'title' => 'Student',
                'category' => 'student',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'users',
            ], [
                'name' => 'view_setting',
                'guard_name' => 'web',
                'title' => 'Setting',
                'category' => 'setting',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'setting-alt',
            ], [
                'name' => 'email_setting',
                'guard_name' => 'web',
                'title' => 'Setting',
                'category' => 'setting',
                'display_name' => 'Email Setting',
                'type' => 'Main',
                'icon' => 'setting-alt',
            ], [
                'name' => 'security_setting',
                'guard_name' => 'web',
                'title' => 'Setting',
                'category' => 'setting',
                'display_name' => 'Security',
                'type' => 'Main',
                'icon' => 'setting-alt',
            ], [
                'name' => 'account_activity_setting',
                'guard_name' => 'web',
                'title' => 'Setting',
                'category' => 'setting',
                'display_name' => 'Account Activity',
                'type' => 'Main',
                'icon' => 'setting-alt',
            ],
            [
                'name' => 'view_inventory',
                'guard_name' => 'web',
                'title' => 'Inventory',
                'category' => 'inventory',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'add_inventory',
                'guard_name' => 'web',
                'title' => 'Inventory',
                'category' => 'inventory',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'edit_inventory',
                'guard_name' => 'web',
                'title' => 'Inventory',
                'category' => 'inventory',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'delete_inventory',
                'guard_name' => 'web',
                'title' => 'Inventory',
                'category' => 'inventory',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'view_class',
                'guard_name' => 'web',
                'title' => 'Classes',
                'category' => 'class',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'add_class',
                'guard_name' => 'web',
                'title' => 'Classes',
                'category' => 'class',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'edit_class',
                'guard_name' => 'web',
                'title' => 'Classes',
                'category' => 'class',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'delete_class',
                'guard_name' => 'web',
                'title' => 'Classes',
                'category' => 'class',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'package',
            ],
             [
                'name' => 'view_venue',
                'guard_name' => 'web',
                 'title' => 'Venue',
                'category' => 'venue',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'add_venue',
                'guard_name' => 'web',
                 'title' => 'Venue',
                'category' => 'venue',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'edit_venue',
                'guard_name' => 'web',
                 'title' => 'Venue',
                'category' => 'venue',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'delete_venue',
                'guard_name' => 'web',
                 'title' => 'Venue',
                'category' => 'venue',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'package',
            ], [
                'name' => 'view_event',
                'guard_name' => 'web',
                 'title' => 'Event',
                'category' => 'event',
                'display_name' => 'View',
                'type' => 'Main',
                'icon' => 'calendar-check',
            ], [
                'name' => 'add_event',
                'guard_name' => 'web',
                 'title' => 'Event',
                'category' => 'event',
                'display_name' => 'Add',
                'type' => 'Main',
                'icon' => 'calendar-check',
            ], [
                'name' => 'edit_event',
                'guard_name' => 'web',
                 'title' => 'Event',
                'category' => 'event',
                'display_name' => 'Edit',
                'type' => 'Main',
                'icon' => 'calendar-check',
            ], [
                'name' => 'delete_event',
                'guard_name' => 'web',
                 'title' => 'Event',
                'category' => 'event',
                'display_name' => 'Delete',
                'type' => 'Main',
                'icon' => 'calendar-check',
            ],
            [
                'name' => 'view_product',
                'guard_name'  => 'web',
                'title' => 'Product',
                'category' => 'product',
                'display_name' => 'View',
                'type' => 'Ecommerce',
                'icon' => 'card-view',
            ], [
                'name' => 'add_product',
                'guard_name'  => 'web',
                'title' => 'Product',
                'category' => 'product',
                'display_name' => 'Add',
                'type' => 'Ecommerce',
                'icon' => 'card-view',
            ], [
                'name' => 'edit_product',
                'guard_name'  => 'web',
                'title' => 'Product',
                'category' => 'product',
                'display_name' => 'Edit',
                'type' => 'Ecommerce',
                'icon' => 'card-view',
            ], [
                'name' => 'delete_product',
                'guard_name'  => 'web',
                'title' => 'Product',
                'category' => 'product',
                'display_name' => 'Delete',
                'type' => 'Ecommerce',
                'icon' => 'card-view',
            ], [
                'name' => 'view_sale',
                'guard_name'  => 'web',
                'title' => 'Sale',
                'category' => 'sale',
                'display_name' => 'View',
                'type' => 'Ecommerce',
                'icon' => 'growth',
            ], [
                'name' => 'add_sale',
                'guard_name'  => 'web',
                'title' => 'Sale',
                'category' => 'sale',
                'display_name' => 'Add',
                'type' => 'Ecommerce',
                'icon' => 'growth',
            ], [
                'name' => 'edit_sale',
                'guard_name'  => 'web',
                'title' => 'Sale',
                'category' => 'sale',
                'display_name' => 'Edit',
                'type' => 'Ecommerce',
                'icon' => 'growth',
            ], [
                'name' => 'delete_sale',
                'guard_name'  => 'web',
                'title' => 'Sale',
                'category' => 'sale',
                'display_name' => 'Delete',
                'type' => 'Ecommerce',
                'icon' => 'growth',
            ],
            [
                'name' => 'view_invoice',
                'guard_name'  => 'web',
                'title' => 'Invoice cycle',
                'category' => 'invoice',
                'display_name' => 'View',
                'type' => 'Billing',
                'icon' => 'file-docs',
            ], [
                'name' => 'add_invoice',
                'guard_name'  => 'web',
                'title' => 'Invoice cycle',
                'category' => 'invoice',
                'display_name' => 'Add',
                'type' => 'Billing',
                'icon' => 'file-docs',
            ], [
                'name' => 'edit_invoice',
                'guard_name'  => 'web',
                'title' => 'Invoice cycle',
                'category' => 'invoice',
                'display_name' => 'Edit',
                'type' => 'Billing',
                'icon' => 'file-docs',
            ], [
                'name' => 'delete_invoice',
                'guard_name'  => 'web',
                'title' => 'Invoice cycle',
                'category' => 'invoice',
                'display_name' => 'Delete',
                'type' => 'Billing',
                'icon' => 'file-docs',
            ], [
                'name' => 'view_designaton',
                'guard_name'  => 'web',
                'title' => 'Designaton',
                'category' => 'designaton',
                'display_name' => 'View',
                'type' => 'Billing',
                'icon' => 'opt',
            ], [
                'name' => 'add_designaton',
                'guard_name'  => 'web',
                'title' => 'Designaton',
                'category' => 'designaton',
                'display_name' => 'Add',
                'type' => 'Billing',
                'icon' => 'opt',
            ], [
                'name' => 'edit_designaton',
                'guard_name'  => 'web',
                'title' => 'Designaton',
                'category' => 'designaton',
                'display_name' => 'Edit',
                'type' => 'Billing',
                'icon' => 'opt',
            ], [
                'name' => 'delete_designaton',
                'guard_name'  => 'web',
                'title' => 'Designaton',
                'category' => 'designaton',
                'display_name' => 'Delete',
                'type' => 'Billing',
                'icon' => 'opt',
            ], [
                'name' => 'view_booking',
                'guard_name'  => 'web',
                'title' => 'Booking',
                'category' => 'booking',
                'display_name' => 'View',
                'type' => 'Billing',
                'icon' => 'calendar-booking',
            ], [
                'name' => 'edit_booking',
                'guard_name'  => 'web',
                'title' => 'Booking',
                'category' => 'booking',
                'display_name' => 'Edit',
                'type' => 'Billing',
                'icon' => 'calendar-booking',
            ], [
                'name' => 'view_report',
                'guard_name'  => 'web',
                'title' => 'Report',
                'category' => 'report',
                'display_name' => 'View',
                'type' => 'Billing',
                'icon' => 'reports',
            ], [
                'name' => 'delete_report',
                'guard_name'  => 'web',
                'title' => 'Report',
                'category' => 'report',
                'display_name' => 'Delete',
                'type' => 'Billing',
                'icon' => 'reports',
            ],
            // [
            //     'name' => 'view_designaton',
            //     'guard_name'  => 'web',
            //     'title' => 'Designaton',
            //     'category' => 'designaton',
            //     'display_name' => 'View',
            //     'type' => 'Billing',
            //     'icon' => 'opt',
            // ], [
            //     'name' => 'add_designaton',
            //     'guard_name'  => 'web',
            //     'title' => 'Designaton',
            //     'category' => 'designaton',
            //     'display_name' => 'Add',
            //     'type' => 'Billing',
            //     'icon' => 'opt',
            // ], [
            //     'name' => 'edit_designaton',
            //     'guard_name'  => 'web',
            //     'title' => 'Designaton',
            //     'category' => 'designaton',
            //     'display_name' => 'Edit',
            //     'type' => 'Billing',
            //     'icon' => 'opt',
            // ], [
            //     'name' => 'delete_designaton',
            //     'guard_name'  => 'web',
            //     'title' => 'Designaton',
            //     'category' => 'designaton',
            //     'display_name' => 'Delete',
            //     'type' => 'Billing',
            //     'icon' => 'opt',
            // ],
            [
                'name' => 'view_staff',
                'guard_name'  => 'web',
                'title' => 'Staff Management',
                'category' => 'staff',
                'display_name' => 'View',
                'type' => 'User Management',
                'icon' => 'user',
            ], [
                'name' => 'add_staff',
                'guard_name'  => 'web',
                'title' => 'Staff Management',
                'category' => 'staff',
                'display_name' => 'Add',
                'type' => 'User Management',
                'icon' => 'user',
            ], [
                'name' => 'edit_staff',
                'guard_name'  => 'web',
                'title' => 'Staff Management',
                'category' => 'staff',
                'display_name' => 'Edit',
                'type' => 'User Management',
                'icon' => 'user',
            ], [
                'name' => 'delete_staff',
                'guard_name'  => 'web',
                'title' => 'Staff Management',
                'category' => 'staff',
                'display_name' => 'Delete',
                'type' => 'User Management',
                'icon' => 'user',
            ], [
                'name' => 'view_role',
                'guard_name'  => 'web',
                'title' => 'Role Base Access',
                'category' => 'role',
                'display_name' => 'View',
                'type' => 'User Management',
                'icon' => 'loader',
            ], [
                'name' => 'add_role',
                'guard_name'  => 'web',
                'title' => 'Role Base Access',
                'category' => 'role',
                'display_name' => 'Add',
                'type' => 'User Management',
                'icon' => 'loader',
            ], [
                'name' => 'edit_role',
                'guard_name'  => 'web',
                'title' => 'Role Base Access',
                'category' => 'role',
                'display_name' => 'Edit',
                'type' => 'User Management',
                'icon' => 'loader',
            ], [
                'name' => 'delete_role',
                'guard_name'  => 'web',
                'title' => 'Role Base Access',
                'category' => 'role',
                'display_name' => 'Delete',
                'type' => 'User Management',
                'icon' => 'loader',
            ], [
                'name' => 'view_trainer',
                'guard_name'  => 'web',
                'title' => 'Trainer',
                'category' => 'trainer',
                'display_name' => 'View',
                'type' => 'User Management',
                'icon' => 'user-list',
            ], [
                'name' => 'add_trainer',
                'guard_name'  => 'web',
                'title' => 'Trainer',
                'category' => 'trainer',
                'display_name' => 'Add',
                'type' => 'User Management',
                'icon' => 'user-list',
            ], [
                'name' => 'edit_trainer',
                'guard_name'  => 'web',
                'title' => 'Trainer',
                'category' => 'trainer',
                'display_name' => 'Edit',
                'type' => 'User Management',
                'icon' => 'user-list',
            ], [
                'name' => 'delete_trainer',
                'guard_name'  => 'web',
                'title' => 'Trainer',
                'category' => 'trainer',
                'display_name' => 'Delete',
                'type' => 'User Management',
                'icon' => 'user-list',
            ], [
                'name' => 'view_customer',
                'guard_name'  => 'web',
                'title' => 'Customer Information',
                'category' => 'customer',
                'display_name' => 'View',
                'type' => 'User Management',
                'icon' => 'user-c',
            ],[
                'name' => 'add_customer',
                'guard_name'  => 'web',
                'title' => 'Customer Information',
                'category' => 'customer',
                'display_name' => 'Add',
                'type' => 'User Management',
                'icon' => 'user-c',
            ],[
                'name' => 'edit_customer',
                'guard_name'  => 'web',
                'title' => 'Customer Information',
                'category' => 'customer',
                'display_name' => 'Edit',
                'type' => 'User Management',
                'icon' => 'user-c',
            ],[
                'name' => 'show_customer',
                'guard_name'  => 'web',
                'title' => 'Customer Information',
                'category' => 'customer',
                'display_name' => 'Show',
                'type' => 'User Management',
                'icon' => 'user-c',
            ], [
                'name' => 'delete_customer',
                'guard_name'  => 'web',
                'title' => 'Customer Information',
                'category' => 'customer',
                'display_name' => 'Delete',
                'type' => 'User Management',
                'icon' => 'user-c',
            ], [
                'name' => 'view_promo_code',
                'guard_name'  => 'web',
                'title' => 'Promo Codes',
                'category' => 'promo',
                'display_name' => 'View',
                'type' => 'User Management',
                'icon' => 'offer',
            ], [
                'name' => 'add_promo_code',
                'guard_name'  => 'web',
                'title' => 'Promo Codes',
                'category' => 'promo',
                'display_name' => 'Add',
                'type' => 'User Management',
                'icon' => 'offer',
            ], [
                'name' => 'edit_promo_code',
                'guard_name'  => 'web',
                'title' => 'Promo Codes',
                'category' => 'promo',
                'display_name' => 'Edit',
                'type' => 'User Management',
                'icon' => 'offer',
            ], [
                'name' => 'delete_promo_code',
                'guard_name'  => 'web',
                'title' => 'Promo Codes',
                'category' => 'promo',
                'display_name' => 'Delete',
                'type' => 'User Management',
                'icon' => 'offer',
            ], [
                'name' => 'view_cancelation',
                'guard_name'  => 'web',
                'title' => 'Cancelation Policy',
                'category' => 'cancelation',
                'display_name' => 'View',
                'type' => 'User Management',
                'icon' => 'report',
            ], [
                'name' => 'add_cancelation',
                'guard_name'  => 'web',
                'title' => 'Cancelation Policy',
                'category' => 'cancelation',
                'display_name' => 'Add',
                'type' => 'User Management',
                'icon' => 'report',
            ], [
                'name' => 'edit_cancelation',
                'guard_name'  => 'web',
                'title' => 'Cancelation Policy',
                'category' => 'cancelation',
                'display_name' => 'Edit',
                'type' => 'User Management',
                'icon' => 'report',
            ], [
                'name' => 'delete_cancelation',
                'guard_name'  => 'web',
                'title' => 'Cancelation Policy',
                'category' => 'cancelation',
                'display_name' => 'Delete',
                'type' => 'User Management',
                'icon' => 'report',
            ], [
                'name' => 'view_contact',
                'guard_name'  => 'web',
                'title' => 'Contact Us',
                'category' => 'contact',
                'display_name' => 'View',
                'type' => 'User Management',
                'icon' => 'menu-list',
            ], [
                'name' => 'delete_contact',
                'guard_name'  => 'web',
                'title' => 'Contact Us',
                'category' => 'contact',
                'display_name' => 'Delete',
                'type' => 'User Management',
                'icon' => 'menu-list',
            ],
        ];
        Permission::insert($data);
    }
}