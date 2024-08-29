<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'id' => 'usernameInput',
    'name' => 'username',
    'value' => '',

]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id' => 'usernameInput',
    'name' => 'username',
    'value' => '',

]); ?>
<?php foreach (array_filter(([
    'id' => 'usernameInput',
    'name' => 'username',
    'value' => '',

]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="mb-3">
    <label for="<?php echo e($id); ?>" class="form-label">Username<span class="text-danger">*</span></label>
    <input name="<?php echo e($name); ?>" type="text" class="form-control" id="<?php echo e($id); ?>" placeholder="Enter username" required
        oninput="this.value = validateUsername(this.value, '<?php echo e($id); ?>');" value="<?php echo e($value); ?>">
    <div class="invalid-feedback">Please Enter a username.</div>
</div>
<?php /**PATH D:\GodesQ\MFC_Portal_V2\resources\views/components/input_fields/username.blade.php ENDPATH**/ ?>