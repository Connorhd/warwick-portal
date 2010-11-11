<?php

require(BASE_DIR.'lib/mustache.php/Mustache.php');

class FTemplate extends Mustache {
	// Our function for rendering templates
	public function renderTpl($tpl, $view = array()) {
		return $this->render(file_get_contents(BASE_DIR.'template/'.$tpl.'.mu'), $view);
	}
	
	public function addView($view) {
		$this->_context = array_merge($this->_context, array($view));
	}
	
	// Auto load partials
	protected function _getPartial($tag_name) {
		if (is_array($this->_partials) && isset($this->_partials[$tag_name])) {
			return $this->_partials[$tag_name];
		}

		if (is_file(BASE_DIR.'template/'.$tag_name.'.mu')) {
			return file_get_contents(BASE_DIR.'template/'.$tag_name.'.mu');
		} else {
			if ($this->_throwsException(MustacheException::UNKNOWN_PARTIAL)) {
				throw new MustacheException('Unknown partial: ' . $tag_name, MustacheException::UNKNOWN_PARTIAL);
			} else {
				return '';
			}
		}
	}
	
	// Render with merge of view
	public function render($template = null, $view = null, $partials = null) {
		if ($template === null) $template = $this->_template;
		if ($partials !== null) $this->_partials = $partials;

		if ($view) {
			$this->_context = array_merge($this->_context, array($view));
		} else if (empty($this->_context)) {
			$this->_context = array($this);
		}

		$template = $this->_renderPragmas($template);
		return $this->_renderTemplate($template, $this->_context);
	}
}
