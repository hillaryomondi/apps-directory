<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $username
 * @property string|null $user_number
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property int $activated
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Bug[] $bugs
 * @property-read int|null $bugs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read mixed $full_name
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereActivated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Department
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $display_name
 * @property string|null $description
 * @property int $enabled
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App{
/**
 * App\Bug
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $reference_number
 * @property string $title
 * @property string|null $description
 * @property int $resolved
 * @property int $created_by
 * @property int $resolved_by
 * @property \Illuminate\Support\Carbon $resolved_at
 * @property-read mixed $resource_url
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereResolved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereResolvedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereResolvedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bug whereUpdatedAt($value)
 */
	class Bug extends \Eloquent {}
}

namespace App{
/**
 * App\Screenshot
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $file_path
 * @property int $bug_id
 * @property-read \App\Bug $bug
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Screenshot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Screenshot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Screenshot query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Screenshot whereBugId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Screenshot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Screenshot whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Screenshot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Screenshot whereUpdatedAt($value)
 */
	class Screenshot extends \Eloquent {}
}

namespace App{
/**
 * App\Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $permission_group
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $permissions_matrix
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\SuApplication
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property int $enabled
 * @property int $department_id
 * @property-read \App\Department $department
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SuApplication whereUpdatedAt($value)
 */
	class SuApplication extends \Eloquent {}
}

