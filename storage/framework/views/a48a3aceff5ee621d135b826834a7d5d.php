<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'id' => 'contactNumberInput',
    'name' => 'contact_number',
    'value' => '',
    'formId' => 'userEditForm'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id' => 'contactNumberInput',
    'name' => 'contact_number',
    'value' => '',
    'formId' => 'userEditForm'
]); ?>
<?php foreach (array_filter(([
    'id' => 'contactNumberInput',
    'name' => 'contact_number',
    'value' => '',
    'formId' => 'userEditForm'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<div class="mb-3">
    <label for='<?php echo e($id); ?>' class="form-label">Contact Number<span class="text-danger">*</span></label>
    <div class="form-icon">
        <input name=<?php echo e($name); ?> type="text" class="form-control form-control-icon" id='<?php echo e($id); ?>'
            required oninput="validateContactNumber(this);" pattern="^9\d{2} \d{3} \d{4}$" value="<?php echo e($value); ?>" placeholder="912 345 6789" style="padding-left: 55px;">
        <i style="left: 15px;" class="fst-normal"><span class="position-absolute" style="top: 9px;">(+63)</span></i>
        <div class="invalid-feedback">Please Enter a valid contact number.</div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        if (document.getElementById('<?php echo e($id); ?>')) {
            var cleavePrefix = new Cleave('#<?php echo e($id); ?>', {
                delimiter: ' ',
                blocks: [3, 3, 4],
            });
        }

        const form = document.getElementById('<?php echo e($formId); ?>');
        const inputElement = document.getElementById('<?php echo e($id); ?>');

        form.addEventListener('submit', function(event) {
            validateContactNumber(inputElement);
        });


    });
</script>
<?php /**PATH C:\Users\GoDesQ3\Downloads\MFC_Portal_V2\resources\views/components/input_fields/contact-number.blade.php ENDPATH**/ ?>