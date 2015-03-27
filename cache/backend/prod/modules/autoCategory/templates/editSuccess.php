<?php use_helper('I18N', 'Date') ?>
<?php include_partial('category/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editing Category "%%title%%"', array('%%title%%' => $buildgreen_category->getTitle()), 'messages') ?></h1>

  <?php include_partial('category/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('category/form_header', array('buildgreen_category' => $buildgreen_category, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('category/form', array('buildgreen_category' => $buildgreen_category, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('category/form_footer', array('buildgreen_category' => $buildgreen_category, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
