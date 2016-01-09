<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Cape
 *
 * @property integer $id
 * @property integer $mcid_id
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\MCID $mcid
 */
	class Cape {}
}

namespace App{
/**
 * App\MCID
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $mcid
 * @property boolean $genuine
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Skin $skin
 * @property-read \App\Cape $cape
 * @property-read \App\User $user
 */
	class MCID {}
}

namespace App{
/**
 * App\Skin
 *
 * @property integer $id
 * @property integer $mcid_id
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\MCID $mcid
 */
	class Skin {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\MCID[] $mcids
 */
	class User {}
}

