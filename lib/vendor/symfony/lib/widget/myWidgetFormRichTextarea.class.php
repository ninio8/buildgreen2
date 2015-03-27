<?php
class myWidgetFormRichTextarea extends sfWidgetFormTextarea
{

  protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('editor', 'wymeditor');
    $this->addOption('tinymce_options', '');
    $this->addOption('tinymce_gzip', false);
    $this->addOption('css', false);
    $this->addOption('lang', 'en');
    $this->addOption('updateSelector', 'en');
    $this->addOption('updateEvent', 'click');
    $this->addOption('skin', 'en');
    $this->addOption('stylesheet', 'en');

    
    $this->setAttribute('class', 'wymeditor');
    
    
    parent::configure($options, $attributes);
  }
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $editorClass = 'sfRichTextEditor' . $this->toCanonicalCase($this->getOption('editor'));
    if (!class_exists($editorClass)) {
      throw new sfConfigurationException(sprintf('The rich text editor "%s" does not exist.', $editorClass));
    }
    
    $editor = new $editorClass();
    if (!in_array('sfRichTextEditor', class_parents($editor))) {
      throw new sfConfigurationException(sprintf('The editor "%s" must extend sfRichTextEditor.', $editor));
    }

    if($this->getOption('editor') != 'wymeditor')
    {
    	$attributes = array_merge($attributes, $this->getOptions());
    }
    else
    {
    	$attributes = $this->getOptions();
    }
    
    $editor->initialize($name, $value, $attributes);
    if($this->getOption('editor') == 'wymeditor'){
    return $editor->toHTML().$this->renderContentTag('textarea', self::escapeOnce($value), array_merge(array('name' => $name), $attributes));
    }
    else
    {
    	return $editor->toHTML();
    }
  }
  

  private function toCanonicalCase($editor)
  {
    switch ($editor) {
      case 'tinymce':
        return 'TinyMCE';
      case 'fck':
        return 'FCK';
      case 'wymeditor':
      	return 'WYMeditor';
    }
  }
}
