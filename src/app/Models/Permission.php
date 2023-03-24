<?php

namespace Backpack\PermissionManager\app\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Models\Permission as OriginalPermission;

class Permission extends OriginalPermission
{
    use CrudTrait;

    protected $fillable = ['name', 'guard_name', 'updated_at', 'created_at'];

    /**
     * @return \Backpack\PermissionManager\app\Models\Attribute
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                if (substr($value, 0, 1) === ":")
                    return \Lang::has('permission.type.'.$value) ? __('permission.type.'.$value) : $value;

                return $value;
            },
        );
    }

    /**
     * @return bool
     */
    public function hasTranslation(): bool
    {
        return substr(trim($this->original['name']), 0, 1) === ":";
    }
}
