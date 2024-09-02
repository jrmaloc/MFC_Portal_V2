<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'id' => 'emailInput',
    'name' => 'email',
    'value' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id' => 'emailInput',
    'name' => 'email',
    'value' => '',
]); ?>
<?php foreach (array_filter(([
    'id' => 'emailInput',
    'name' => 'email',
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
    <label for="<?php echo e($id); ?>" class="form-label">Email <span class="text-danger">*</span></label>
    <input name="<?php echo e($name); ?>" type="email" class="form-control" id="<?php echo e($id); ?>" placeholder="jdc@example.com" required
        oninput="validateEmail(this.value, '<?php echo e($id); ?>')" value="<?php echo e($value); ?>">
    <div class="invalid-feedback">Please Enter a valid email.</div>
</div>
<?php /**PATH D:\MFC_Portal_V2\resources\views/components/input_fields/email.blade.php ENDPATH**/ ?>