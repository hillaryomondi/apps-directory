<?php

namespace Strathmore\Craftable\Traits;

use Strathmore\AdminAuth\Models\AdminUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UpdatedByAdminUserTrait
{
    /**
     * @return BelongsTo
     */
    public function updatedByAdminUser(): BelongsTo
    {
        return $this->belongsTo(AdminUser::class, 'updated_by_admin_user_id');
    }
}
