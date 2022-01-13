<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create([
            'name' => 'administrador',
            'guard_name' => 'web'
        ]);
        $role2 = Role::create([
            'name' => 'cajero',
            'guard_name' => 'web'
        ]);

        $role3 = Role::create([
            'name' => 'supervisor',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'category_index',
            'description' => 'ver lista de categorías',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'category_search',
            'description' => 'buscar categoría',
            'guard_name' => 'web'
        ])->syncRoles([$role1,$role2, $role3]);
        Permission::create([
            'name' => 'category_destroy',
            'description' => 'eliminar categoría',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'category_update',
            'description' => 'editar categoría',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'category_create',
            'description' => 'crear categoría',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'product_index',
            'description' => 'ver lista de productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'product_search',
            'description' => 'buscar productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'product_destroy',
            'description' => 'eliminar productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'product_update',
            'description' => 'editar productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'product_create',
            'description' => 'crear productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'sale_index',
            'description' => 'ver componente de ventas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'role_index',
            'description' => 'ver lista de roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'role_search',
            'description' => 'buscar roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'role_destroy',
            'description' => 'eliminar roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'role_update',
            'description' => 'editar roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'role_create',
            'description' => 'crear roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'permission_index',
            'description' => 'ver lista de permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'permission_search',
            'description' => 'buscar permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'permission_destroy',
            'description' => 'eliminar permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'permission_update',
            'description' => 'editar permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'permission_create',
            'description' => 'crear permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'asign_index',
            'description' => 'ver lista de asignaciones',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'asign_search',
            'description' => 'buscar asignaciones',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'asign_select_rol',
            'description' => 'ver roles disponibles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'asign_role',
            'description' => 'asignar roles checkbox',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'asign_sync_all',
            'description' => 'sincronizar todos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'asign_revoke_all',
            'description' => 'revocar todos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'user_index',
            'description' => 'ver lista de usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'user_search',
            'description' => 'buscar usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'user_destroy',
            'description' => 'eliminar usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'user_update',
            'description' => 'editar usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'user_create',
            'description' => 'crear usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'coin_index',
            'description' => 'ver lista de monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'coin_search',
            'description' => 'buscar monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'coin_destroy',
            'description' => 'eliminar monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'coin_update',
            'description' => 'editar monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'coin_create',
            'description' => 'crear monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'arqueo_index',
            'description' => 'ver lista de arqueos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'arqueo_consult',
            'description' => 'Consultar arqueos',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);


        Permission::create([
            'name' => 'report_index',
            'description' => 'ver lista de reportes',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'report_details',
            'description' => 'ver detalle de reportes',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2, $role3]);
        Permission::create([
            'name' => 'report_pdf',
            'description' => 'exportar reporte pdf',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'report_excel',
            'description' => 'exportar reporte excel',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
    }
}
