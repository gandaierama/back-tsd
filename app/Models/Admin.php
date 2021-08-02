<?php

namespace App\Models;

use App\Models\Permission as PermissionModel;
use App\Models\Role as RoleModel;
use App\Models\RolePermission as RolePermissionModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    protected $table      = 'admins';
    protected $dateFormat = 'U';

    public function getLastLoginAtAttribute()
    {
        return date('Y-m-d H:i:s', $this->attributes['last_login_at']);
    }

    public function getCreatedAtAttribute()
    {
        return date('Y-m-d H:i:s', $this->attributes['created_at']);
    }

    public function getUpdatedAtAttribute()
    {
        return date('Y-m-d H:i:s', $this->attributes['updated_at']);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admins_roles', 'admin_id', 'role_id');
    }

    /**
     * @param Builder $query
     * @param string $order
     *
     * @return mixed
     */
    public function scopeIdSort($query, $order = 'asc')
    {
        return $query->orderBy('id', $order);
    }

    /**
     * @param Builder $query
     *
     * @return mixed
     */
    public function scopeEnable($query)
    {
        return $query->where(['status' => 1]);
    }

    public function getAdminList(array $search): ?array
    {
        $status       = $search['status'];
        $searchStatus = $search['status'] === '' ? false : true;

        $admins = $this
            ->select([
                'id',
                'username',
                'nickname',
                'avatar',
                'email',
                'status',
                'last_login_at',
                'last_login_ip',
                'created_at',
                'updated_at'
            ])
            ->when($search['username'], function ($query, $username) {
                $query->where('username', 'like', "%{$username}%");
            })
            ->when($search['nickname'], function ($query, $username) {
                $query->where('nickname', 'like', "%{$username}%");
            })
            ->when($search['email'], function ($query, $email) {
                $query->where('email', 'like', "%{$email}%");
            })
            ->when($searchStatus, function ($query) use ($status) {
                $query->where(['status' => $status]);
            })
            ->idSort()
            ->paginate($search['limit']);

        foreach ($admins as $admin) {
            $admin->roles = $admin->roles()->select(['roles.id', 'name'])->get()->toArray();
        }

        return $admins->toArray();
    }

    public function getAdminPermissions(): ?array
    {
        if (!$this) return [];

        $permissionModel = new PermissionModel();
        $permissionTable = $permissionModel->getTable();

        if ((int)$this->id === 1) {
            $permissionQuery = $permissionModel
                ->select([
                    "{$permissionTable}.id",
                    "{$permissionTable}.identification",
                    "{$permissionTable}.title",
                    "{$permissionTable}.icon",
                    "{$permissionTable}.redirect",
                    "{$permissionTable}.parent_id",
                    "{$permissionTable}.lft",
                    "{$permissionTable}.rgt",
                    "{$permissionTable}.display",
                ])
                ->sort();

            $otherPermissionQuery = clone $permissionQuery;

            $routePermissions = $permissionQuery->where("{$permissionTable}.type", '=', 0)->get()->toTree()->toArray();
            $otherPermissions = $otherPermissionQuery->get()->toArray();

            return [
                'routes' => $routePermissions,
                'maps'   => $otherPermissions
            ];
        }

        // 查询权限表
        $roleModel = new RoleModel();
        $roleTable = $roleModel->getTable();

        $roles = $this->roles()->select(["{$roleTable}.id"])->where("{$roleTable}.status", "=", 1)->get()->toArray();

        $rolePermissionModel      = new RolePermissionModel();
        $rolePermissionModelTable = $rolePermissionModel->getTable();

        $permissionQuery = $permissionModel
            ->select([
                "{$permissionTable}.id",
                "{$permissionTable}.identification",
                "{$permissionTable}.title",
                "{$permissionTable}.icon",
                "{$permissionTable}.redirect",
                "{$permissionTable}.parent_id",
                "{$permissionTable}.lft",
                "{$permissionTable}.rgt",
                "{$permissionTable}.display",
            ])
            ->join(
                $rolePermissionModelTable,
                "{$permissionTable}.id",
                '=',
                "{$rolePermissionModelTable}.permission_id"
            )
            ->enable()
            ->sort()
            ->whereIn("{$rolePermissionModelTable}.role_id", array_column($roles, 'id'))
            ->groupBy("{$permissionTable}.identification");

        $otherPermissionQuery = clone $permissionQuery;

        $routePermissions = $permissionQuery->where("{$permissionTable}.type", '=', 0)->get()->toTree()->toArray();
        $otherPermissions = $otherPermissionQuery->get()->toArray();

        return [
            'routes' => $routePermissions,
            'maps'   => $otherPermissions
        ];
    }

    public function hasAdminPermissionByToken(string $token, string $permission): bool
    {
        $admin = $this->where(['token' => $token])->first();

        $roleModel                = new RoleModel();
        $permissionModel          = new PermissionModel();
        $rolePermissionModel      = new RolePermissionModel();
        $roleTable                = $roleModel->getTable();
        $permissionTable          = $permissionModel->getTable();
        $rolePermissionModelTable = $rolePermissionModel->getTable();

        $roles = $admin->roles()->select(["{$roleTable}.id"])->where("{$roleTable}.status", "=", 1)->get()->toArray();

        $result = $permissionModel
            ->join(
                $rolePermissionModelTable,
                "{$permissionTable}.id",
                '=',
                "{$rolePermissionModelTable}.permission_id"
            )
            ->enable()
            ->sort()
            ->whereIn("{$rolePermissionModelTable}.role_id", array_column($roles, 'id'))
            ->where("{$permissionTable}.identification", '=', $permission)
            ->first();

        return $result ? true : false;
    }

    public function createAdmin(array $data): bool
    {
        DB::beginTransaction();

        try {
            $this->username = $data['username'];
            $this->nickname = $data['nickname'];
            $this->password = Hash::make($data['password']);
            $this->avatar   = $data['avatar'];
            $this->email    = $data['email'];
            $this->token    = '';
            $this->status   = $data['status'];

            if (!$this->save()) throw new \Exception();

            $this->roles()->attach(array_fill_keys($data['roles'], ['created_at' => time()]));

            DB::commit();
            return true;

        } catch (\Exception $exception) {

            DB::rollBack();
            return false;
        }
    }

    public function updateAdmin(array $data): bool
    {
        DB::beginTransaction();

        try {
            isset($data['username']) && $this->username = $data['username'];
            isset($data['nickname']) && $this->nickname = $data['nickname'];
            isset($data['avatar']) && $this->avatar = $data['avatar'];
            isset($data['email']) && $this->email = $data['email'];
            isset($data['status']) && $this->status = $data['status'];

            if (!$this->save()) throw new \Exception();

            isset($data['roles']) && $this->roles()->sync(array_fill_keys($data['roles'], ['updated_at' => time()]));

            DB::commit();
            return true;

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function deleteAdmin(): bool
    {
        DB::beginTransaction();

        try {
            if (!$this->delete()) throw new \Exception();

            $this->roles()->detach();

            DB::commit();
            return true;

        } catch (\Exception $exception) {

            DB::rollBack();
            return false;
        }

    }

    public function getRoles(): ?array
    {
        return Role::idSort()->get()->toArray();
    }

    public function findByName(string $username): ?Model
    {
        return $this->where(['username' => $username])->first();
    }

    public function findByToken(string $token): ?Model
    {
        return $this->where(['token' => $token])->first();
    }

    public function setLastLogin(array $lostLoginInfo): bool
    {
        $this->last_login_at = $lostLoginInfo['last_login_at'];
        $this->last_login_ip = $lostLoginInfo['last_login_ip'];
        return $this->save();
    }

    public function setToken(string $token): bool
    {
        $this->token = $token;
        return $this->save();
    }

    public function removeToken(): bool
    {
        $this->token = '';
        return $this->save();
    }

    public function resetPassword(): bool
    {
        $this->password = Hash::make('123456');;
        return $this->save();
    }

    public function updatePassword($password): bool
    {
        $this->password = Hash::make($password);;
        return $this->save();
    }
}
