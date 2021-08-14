<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
use Namelivia\TravelPerk\ServiceProvider;
require_once("test_base.php");

class CostCentersTests extends TestBase {

	public function run() {
		echo ("List cost centers\n");
		$this->listCostCenters();
		echo ("Create cost center\n");
		$this->createCostCenter();
		echo ("Cost center details\n");
		$this->getCostCenter();
		echo ("Update cost center\n");
		$this->updateCostCenter();
		echo ("Bulk update cost center\n");
		$this->bulkUpdate();
		echo ("Set users for cost centers\n");
		$this->setUsers();
	}

	private function listCostCenters() {
		$costCenters = $this->travelperk->costCenters()->costCenters()->all();
		write_output("cost_centers", [
			$costCenters->offset,
			$costCenters->limit,
			$costCenters->costCenters,
			$costCenters->costCenters[0]->id,
			$costCenters->costCenters[0]->name,
			$costCenters->costCenters[0]->countUsers,
		]);
	}

	private function createCostCenter() {
		$costCenter = $this->travelperk->costCenters()->costCenters()->create("api-probe-test-cost-center");
		write_output("create_cost_center", [
			#$costCenter->id,
			$costCenter->name,
			$costCenter->archived,
			$costCenter->countUsers,
			$costCenter->users,
		]);
		# The cost center gets archived so it can be created again
		$this->travelperk->costCenters()->costCenters()->modify($costCenter->id)->setArchive(True)->save();
	}

	private function getCostCenter() {
		$costCenter = $this->travelperk->costCenters()->costCenters()->get("1");
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

	private function updateCostCenter() {
		$originalCostCenter = $this->travelperk->costCenters()->costCenters()->get("1");
		$costCenter = $this->travelperk->costCenters()->costCenters()->modify("1")->setName("Updated name by api probe")->save();
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
		$this->travelperk->costCenters()->costCenters()->modify("1")->setName($originalCostCenter->name)->save();
	}

	private function bulkUpdate()
	{
		$response = $this->travelperk->costCenters()->costCenters()->bulkUpdate()->setIds([1, 2])
			->setArchive(True)->save();
		write_output("bulk_update_cost_center", [
			$response->updatedCount,
		]);
		$response = $this->travelperk->costCenters()->costCenters()->bulkUpdate()->setIds([1, 2])
			->setArchive(False)->save();
	}

	private function setUsers() {
		$costCenter = $this->travelperk->costCenters()->costCenters()->get("1");
		$originalUsers = array_map(function ($user) {
			return $user->id;
		}, $costCenter->users);
		$costCenter = $this->travelperk->costCenters()->costCenters()->setUsers("1")->setIds(["65", "34"])->save();
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
		$this->travelperk->costCenters()->costCenters()->setUsers("1")->setIds($originalUsers)->save();
	}
}
