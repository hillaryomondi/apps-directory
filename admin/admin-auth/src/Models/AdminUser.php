<?php

namespace Strathmore\AdminAuth\Models;

use Strathmore\AdminAuth\Activation\Contracts\CanActivate as CanActivateContract;
use Strathmore\AdminAuth\Activation\Traits\CanActivate;
use Strathmore\AdminAuth\Notifications\ResetPassword;
use Strathmore\Media\HasMedia\AutoProcessMediaTrait;
use Strathmore\Media\HasMedia\HasMediaCollectionsTrait;
use Strathmore\Media\HasMedia\HasMediaThumbsTrait;
use Strathmore\Media\HasMedia\ProcessMediaTrait;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property mixed first_name
 * @property mixed last_name
 */
class AdminUser extends Authenticatable implements CanActivateContract, HasMedia
{
    use Notifiable;
    use CanActivate;
    use SoftDeletes;
    use HasRoles;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;

    protected $fillable = [
        'email',
        'username',
        'password',
        'first_name',
        'last_name',
        'activated',
        'forbidden',
        'language',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['full_name', 'resource_url'];

    /* ************************ ACCESSOR ************************* */

    /**
     * Resource url to generate edit
     *
     * @return UrlGenerator|string
     */
    public function getResourceUrlAttribute()
    {
        return url('/admin/admin-users/' . $this->getKey());
    }

    /**
     * Full name for admin user
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get url of avatar image
     *
     * @return string|null
     */
    public function getAvatarThumbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('avatar', 'thumb_150') ?: null;
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(app(ResetPassword::class, ['token' => $token]));
    }

    /* ************************ MEDIA ************************ */

    /**
     * Register media collections
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
            ->accepts('image/*');
    }

    /**
     * Register media conversions
     *
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('thumb_75')
            ->width(75)
            ->height(75)
            ->fit('crop', 75, 75)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();

        $this->addMediaConversion('thumb_150')
            ->width(150)
            ->height(150)
            ->fit('crop', 150, 150)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();
    }

    /**
     * Auto register thumb overridden
     */
    public function autoRegisterThumb200()
    {
        $this->getMediaCollections()->filter->isImage()->each(function ($mediaCollection) {
            $this->addMediaConversion('thumb_200')
                ->width(200)
                ->height(200)
                ->fit('crop', 200, 200)
                ->optimize()
                ->performOnCollections($mediaCollection->getName())
                ->nonQueued();
        });
    }

    /* ************************ RELATIONS ************************ */
}
