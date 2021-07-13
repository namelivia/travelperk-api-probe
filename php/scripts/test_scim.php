<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;

class SCIMTests {

	public function run($travelperk) {
		echo ("Get service provider configuration\n");
		$this->getServiceProviderConfig($travelperk);
		echo ("Get resource types\n");
		$this->getResourceTypes($travelperk);
		echo ("Get user schema\n");
		$this->getUserSchema($travelperk);
		echo ("Get enterprise schema\n");
		$this->getEnterpriseSchema($travelperk);
		echo ("List users\n");
		$this->listUsers($travelperk);
		echo ("Get user\n");
		$this->getUser($travelperk);
		echo ("Create user\n");
		$id = $this->createUser($travelperk);
		echo ("Replace user\n");
		$this->replaceUser($travelperk, $id);
		echo ("Delete user\n");
		$this->deleteUser($travelperk, $id);
		echo ("Get genders\n");
		$this->getGenders($travelperk);
		echo ("Get languages\n");
		$this->getLanguages($travelperk);
	}

	private function deleteUser($travelperk, $id) {
		$travelperk->scim()->users()->delete($id);
	}

	private function createUser($travelperk) {
		$user = $travelperk->scim()->users()->make(
			'test@api.probe',
			true,
			'Test',
			'Api Probe'
		)->setLocale('en')->setTitle('test_user')->save();
		write_output("create_user", [
			$user->schemas[0],
			$user->schemas[1],
			$user->schemas[2],
			$user->name->givenName,
			$user->name->familyName,
			$user->name->middleName,
			$user->name->honorificPrefix,
			$user->locale,
			$user->preferredLanguage,
			$user->title,
			$user->externalId,
			$user->id,
			$user->groups,
			$user->active,
			$user->userName,
			$user->phoneNumbers,
			$user->enterpriseExtension->costCenter,
			$user->travelperkExtension->gender,
			$user->travelperkExtension->dateOfBirth,
			$user->travelperkExtension->travelPolicy,
			#$user->travelperkExtension->invoiceProfiles[0]->value,
			$user->travelperkExtension->emergencyContact->name,
			$user->travelperkExtension->emergencyContact->phone,
			$user->travelperkExtension->approvers,
		]);
		return $user->id;
	}

	public function replaceUser($travelperk, $id) {
		$user = $travelperk->scim()->users()->modify(
			$id,
			'replaced@api.probe',
			true,
			'Test Updated',
			'Api Probe Updated'
		)->setLocale('fr')->setTitle('test_user_updated')->save();
		write_output("replace_user", [
			$user->schemas[0],
			$user->schemas[1],
			$user->schemas[2],
			$user->name->givenName,
			$user->name->familyName,
			$user->name->middleName,
			$user->name->honorificPrefix,
			$user->locale,
			$user->preferredLanguage,
			$user->title,
			$user->externalId,
			$user->id,
			$user->groups,
			$user->active,
			$user->userName,
			$user->phoneNumbers,
			$user->enterpriseExtension->costCenter,
			$user->travelperkExtension->gender,
			$user->travelperkExtension->dateOfBirth,
			$user->travelperkExtension->travelPolicy,
			$user->travelperkExtension->invoiceProfiles[0]->value,
			$user->travelperkExtension->emergencyContact->name,
			$user->travelperkExtension->emergencyContact->phone,
			$user->travelperkExtension->approvers,
		]);
	}

	private function getUser($travelperk) {
		$user = $travelperk->scim()->users()->get(2);
		write_output("user", [
			$user->schemas[0],
			$user->schemas[1],
			$user->schemas[2],
			$user->name->givenName,
			$user->name->familyName,
			$user->name->middleName,
			$user->name->honorificPrefix,
			$user->locale,
			$user->preferredLanguage,
			$user->title,
			$user->externalId,
			$user->id,
			$user->groups,
			$user->active,
			$user->userName,
			$user->phoneNumbers,
			$user->enterpriseExtension->costCenter,
			$user->travelperkExtension->gender,
			$user->travelperkExtension->dateOfBirth,
			$user->travelperkExtension->travelPolicy,
			$user->travelperkExtension->invoiceProfiles[0]->value,
			$user->travelperkExtension->emergencyContact->name,
			$user->travelperkExtension->emergencyContact->phone,
			$user->travelperkExtension->approvers,
		]);
	}

	private function listUsers($travelperk) {
		$users = $travelperk->scim()->users()->query()->setStartIndex(1)->setCount(10)->get();
		write_output("scim_users", [
			$users->schemas[0],
			$users->totalResults,
			$users->itemsPerPage,
			$users->startIndex,
			$users->resources,
			$users->resources[0]->schemas[0],
			$users->resources[0]->schemas[1],
			$users->resources[0]->schemas[2],
			$users->resources[0]->name->givenName,
			$users->resources[0]->name->familyName,
			$users->resources[0]->name->middleName,
			$users->resources[0]->name->honorificPrefix,
			$users->resources[0]->locale,
			$users->resources[0]->preferredLanguage,
			$users->resources[0]->title,
			$users->resources[0]->externalId,
			$users->resources[0]->id,
			$users->resources[0]->groups,
			$users->resources[0]->active,
			$users->resources[0]->userName,
			$users->resources[0]->phoneNumbers,
			$users->resources[0]->enterpriseExtension->costCenter,
			$users->resources[0]->travelperkExtension->gender,
			$users->resources[0]->travelperkExtension->dateOfBirth,
			$users->resources[0]->travelperkExtension->travelPolicy,
			$users->resources[0]->travelperkExtension->invoiceProfiles[0]->value,
			$users->resources[0]->travelperkExtension->emergencyContact->name,
			$users->resources[0]->travelperkExtension->emergencyContact->phone,
			$users->resources[0]->travelperkExtension->approvers,
		]);
	}

	private function getServiceProviderConfig($travelperk) {
		$config = $travelperk->scim()->discovery()->ServiceProviderConfig();
		write_output("service_provider_config", [
			$config->schemas[0],
			$config->patch->supported,
			$config->bulk->supported,
			$config->bulk->maxOperations,
			$config->bulk->maxPayloadSize,
			$config->filter->supported,
			$config->filter->maxResults,
			$config->changePassword->supported,
			$config->sort->supported,
			$config->etag->supported,
			$config->authenticationSchemes[0]->type,
			$config->authenticationSchemes[0]->name,
			$config->authenticationSchemes[0]->description,
			$config->Schemas[0]->id,
			$config->Schemas[0]->name,
			$config->Schemas[0]->description,
			$config->meta->location,
			$config->meta->resourceType,
		]);
	}

	private function getResourceTypes($travelperk) {
		$resourceTypes = $travelperk->scim()->discovery()->resourceTypes();
		write_output("list_resource_types", [
			$resourceTypes->totalResults,
			$resourceTypes->itemsPerPage,
			$resourceTypes->startIndex,
			$resourceTypes->schemas[0],
			$resourceTypes->Resources[0]->schemas[0],
			$resourceTypes->Resources[0]->id,
			$resourceTypes->Resources[0]->name,
			$resourceTypes->Resources[0]->endpoint,
			$resourceTypes->Resources[0]->description,
			$resourceTypes->Resources[0]->schema,
			$resourceTypes->Resources[0]->schemaExtensions[0]->schema,
			$resourceTypes->Resources[0]->schemaExtensions[0]->required,
			$resourceTypes->Resources[0]->schemaExtensions[1]->schema,
			$resourceTypes->Resources[0]->schemaExtensions[1]->required,
			$resourceTypes->Resources[0]->meta->resourceType,
			$resourceTypes->Resources[0]->meta->location,
		]);
	}

	private function getUserSchema($travelperk) {
		$userSchema = $travelperk->scim()->discovery()->userSchema();
		write_output("user_schema", [
			$userSchema->id,
			$userSchema->name,
			$userSchema->description,
			$userSchema->attributes,
			$userSchema->meta->resourceType,
			$userSchema->meta->location,
		]);
	}

	private function getEnterpriseSchema($travelperk) {
		$enterpriseSchema = $travelperk->scim()->discovery()->enterpriseUserSchema();
		write_output("enterprise_schema", [
			$enterpriseSchema->id,
			$enterpriseSchema->name,
			$enterpriseSchema->description,
			$enterpriseSchema->attributes,
			$enterpriseSchema->meta->resourceType,
			$enterpriseSchema->meta->location,
		]);
	}

	private function getGenders($travelperk) {
		$genders = $travelperk->scim()->users()->genders();
		write_output("genders", [
			$genders,
		]);
	}
	
	private function getLanguages($travelperk) {
		$languages = $travelperk->scim()->users()->languages();
		write_output("languages", [
			$languages,
		]);
	}
}
