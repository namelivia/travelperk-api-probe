<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once("utils.php");
require_once("test_base.php");
use Namelivia\TravelPerk\ServiceProvider;

class WebhooksTests extends TestBase {

	public function __construct($travelperk) {
		parent::__construct($travelperk);
	}

	public function run() {
		echo ("List webhooks\n");
		$this->listWebhooks();
		echo ("Get webhook\n");
		$this->getWebhook();
		echo ("Test webhook\n");
		$this->testWebhook();
		echo ("Create webhook\n");
		$id = $this->createWebhook();
		echo ("Update webhook\n");
		$this->updateWebhook($id);
		echo ("Delete webhook\n");
		$this->deleteWebhook($id);
	}

	private function testWebhook() {
		$this->travelperk->webhooks()->webhooks()->test("b4ab65a2-31b6-4cf8-9cfb-f0788c47f7c7");
	}

	private function getWebhook() {
		$webhook = $this->travelperk->webhooks()->webhooks()->get("b4ab65a2-31b6-4cf8-9cfb-f0788c47f7c7");
		write_output("webhook", [
			$webhook->id,
			$webhook->enabled,
			$webhook->name,
			$webhook->url,
			$webhook->secret,
			$webhook->events,
			$webhook->events[0],
			$webhook->successfullySent,
			$webhook->failedSent,
			$webhook->errorRate,
		]);
	}

	private function listWebhooks() {
		$webhooks = $this->travelperk->webhooks()->webhooks()->all();
		write_output("webhooks", [
			$webhooks->webhooks,
			$webhooks->webhooks[0]->id,
			$webhooks->webhooks[0]->enabled,
			$webhooks->webhooks[0]->name,
			$webhooks->webhooks[0]->url,
			$webhooks->webhooks[0]->secret,
			$webhooks->webhooks[0]->events,
			$webhooks->webhooks[0]->events[0],
			$webhooks->webhooks[0]->successfullySent,
			$webhooks->webhooks[0]->failedSent,
			$webhooks->webhooks[0]->errorRate,
		]);
	}

	private function createWebhook() {
		$webhook = $this->travelperk->webhooks()->webhooks()->create(
			"test",
			"https://test.namelivia.com",
			"SomeTestingSecret",
			["invoice.issued"],
		);
		write_output("create_webhook", [
			# $webhook->id, Id will be new every time
			$webhook->enabled,
			$webhook->name,
			$webhook->url,
			$webhook->secret,
			$webhook->events,
			$webhook->events[0],
			$webhook->successfullySent,
			$webhook->failedSent,
			$webhook->errorRate,
		]);
		return $webhook->id;
	}

	private function updateWebhook($id) {
		$webhook = $this->travelperk->webhooks()->webhooks()->modify(
			$id
		)->setEnabled(false)->save();
		write_output("update_webhook", [
			# $webhook->id, Id will be new every time
			$webhook->enabled,
			$webhook->name,
			$webhook->url,
			$webhook->secret,
			$webhook->events,
			$webhook->events[0],
			$webhook->successfullySent,
			$webhook->failedSent,
			$webhook->errorRate,
		]);
	}

	private function deleteWebhook($id) {
		$this->travelperk->webhooks()->webhooks()->delete(
			$id
		);
	}

}
