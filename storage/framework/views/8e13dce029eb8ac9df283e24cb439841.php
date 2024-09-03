<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'color' => '',
    'route' => '',
    'sections' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'color' => '',
    'route' => '',
    'sections' => '',
]); ?>
<?php foreach (array_filter(([
    'color' => '',
    'route' => '',
    'sections' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="modal fade" id="user-modal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-info-subtle">
                <h5 class="modal-title" id="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="user-form" id="edit-user-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="user-id-field-edit">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="first-name-field-edit" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first-name-field-edit">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="last-name-field-edit" class="form-label">last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last-name-field-edit">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="username-field-edit" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username-field-edit">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email-field-edit" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email-field-edit">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contact-number-field-edit" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="contact_number" id="contact-number-field-edit">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="section-field-edit" class="form-label">Section</label>
                                <select name="section_id" id="section-field-edit" class="form-select">
                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="role-field-edit" class="form-label">Role</label>
                                <select name="role_id" id="role-field-edit" class="form-select">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\GodesQ\MFC_Portal_V2\resources\views/components/users/edit-form.blade.php ENDPATH**/ ?>