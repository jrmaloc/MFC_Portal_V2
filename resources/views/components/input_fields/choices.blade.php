@props([
    'label' => '',
    'formId' => '',
])

<style>
    .hide-after::after {
        content: "";
        display: none;
        margin-bottom: 0px;
    }
</style>

<div class="mb-3">
    <label for="{{ $label }}select" class="form-label"><span class="text-capitalize">{{ $label }}</span><span class="text-danger">*</span></label>
    <select class="form-control" name="{{ $label }}" id="{{ $label }}select" data-choices
        data-choices-search-false required>
        <option value="" class="text-capitalize">Select {{ $label }}</option>
        {{ $slot }}
    </select>
    <div class="invalid-feedback">Please select a {{ $label }}.</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add a custom event listener for validation on change
        document.getElementById('{{ $label }}select').addEventListener('change', function() {
            validateSelect(this);
        });

        document.getElementById('{{ $formId }}').addEventListener('submit', function(event) {
            validateForm();
        });

        function validateForm() {
            const selectElement = document.getElementById('{{ $label }}select');
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
