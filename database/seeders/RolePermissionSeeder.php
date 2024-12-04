<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'manage document',
            'read document',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Ensure roles exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // Assign permissions to roles
        $adminRole->syncPermissions(['read document']);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Find user by email
            [
                'nama_lengkap' => 'Admin User',
                'password' => Hash::make('passwordMAKAN123'), // Replace with a secure password
                'NIK' => '1234567890123456',
                'tanggal_lahir' => '1990-01-01',
                'tempat_lahir' => 'City A',
                'agama' => 'Islam',
                'pekerjaan' => 'Administrator',
                'alamat_lengkap' => 'Jl. Admin Street',
                'rt_rw' => '01/01',
                'kecamatan' => 'Kecamatan Admin',
                'kelurahan' => 'Kelurahan Admin',
                'kabupaten' => 'Kabupaten Admin',
            ]
        );
        $admin->assignRole($adminRole);

        // Create super admin user
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@admin.com'], // Find user by email
            [
                'nama_lengkap' => 'Super Admin User',
                'password' => Hash::make('akugantengroot'), // Replace with a secure password
                'NIK' => '1234567890987654',
                'tanggal_lahir' => '1985-01-01',
                'tempat_lahir' => 'City B',
                'agama' => 'Atheis',
                'pekerjaan' => 'Super Administrator',
                'alamat_lengkap' => 'Jl. Super Admin Street',
                'rt_rw' => '02/02',
                'kecamatan' => 'Kecamatan Super Admin',
                'kelurahan' => 'Kelurahan Super Admin',
                'kabupaten' => 'Kabupaten Super Admin',
            ]
        );
        $superAdmin->assignRole($superAdminRole);
    }
}
