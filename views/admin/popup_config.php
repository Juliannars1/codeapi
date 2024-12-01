<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <h1><?php echo $title; ?></h1>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php echo form_open('admin/save'); ?>
        <div class="form-group">
            <label for="text">Popup Text</label>
            <textarea name="text" id="text" class="form-control" rows="5"><?php echo set_value('text', isset($config['text']) ? $config['text'] : ''); ?></textarea>
            <?php echo form_error('text', '<div class="text-danger">', '</div>'); ?>
        </div>

        <h3>Style Configuration</h3>
        <?php $style = isset($config['style']) ? json_decode($config['style'], true) : []; ?>
        
        <div class="form-group">
            <label for="background_color">Background Color</label>
            <input type="color" name="background_color" id="background_color" class="form-control" 
                   value="<?php echo set_value('background_color', isset($style['background_color']) ? $style['background_color'] : '#ffffff'); ?>">
        </div>

        <div class="form-group">
            <label for="text_color">Text Color</label>
            <input type="color" name="text_color" id="text_color" class="form-control"
                   value="<?php echo set_value('text_color', isset($style['text_color']) ? $style['text_color'] : '#000000'); ?>">
        </div>

        <div class="form-group">
            <label for="width">Width (px)</label>
            <input type="number" name="width" id="width" class="form-control"
                   value="<?php echo set_value('width', isset($style['width']) ? $style['width'] : '400'); ?>">
        </div>

        <div class="form-group">
            <label for="height">Height (px)</label>
            <input type="number" name="height" id="height" class="form-control"
                   value="<?php echo set_value('height', isset($style['height']) ? $style['height'] : '300'); ?>">
        </div>

        <div class="form-group">
            <label for="position">Position</label>
            <select name="position" id="position" class="form-control">
                <option value="center" <?php echo set_select('position', 'center', isset($style['position']) && $style['position'] === 'center'); ?>>Center</option>
                <option value="top" <?php echo set_select('position', 'top', isset($style['position']) && $style['position'] === 'top'); ?>>Top</option>
                <option value="bottom" <?php echo set_select('position', 'bottom', isset($style['position']) && $style['position'] === 'bottom'); ?>>Bottom</option>
            </select>
        </div>

        <h3>Display Conditions</h3>
        <?php $conditions = isset($config['conditions']) ? json_decode($config['conditions'], true) : []; ?>

        <div class="form-group">
            <label>
                <input type="checkbox" name="show_once" value="1" 
                       <?php echo set_checkbox('show_once', '1', isset($conditions['show_once']) && $conditions['show_once']); ?>>
                Show only once per user
            </label>
        </div>

        <div class="form-group">
            <label for="delay">Display delay (seconds)</label>
            <input type="number" name="delay" id="delay" class="form-control"
                   value="<?php echo set_value('delay', isset($conditions['delay']) ? $conditions['delay'] : '0'); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Save Configuration</button>
    <?php echo form_close(); ?>
</div>