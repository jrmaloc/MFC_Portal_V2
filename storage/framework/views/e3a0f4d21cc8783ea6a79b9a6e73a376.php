<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'label' => '',
    'id' => 'choices',
    'name' => 'choices',
    'formId' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'label' => '',
    'id' => 'choices',
    'name' => 'choices',
    'formId' => '',
]); ?>
<?php foreach (array_filter(([
    'label' => '',
    'id' => 'choices',
    'name' => 'choices',
    'formId' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<style>
    .hide-after::after {
        content: "";
        display: none;
        margin-bottom: 0px;
    }

    .choices__item.choices__item--selectable {
        text-transform: capitalize;
    }

    .form-control.is-valid {
        border-color: var(--vz-form-valid-border-color) !important;
    }
</style>

<div class="mb-3">
    <label for="<?php echo e($id); ?>" class="form-label"><span class="text-capitalize"><?php echo e($label); ?>

        </span><span class="text-danger">*</span></label>
    <select class="form-control" name="<?php echo e($name); ?>" id="<?php echo e($id); ?>" required>
        <option value="">Select <?php echo e($label); ?></option>
        <?php echo e($slot); ?>

    </select>
    <div class="invalid-feedback">Please select atleast one.</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectInput = document.getElementById('<?php echo e($id); ?>');

        new Choices(selectInput, {
            searchEnabled: false,
            shouldSort: false,
        });

        // Add a custom event listener for validation on change
        document.getElementById('<?php echo e($id); ?>').addEventListener('change', function() {
            validateSelect(this);
        });

        document.getElementById('<?php echo e($formId); ?>').addEventListener('submit', function(event) {
            validateForm();
        });

        function validateForm() {
            const selectElement = document.getElementById('<?php echo e($id); ?>');
            if (validateSelect(selectElement)) {
                // Form is valid
                return true;
            } else {
                // Form is invalid
                return false;
            }
        }

        function validateSelect(selectElement) {
            const selectedValue = selectElement.value;
            const selectInputs = selectElement.parentElement;
            const dropdownIcon = selectInputs.parentElement;
            const errorMessage = dropdownIcon.nextElementSibling;

            selectInputs.classList.add('form-control');

            if (selectedValue == '') {
                selectInputs.classList.add('is-invalid');
                selectInputs.classList.remove('is-valid');

                dropdownIcon.classList.add('hide-after');
                dropdownIcon.classList.add('mb-0');

                errorMessage.style.display = "block";

                return false;
            } else {
                selectInputs.classList.remove('is-invalid');
                selectInputs.classList.add('is-valid');

                dropdownIcon.classList.add('hide-after');
                dropdownIcon.classList.add('mb-0');

                errorMessage.style.display = "none";
                return true;
            }
        }
    });
</script>
<?php /**PATH D:\GodesQ\MFC_Portal_V2\resources\views/components/input_fields/choices.blade.php ENDPATH**/ ?>