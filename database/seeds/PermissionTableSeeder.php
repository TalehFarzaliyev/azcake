<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
            // Language Permission
           'language-list',
           'language-create',
           'language-edit',
           'language-delete',
           //Page Permission
           'page-list',
           'page-create',
           'page-edit',
           'page-delete',

           //Category Permission
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',

           //Post Permission
           'post-list',
           'post-create',
           'post-edit',
           'post-delete',

           //Service Permission
           'service-list',
           'service-create',
           'service-edit',
           'service-delete',

           //Portfolio Permission
           'portfolio-list',
           'portfolio-create',
           'portfolio-edit',
           'portfolio-delete',

           //Service Permission
           'faq-list',
           'faq-create',
           'faq-edit',
           'faq-delete',

           //Testimonial Permission
           'testimonial-list',
           'testimonial-create',
           'testimonial-edit',
           'testimonial-delete',

           //Contact Permission
           'contact-list',
           'contact-create',
           'contact-edit',
           'contact-delete',

           //Team Permission
           'team-list',
           'team-create',
           'team-edit',
           'team-delete',

            //Role Permission
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

            // User Permission
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           // User Permission
           'subscriber-list',
           'subscriber-create',
           'subscriber-edit',
           'subscriber-delete',

           //Product Category Permission
           'product_category-list',
           'product_category-create',
           'product_category-edit',
           'product_category-delete',

           //Product Attribute Permission
           'product_attribute-list',
           'product_attribute-create',
           'product_attribute-edit',
           'product_attribute-delete',

           //Product Permission
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',

           //Order Permission
           'order-list',
           'order-create',
           'order-edit',
           'order-delete',

           //Customer Permission
           'customer-list',
           'customer-create',
           'customer-edit',
           'customer-delete',
        ];

        $permissions = array_unique($permissions);

        foreach ($permissions as $permission) {
             Permission::updateOrCreate([
                 'name' => $permission,
                 'guard_name' => 'web'
             ]);
        }
    }
}
