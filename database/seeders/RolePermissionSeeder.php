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
            'manage',
            'make',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Ensure roles exist
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // Assign permissions to roles
        $adminRole->syncPermissions(['manage']);
        $userRole->syncPermissions(['make']);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // Find user by email
            [
                'nama_lengkap' => 'Admin User',
                'nik' => '1234567890123456',  // Correct column name 'nik'
                'email' => 'admin@gmail.com',
                'password' => Hash::make('passwordMAKAN123'), // Replace with a secure password
                'tanggal_lahir' => '1990-01-01',
                'tempat_lahir' => 'City A',
                'agama' => 'Islam',
                'pekerjaan' => 'Administrator',
                'alamat_lengkap' => 'Jl. Admin Street',
                'rt' => '01',
                'rw' => '01',
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
                'nik' => '1234567890987654',  // Correct column name 'nik'
                'email' => 'superadmin@admin.com',
                'password' => Hash::make('akugantengroot'), // Replace with a secure password
                'tanggal_lahir' => '1985-01-01',
                'tempat_lahir' => 'City B',
                'agama' => 'Islam',
                'pekerjaan' => 'Super Administrator',
                'alamat_lengkap' => 'Jl. Super Admin Street',
                'rt' => '02',
                'rw' => '02',
                'kecamatan' => 'Kecamatan Super Admin',
                'kelurahan' => 'Kelurahan Super Admin',
                'kabupaten' => 'Kabupaten Super Admin',
            ]
        );
        $superAdmin->assignRole($superAdminRole);
        $user1 = User::firstOrCreate(
            ['email' => 'user1@example.com'],
            [
                'nama_lengkap' => 'User One',
                'nik' => '1234567890234567',
                'email' => 'user1@example.com',
                'password' => Hash::make('user1234'),
                'tanggal_lahir' => '1995-03-21',
                'tempat_lahir' => 'City C',
                'agama' => 'Kristen',
                'pekerjaan' => 'Employee',
                'alamat_lengkap' => 'Jl. User One Street',
                'rt' => '03',
                'rw' => '03',
                'kecamatan' => 'Kecamatan C',
                'kelurahan' => 'Kelurahan C',
                'kabupaten' => 'Kabupaten C',
            ]
        );
        $user1->assignRole($userRole);

        // Create another regular user
        $user2 = User::firstOrCreate(
            ['email' => 'user2@example.com'],
            [
                'nama_lengkap' => 'User Two',
                'nik' => '1234567890345678',
                'email' => 'user2@example.com',
                'password' => Hash::make('user4321'),
                'tanggal_lahir' => '1998-05-15',
                'tempat_lahir' => 'City D',
                'agama' => 'Hindu',
                'pekerjaan' => 'Freelancer',
                'alamat_lengkap' => 'Jl. User Two Street',
                'rt' => '04',
                'rw' => '04',
                'kecamatan' => 'Kecamatan D',
                'kelurahan' => 'Kelurahan D',
                'kabupaten' => 'Kabupaten D',
            ]
        );
        $user2->assignRole($userRole);
    }
}
