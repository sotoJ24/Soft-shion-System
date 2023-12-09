<?php

namespace Tests\Feature\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSectionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_only_admin_can_access_to_admin_view()
    {
        $userAdmin = User::find(1);
        $userSystem = User::find(3);

        $userAdmin->hasRole('admin');
        $userSystem->hasRole('user_system');

        $responseAdmin = $this->actingAs($userAdmin)
                         ->get('/manage/user');

        $responseAdmin->assertStatus(200);


        $responseUserSystem = $this->actingAs($userSystem)
        ->get('/manage/user');

        $responseUserSystem->assertStatus(403);

    }
}
