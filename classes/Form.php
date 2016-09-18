<?php
class Form {

public function isPost($field = null) {
	if (!empty($field)) {
		if (isset($_POST[$field])) {
			return true;
		}
		return false;
	} else {
		if (!empty($_POST)) {
			return true;
		}
	}
}

public function getPost($field = null) {
	if (!empty($field)) {
		return $this->isPost($field) ?
		strip_tags($_POST[$field]) :
		null;
		
	}
}

}

