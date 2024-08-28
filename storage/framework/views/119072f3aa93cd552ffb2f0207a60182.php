<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'id' => 'nameInput',
    'name' => 'name',
    'value' => '',
    'label' => 'Name',
    'feedback' => 'Please Enter a valid name.',
    'placeholder' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id' => 'nameInput',
    'name' => 'name',
    'value' => '',
    'label' => 'Name',
    'feedback' => 'Please Enter a valid name.',
    'placeholder' => '',
]); ?>
<?php foreach (array_filter(([
    'id' => 'nameInput',
    'name' => 'name',
    'value' => '',
    'label' => 'Name',
    'feedback' => 'Please Enter a valid name.',
    'placeholder' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<div class="mb-3">
    <label for='<?php echo e($id); ?>' class="form-label"><?php echo e($label); ?> <span class="text-danger">*</span></label>
    <input name='<?php echo e($name); ?>' type="text" class="form-control text-capitalize" id='<?php echo e($id); ?>' placeholder="<?php echo e($placeholder); ?>" required
        oninput="this.value = validateInput(this.value, '<?php echo e($id); ?>');" value="<?php echo e($value); ?>">
    <div class="invalid-feedback"><?php echo e($feedback); ?></div>
</div>
<?php /**PATH D:\MFC_Portal_V2\resources\views/components/input_fields/basic.blade.php ENDPATH**/ ?>