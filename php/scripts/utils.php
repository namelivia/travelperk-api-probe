<?php
function write_output($name, $contents) {
    $path = "/usr/src/app/output/". $name;
	foreach ($contents as $element) {
		if (is_null($element)) {
			$element = "None";
		}
		if (is_bool($element)) {
			$element = $element ? "True" : "False";
		}
		if (is_array($element)) {
			$element = count($element);
		}
		file_put_contents($path, $element, FILE_APPEND);
		file_put_contents($path, "\n", FILE_APPEND);
	}
}
