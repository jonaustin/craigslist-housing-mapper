

<? echo $form->create('Search', array('action'=>'index')); ?>

    <? echo $form->input('query', array('size'=>30)); ?>
    <? echo $form->input('minAsk'); ?>
    <? echo $form->input('maxAsk'); ?>
    <? echo $form->input('bedrooms'); ?>
    <? echo $form->input('hasPic', array('type'=>'checkbox')); ?>
    <? echo $form->input('addTwo', array('type'=>'checkbox', 'label'=>'Allows cats')); ?>
    <? echo $form->input('addThree', array('type'=>'checkbox', 'label'=>'Allows dogs')); ?>
    <? echo $form->input('srchType', array('type'=>'checkbox', 'label'=>'Only search titles')); ?>

    <? echo $form->hidden('catAbbreviation', array('value'=>'apa')); ?>
    <? echo $form->hidden('county', array('value'=>'')); ?>

    <? echo $form->submit(); ?>








<? echo $form->end(); ?>

