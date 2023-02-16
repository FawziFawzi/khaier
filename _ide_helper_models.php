<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $phone_number
 * @property string|null $phone_number_verified_at
 * @property string $password
 * @property string $address
 * @property string|null $thumbnail
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\donation> $donations
 * @property-read int|null $donations_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumberVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\categ_chari
 *
 * @property int $id
 * @property int $category_id
 * @property int $charity_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\category $category
 * @property-read \App\Models\charity $charity
 * @method static \Database\Factories\categ_chariFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|categ_chari newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|categ_chari newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|categ_chari query()
 * @method static \Illuminate\Database\Eloquent\Builder|categ_chari whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categ_chari whereCharityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categ_chari whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categ_chari whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|categ_chari whereUpdatedAt($value)
 */
	class categ_chari extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\category
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\categ_chari> $categ_chari
 * @property-read int|null $categ_chari_count
 * @method static \Database\Factories\categoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category query()
 * @method static \Illuminate\Database\Eloquent\Builder|category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereUpdatedAt($value)
 */
	class category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\charity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone_number
 * @property string $password
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $excerpt
 * @property string|null $thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\categ_chari> $categ_chari
 * @property-read int|null $categ_chari_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\my_case> $my_cases
 * @property-read int|null $my_cases_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\social_links> $social_links
 * @property-read int|null $social_links_count
 * @method static \Database\Factories\charityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|charity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|charity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|charity query()
 * @method static \Illuminate\Database\Eloquent\Builder|charity whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|charity whereUpdatedAt($value)
 */
	class charity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\donation
 *
 * @property int $id
 * @property string $quantity
 * @property string $pickup_address
 * @property string $pickup_time
 * @property string $pickup_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $my_case_id
 * @property int $user_id
 * @property-read \App\Models\my_case $my_case
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\donationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|donation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|donation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|donation query()
 * @method static \Illuminate\Database\Eloquent\Builder|donation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|donation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|donation whereMyCaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|donation wherePickupAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|donation wherePickupDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|donation wherePickupTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|donation whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|donation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|donation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|donation whereUserId($value)
 */
	class donation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\my_case
 *
 * @property int $id
 * @property string $title
 * @property string $excerpt
 * @property string $max_amount
 * @property string $collected_amount
 * @property string $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $category
 * @property string|null $thumbnail
 * @property int $charity_id
 * @property-read \App\Models\charity $charity
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\donation> $donations
 * @property-read int|null $donations_count
 * @method static \Database\Factories\my_caseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|my_case newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|my_case newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|my_case query()
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereCharityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereCollectedAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereMaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|my_case whereUpdatedAt($value)
 */
	class my_case extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\social_links
 *
 * @property int $id
 * @property int $charity_id
 * @property string $name
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\charity $charity
 * @method static \Database\Factories\social_linksFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|social_links newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|social_links newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|social_links query()
 * @method static \Illuminate\Database\Eloquent\Builder|social_links whereCharityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|social_links whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|social_links whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|social_links whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|social_links whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|social_links whereUpdatedAt($value)
 */
	class social_links extends \Eloquent {}
}

