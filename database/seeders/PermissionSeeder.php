<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //roles:
        $admin = Role::create(['name' => 'admin']);
        $super_admin = Role::create(['name' => 'super_admin']);
        $user = role::create(['name' => 'user']);
        $reseller = Role::create(['name' => 'reseller']);
        $customer = Role::create(['name' => 'customer']);
        //permission for users:
        $create_user = Permission::create(['name'=>'user.create']);
        $edit_user = Permission::create(['name'=>'user.edit']);
        $index_user = Permission::create(['name'=>'user.index']);
        $delete_user =Permission::create(['name' => 'delete.user']);
        //permission for products:
        $create_products = Permission::create(['name'=>'products.create']);
        $edit_products = Permission::create(['name'=>'products.edit']);
        $index_products = Permission::create(['name'=>'products.index']);
        $delete_products =Permission::create(['name' => 'products.user']);
        //permission for orders:
        $create_orders = Permission::create(['name'=>'orders.create']);
        $edit_orders = Permission::create(['name'=>'orders.edit']);
        $index_orders= Permission::create(['name'=>'orders.index']);
        $delete_orders =Permission::create(['name' => 'orders.user']);
        //permission for categories:
        $create_categories = Permission::create(['name'=>'categories.create']);
        $edit_categories = Permission::create(['name'=>'categories.edit']);
        $index_categories = Permission::create(['name'=>'categories.index']);
        $delete_categories =Permission::create(['name' => 'categories.user']);
        //permission for factors:
        $create_factors = Permission::create(['name'=>'factors.create']);
        $edit_factors = Permission::create(['name'=>'factors.edit']);
        $index_factors = Permission::create(['name'=>'factors.index']);
        $delete_factors =Permission::create(['name' => 'factors.user']);
        //permission for lables:
        $create_lables = Permission::create(['name'=>'lables.create']);
        $edit_lables = Permission::create(['name'=>'lables.edit']);
        $index_lables = Permission::create(['name'=>'lables.index']);
        $delete_lables =Permission::create(['name' => 'lables.user']);
        //permission for messages:
        $create_messages = Permission::create(['name'=>'messages.create']);
        $edit_messages = Permission::create(['name'=>'messages.edit']);
        $index_messages = Permission::create(['name'=>'messages.index']);
        $delete_messages =Permission::create(['name' => 'messages.user']);
        //permission for notes:
        $create_notes = Permission::create(['name'=>'notes.create']);
        $edit_notes = Permission::create(['name'=>'notes.edit']);
        $index_notes = Permission::create(['name'=>'notes.index']);
        $delete_notes =Permission::create(['name' => 'notes.user']);
        //permission for posts:
        $create_posts = Permission::create(['name'=>'posts.create']);
        $edit_posts = Permission::create(['name'=>'posts.edit']);
        $index_posts = Permission::create(['name'=>'posts.index']);
        $delete_posts =Permission::create(['name' => 'posts.user']);
        //permission for resellers:
        $create_resellers = Permission::create(['name'=>'resellers.create']);
        $edit_resellers = Permission::create(['name'=>'resellers.edit']);
        $index_resellers = Permission::create(['name'=>'resellers.index']);
        $delete_resellers =Permission::create(['name' => 'resellers.user']);
        //permission for tasks:
        $create_tasks = Permission::create(['name'=>'tasks.create']);
        $edit_tasks = Permission::create(['name'=>'tasks.edit']);
        $index_tasks = Permission::create(['name'=>'tasks.index']);
        $delete_tasks =Permission::create(['name' => 'tasks.user']);
        //permission for teams:
        $create_teams = Permission::create(['name'=>'teams.create']);
        $edit_teams= Permission::create(['name'=>'teams.edit']);
        $index_teams = Permission::create(['name'=>'teams.index']);
        $delete_teams =Permission::create(['name' => 'teams.user']);
        //permission for tickets:
        $create_tickets= Permission::create(['name'=>'tickets.create']);
        $edit_tickets= Permission::create(['name'=>'tickets.edit']);
        $index_tickets = Permission::create(['name'=>'tickets.index']);
        $delete_tickets =Permission::create(['name' => 'tickets.user']);
        //permission for warranties:
        $create_warranties = Permission::create(['name'=>'warranties.create']);
        $edit_warranties = Permission::create(['name'=>'warranties.edit']);
        $index_warranties = Permission::create(['name'=>'warranties.index']);
        $delete_warranties =Permission::create(['name' => 'warranties.user']);



        //roles permission:
        $admin->givePermissionTo([$create_user, $edit_user , $index_user , $delete_user]);
        $super_admin->givePermissionTo([$create_user, $edit_user , $index_user , $delete_user, ]);
    }
}
