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
            'name' => 'Administrador',
            'guard_name' => 'web'
        ]);
        $role2 = Role::create([
            'name' => 'Cajero',
            'guard_name' => 'web'
        ]);

        $role3 = Role::create([
            'name' => 'Supervisor',
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'category_index',
            'description' => 'Ver lista de Categorías',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'category_search',
            'description' => 'Buscar Categoría',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'category_destroy',
            'description' => 'Eliminar Categoría',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'category_update',
            'description' => 'Editar Categoría',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'category_create',
            'description' => 'Crear Categoría',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'product_index',
            'description' => 'Ver lista de Productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'product_search',
            'description' => 'Buscar Productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'product_destroy',
            'description' => 'Eliminar Productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'product_update',
            'description' => 'Editar Productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'product_create',
            'description' => 'Crear Productos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'sale_index',
            'description' => 'Ver Componente de Ventas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'role_index',
            'description' => 'Ver lista de Roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'role_search',
            'description' => 'Buscar Roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'role_destroy',
            'description' => 'Eliminar Roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'role_update',
            'description' => 'Editar Roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'role_create',
            'description' => 'Crear Roles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'permission_index',
            'description' => 'Ver lista de Permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'permission_search',
            'description' => 'Buscar Permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'permission_destroy',
            'description' => 'Eliminar Permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'permission_update',
            'description' => 'Editar Permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'permission_create',
            'description' => 'Crear Permisos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'asign_index',
            'description' => 'Ver lista de Asignaciones',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'asign_search',
            'description' => 'Buscar Asignaciones',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'asign_select_rol',
            'description' => 'Ver Roles Disponibles',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'asign_role',
            'description' => 'Asignar Roles Checkbox',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'asign_sync_all',
            'description' => 'Sincronizar Todos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'asign_revoke_all',
            'description' => 'Revocar Todos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'user_index',
            'description' => 'Ver lista de Usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'user_search',
            'description' => 'Buscar Usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'user_destroy',
            'description' => 'Eliminar Usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'user_update',
            'description' => 'Editar Usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'user_create',
            'description' => 'Crear Usuarios',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'coin_index',
            'description' => 'Ver lista de Monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'coin_search',
            'description' => 'Buscar Monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'coin_destroy',
            'description' => 'Eliminar Monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'coin_update',
            'description' => 'Editar Monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'coin_create',
            'description' => 'Crear Monedas',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name' => 'arqueo_index',
            'description' => 'Ver lista de Arqueos',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'arqueo_consult',
            'description' => 'Consultar Arqueos',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);


        Permission::create([
            'name' => 'report_index',
            'description' => 'Ver lista de Reportes',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'report_details',
            'description' => 'Ver Detalle de Reportes',
            'guard_name' => 'web'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name' => 'report_pdf',
            'description' => 'Exportar Reporte PDF',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
        Permission::create([
            'name' => 'report_excel',
            'description' => 'Exportar Reporte Excel',
            'guard_name' => 'web'
        ])->syncRoles([$role1]);
    }
}
