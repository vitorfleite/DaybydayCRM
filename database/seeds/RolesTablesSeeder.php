<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Ramsey\Uuid\Uuid;

class RolesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_adminRole = new Role;
        $super_adminRole->display_name = 'Proprietário';
        $super_adminRole->external_id = Uuid::uuid4();
        $super_adminRole->name = 'owner';
        $super_adminRole->description = 'Owner';
        $super_adminRole->save();

        $adminRole = new Role;
        $adminRole->display_name = 'Administrador';
        $adminRole->external_id = Uuid::uuid4();
        $adminRole->name = 'administrator';
        $adminRole->description = 'System Administrator';
        $adminRole->save();

        $editorRole = new Role;
        $editorRole->display_name = 'Gerente';
        $editorRole->external_id = Uuid::uuid4();
        $editorRole->name = 'manager';
        $editorRole->description = 'System Manager';
        $editorRole->save();

        $employeeRole = new Role;
        $employeeRole->display_name = 'Empregado';
        $employeeRole->external_id = Uuid::uuid4();
        $employeeRole->name = 'employee';
        $employeeRole->description = 'Employee';
        $employeeRole->save();
    }
}
