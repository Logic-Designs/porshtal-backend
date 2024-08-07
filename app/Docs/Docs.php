<?php

namespace App\Docs;


/**
 * @OA\Info(
 *    title="Hangout API",
 *    version="1.0.0",
 * )
 *
 * @OA\Schema(
 *     schema="User",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 * )
 *
 * @OA\Schema(
 *     schema="Coach",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="specialty", type="string"),
 * )
 * @OA\Schema(
 *     schema="UpdateUserRequest",
 *     required={"experience", "fees", "activity_ids", "sub_activity_ids", "interests", "topics", "photos", "email", "first_name", "last_name", "about", "school", "gender", "work", "birthday", "city", "state", "country", "google_map", "receive_notification", "appear_in_search", "keep_me_posted", "deactivated", "locked_my_profile", "show_gender"},
 *     @OA\Property(property="experience", type="string", maxLength=255),
 *     @OA\Property(property="fees", type="number"),
 * )
 */
class Docs
{

}
