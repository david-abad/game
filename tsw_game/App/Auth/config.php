<?php

return 

array(
	"base_url" => "http://localhost:2828/TSW/callback.php",
	"providers" => array(
		"Twitter" => array(
			"enabled" => true,
			"keys" => array(
				"key" => "VxFST1vJb7vqblqFrSUrkKQBj",
				"secret" => "UGxVylg8bg63fTHHqwXq0afBgvjbtiAaUdA5LIfyL1kaCxatjq"
			),
			"includeEmail" => true

		),
		"Facebook" => array(
			"enabled" => true,
			"keys" => array(
				"id" => "778601899139802",
				"secret" => "e656363caf1c5c97fa2fb53683069a2d"
			),
			"scope" => "email"

		),
		"Google" => array(
			"enabled" => true,
			"keys" => array(
				"id" => "637310312828-192kb878eaqp1evqn1i65sftmangii7c.apps.googleusercontent.com",
				"secret" => "4LH2GmnYgOZv6x-a5NvfAuQf"
			)

		)


	)
)

?>