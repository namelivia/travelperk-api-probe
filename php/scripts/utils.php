<?php
function write_output($name, $contents) {
    $path = "/usr/src/app/output/". $name;
	foreach ($contents as $element) {
		if (is_null($element)) {
			$element = "None"; # Mimic Python's null representation
		}
		if (is_bool($element)) {
			$element = $element ? "True" : "False"; # Mimic Python's bool representation
		}
		if (is_float($element) && floor($element) == $element) {
			$element = "{$element}.0"; # Mimic Python's 0 float representation
		}
		if (is_array($element)) {
			$element = count($element);
		}
		file_put_contents($path, $element, FILE_APPEND);
		file_put_contents($path, "\n", FILE_APPEND);
	}
}
