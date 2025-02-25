<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $professionnal
 * @property string $civility
 * @property string|null $name
 * @property string|null $firstname
 * @property string|null $company
 * @property string $address
 * @property string|null $addressbis
 * @property string|null $bp
 * @property string $postal
 * @property string $city
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $country_id
 * @method static \Database\Factories\AddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereAddressbis($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereBp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCivility($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address wherePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereProfessionnal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Address whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAddress {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $holder
 * @property string $email
 * @property string $bic
 * @property string $iban
 * @property string $bank
 * @property string $bank_address
 * @property string $phone
 * @property string $facebook
 * @property string $home
 * @property string $home_infos
 * @property string $home_shipping
 * @property int $invoice
 * @property int $card
 * @property int $transfer
 * @property int $check
 * @property int $mandat
 * @method static \Database\Factories\AgenceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereBankAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereBic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereCheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereHolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereHomeInfos($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereHomeShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereIban($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereMandat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereTransfer($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAgence {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $tax
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereTax($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCountry {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $text
 * @property string|null $image
 * @method static \Database\Factories\PageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Page whereTitle($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPage {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $content
 * @property string|null $image
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Realisation whereUrl($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperRealisation {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $firstname
 * @property string $email
 * @property int $newsletter
 * @property int $admin
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNewsletter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

