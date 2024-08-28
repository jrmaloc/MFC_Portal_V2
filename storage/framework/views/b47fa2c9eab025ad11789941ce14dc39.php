<script src="<?php echo e(URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/node-waves/waves.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/feather-icons/feather.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/plugins/lord-icon-2.1.0.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/quill/2.0.2/quill.min.js"></script>
<script src="<?php echo e(URL::asset('build/js/pages/form-editor.init.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo e(URL::asset('build/js/pages/password-addon.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/form-validation.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/cleave.js/cleave.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/filepond/filepond.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')); ?>">
</script>
<script
    src="<?php echo e(URL::asset('build/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')); ?>">
</script>
<script
    src="<?php echo e(URL::asset('build/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')); ?>">
</script>
<script src="<?php echo e(URL::asset('build/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')); ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/choices.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

<?php if(Session::get('success')): ?>
    <script>
        toastr.options = {
            closeButton: true, // Add close button
            timeOut: 2000
        };
        toastr.success("<?php echo e(Session::get('success')); ?>", "Success");
    </script>
<?php endif; ?>

<?php if(Session::get('fail')): ?>
    <script>
        toastr.options = {
            closeButton: true, // Add close button
            timeOut: 2000
        };
        toastr.error("<?php echo e(Session::get('fail')); ?>", 'Fail');
    </script>
<?php endif; ?>

<?php echo $__env->yieldContent('script'); ?>
<?php echo $__env->yieldContent('script-bottom'); ?>
<?php /**PATH D:\MFC_Portal_V2\resources\views/layouts/vendor-scripts.blade.php ENDPATH**/ ?>