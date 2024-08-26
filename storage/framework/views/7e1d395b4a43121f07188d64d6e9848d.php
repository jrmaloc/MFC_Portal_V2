<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.signup'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index" class="d-inline-block auth-logo">
                                    <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt=""
                                        height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                    <p class="text-muted">Get your free velzon account now</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation" novalidate method="POST" id="registerForm"
                                        action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php if (isset($component)) { $__componentOriginal10658521e196a5cbb97b3ebb9ee1282e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal10658521e196a5cbb97b3ebb9ee1282e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input_fields.name','data' => ['id' => 'userFirstName','label' => 'First Name','name' => 'firstname','value' => ''.e(old('firstname')).'','feedback' => 'Please enter your first name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input_fields.name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'userFirstName','label' => 'First Name','name' => 'firstname','value' => ''.e(old('firstname')).'','feedback' => 'Please enter your first name']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal10658521e196a5cbb97b3ebb9ee1282e)): ?>
<?php $attributes = $__attributesOriginal10658521e196a5cbb97b3ebb9ee1282e; ?>
<?php unset($__attributesOriginal10658521e196a5cbb97b3ebb9ee1282e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10658521e196a5cbb97b3ebb9ee1282e)): ?>
<?php $component = $__componentOriginal10658521e196a5cbb97b3ebb9ee1282e; ?>
<?php unset($__componentOriginal10658521e196a5cbb97b3ebb9ee1282e); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginal10658521e196a5cbb97b3ebb9ee1282e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal10658521e196a5cbb97b3ebb9ee1282e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input_fields.name','data' => ['id' => 'userLastName','label' => 'Last Name','name' => 'lastname','value' => ''.e(old('lastname')).'','feedback' => 'Please enter your last name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input_fields.name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'userLastName','label' => 'Last Name','name' => 'lastname','value' => ''.e(old('lastname')).'','feedback' => 'Please enter your last name']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal10658521e196a5cbb97b3ebb9ee1282e)): ?>
<?php $attributes = $__attributesOriginal10658521e196a5cbb97b3ebb9ee1282e; ?>
<?php unset($__attributesOriginal10658521e196a5cbb97b3ebb9ee1282e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10658521e196a5cbb97b3ebb9ee1282e)): ?>
<?php $component = $__componentOriginal10658521e196a5cbb97b3ebb9ee1282e; ?>
<?php unset($__componentOriginal10658521e196a5cbb97b3ebb9ee1282e); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalf8164d92936e1513ffbc55c3652034d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8164d92936e1513ffbc55c3652034d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input_fields.email','data' => ['id' => 'useremail','name' => 'email','value' => ''.e(old('email')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input_fields.email'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'useremail','name' => 'email','value' => ''.e(old('email')).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8164d92936e1513ffbc55c3652034d1)): ?>
<?php $attributes = $__attributesOriginalf8164d92936e1513ffbc55c3652034d1; ?>
<?php unset($__attributesOriginalf8164d92936e1513ffbc55c3652034d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8164d92936e1513ffbc55c3652034d1)): ?>
<?php $component = $__componentOriginalf8164d92936e1513ffbc55c3652034d1; ?>
<?php unset($__componentOriginalf8164d92936e1513ffbc55c3652034d1); ?>
<?php endif; ?>

                                        <?php if (isset($component)) { $__componentOriginal687a99f5f3aa9fa378ae81914e61734f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal687a99f5f3aa9fa378ae81914e61734f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input_fields.contact-number','data' => ['id' => 'usercontact','name' => 'contact_number','formId' => 'registerForm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input_fields.contact-number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'usercontact','name' => 'contact_number','formId' => 'registerForm']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal687a99f5f3aa9fa378ae81914e61734f)): ?>
<?php $attributes = $__attributesOriginal687a99f5f3aa9fa378ae81914e61734f; ?>
<?php unset($__attributesOriginal687a99f5f3aa9fa378ae81914e61734f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal687a99f5f3aa9fa378ae81914e61734f)): ?>
<?php $component = $__componentOriginal687a99f5f3aa9fa378ae81914e61734f; ?>
<?php unset($__componentOriginal687a99f5f3aa9fa378ae81914e61734f); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalc4147c8a32244764de5df52bbb10c56c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc4147c8a32244764de5df52bbb10c56c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input_fields.choices','data' => ['label' => 'MFC Section','id' => 'mfc_section','formId' => 'registerForm','name' => 'section']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input_fields.choices'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'MFC Section','id' => 'mfc_section','formId' => 'registerForm','name' => 'section']); ?>
                                            <option value="kids" class="text-capitalize">kids</option>
                                            <option value="youth" class="text-capitalize">youth</option>
                                            <option value="singles" class="text-capitalize">singles</option>
                                            <option value="handmaids" class="text-capitalize">handmaids</option>
                                            <option value="servants" class="text-capitalize">servants</option>
                                            <option value="couples" class="text-capitalize">couples</option>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc4147c8a32244764de5df52bbb10c56c)): ?>
<?php $attributes = $__attributesOriginalc4147c8a32244764de5df52bbb10c56c; ?>
<?php unset($__attributesOriginalc4147c8a32244764de5df52bbb10c56c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc4147c8a32244764de5df52bbb10c56c)): ?>
<?php $component = $__componentOriginalc4147c8a32244764de5df52bbb10c56c; ?>
<?php unset($__componentOriginalc4147c8a32244764de5df52bbb10c56c); ?>
<?php endif; ?>

                                        <div class="mb-3">
                                            <p class="mb-0 fs-12 text-muted fst-italic d-flex gap-1">By registering you
                                                agree to the
                                                Velzon <a href="#"
                                                    class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                                    of Use</a></p>
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                        </div>

                                        <div class="mt-3 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                            </div>

                                            <div>
                                                <button type="button"
                                                    class="btn btn-primary btn-icon waves-effect waves-light"><i
                                                        class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button"
                                                    class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                        class="ri-google-fill fs-16"></i></button>
                                                <button type="button"
                                                    class="btn btn-dark btn-icon waves-effect waves-light"><i
                                                        class="ri-github-fill fs-16"></i></button>
                                                <button type="button"
                                                    class="btn btn-info btn-icon waves-effect waves-light"><i
                                                        class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account? <a href="<?php echo e(route('login')); ?>"
                                    class="fw-semibold text-primary text-decoration-underline"> Sign In </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                            Themesbrand</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/particles.js/particles.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/particles.app.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/password-addon.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/form-validation.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/prismjs/prism.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GodesQ\MFC_Portal_V2\resources\views/auth/register.blade.php ENDPATH**/ ?>