<?php foreach ($districts as $id => $label): ?>
<option value="<?php echo $id; ?>"<?php echo ($value==$id) ? ' selected="selected"' : ''; ?>>
    <?php echo $label; ?>
</option>
<?php endforeach; ?>