<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;

class UsersTests {

	public function run($travelperk) {
		echo ("List users (non SCIM)\n");
		$this->getUsers($travelperk);
	}

	private function getUsers($travelperk) {
		$users = $travelperk->users()->users()->query()->setOffset(1)->setLimit(10)->get();
		write_output("users", [
			$users->offset,
			$users->limit,
			$users->total,
			$users->users,
			$users->users[0]->id,
			$users->users[0]->userName,
			$users->users[0]->name->firstName,
			$users->users[0]->name->lastName,
			$users->users[0]->name->middleName,
			$users->users[0]->name->title,
			$users->users[0]->preferredLanguage,
			$users->users[0]->locale,
			$users->users[0]->active,
			$users->users[0]->jobTitle,
			$users->users[0]->phoneNumbers,
			$users->users[0]->emergencyContact,
		]);
	}
}
