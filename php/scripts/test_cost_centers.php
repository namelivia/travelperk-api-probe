<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;

class CostCentersTests {

	public function run($travelperk) {
		echo ("List cost centers\n");
		$this->listCostCenters($travelperk);
		echo ("Cost center details\n");
		$this->getCostCenter($travelperk);
		echo ("Update cost center\n");
		$this->updateCostCenter($travelperk);
		echo ("Bulk update cost center\n");
		$this->bulkUpdate($travelperk);
		echo ("Set users for cost centers\n");
		$this->setUsers($travelperk);
	}

	private function listCostCenters($travelperk) {
		$costCenters = $travelperk->costCenters()->costCenters()->all();
		write_output("cost_centers", [
			$costCenters->offset,
			$costCenters->limit,
			$costCenters->costCenters,
			$costCenters->costCenters[0]->id,
			$costCenters->costCenters[0]->name,
			$costCenters->costCenters[0]->countUsers,
		]);
	}

	private function getCostCenter($travelperk) {
		$costCenter = $travelperk->costCenters()->costCenters()->get("1");
		write_output("cost_center", [
			$costCenter->id,
			$costCenter->name,
			$costCenter->archived,
			$costCenter->countUsers,
			$costCenter->users,
			$costCenter->users[0]->firstName,
			$costCenter->users[0]->lastName,
			$costCenter->users[0]->email,
			$costCenter->users[0]->id,
			$costCenter->users[0]->phone,
			$costCenter->users[0]->profilePicture,
		]);
	}

	private function updateCostCenter($travelperk) {
		$originalCostCenter = $travelperk->costCenters()->costCenters()->get("1");
		$costCenter = $travelperk->costCenters()->costCenters()->modify("1")->setName("Updated name by api probe")->save();
		write_output("updated_cost_center", [
			$costCenter->id,
			$costCenter->name,
			$costCenter->archived,
			$costCenter->countUsers,
			$costCenter->users,
			$costCenter->users[0]->firstName,
			$costCenter->users[0]->lastName,
			$costCenter->users[0]->email,
			$costCenter->users[0]->id,
			$costCenter->users[0]->phone,
			$costCenter->users[0]->profilePicture,
		]);
		$travelperk->costCenters()->costCenters()->modify("1")->setName($originalCostCenter->name)->save();
	}

	private function bulkUpdate($travelperk)
	{
		$response = $travelperk->costCenters()->costCenters()->bulkUpdate()->setIds([1, 2])
			->setArchive(True)->save();
		write_output("bulk_update_cost_center", [
			$response->updatedCount,
		]);
		$response = $travelperk->costCenters()->costCenters()->bulkUpdate()->setIds([1, 2])
			->setArchive(False)->save();
	}

	private function setUsers($travelperk) {
		$costCenter = $travelperk->costCenters()->costCenters()->get("1");
		$originalUsers = array_map(function ($user) {
			return $user->id;
		}, $costCenter->users);
		$costCenter = $travelperk->costCenters()->costCenters()->setUsers("1")->setIds(["65", "34"])->save();
		write_output("set_users_for_cost_center", [
			$costCenter->id,
			$costCenter->name,
			$costCenter->archived,
			$costCenter->countUsers,
			$costCenter->users,
			$costCenter->users[0]->firstName,
			$costCenter->users[0]->lastName,
			$costCenter->users[0]->email,
			$costCenter->users[0]->id,
			$costCenter->users[0]->phone,
			$costCenter->users[0]->profilePicture,
		]);
		$travelperk->costCenters()->costCenters()->setUsers("1")->setIds($originalUsers)->save();
	}
}
