<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="<?php echo e(URL::asset('build/images/profile-bg.jpg')); ?>" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file"
                            class="profile-foreground-img-file-input">
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="<?php if(Auth::user()->avatar != ''): ?> <?php echo e(URL::asset('build/images/users/' . Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('build/images/users/avatar-1.jpg')); ?> <?php endif; ?>"
                                class="  rounded-circle avatar-xl img-thumbnail user-profile-image"
                                alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-1"><?php echo e(Auth::user()->fist_name ?? 'Sample'); ?>

                            <?php echo e(Auth::user()->last_name ?? 'User'); ?></h5>
                        <p class="text-muted mb-0">MFC ID: <span id="mfc-id"><?php echo e(Auth::user()->mfc_id_number); ?></span> <a href="javascript:void(0);"
                                class="ri-file-copy-line" id="copy-mfc-id" data-bs-toggle="tooltip" data-bs-placement="right"></a></p>
                        <script>
                            document.getElementById('copy-mfc-id').addEventListener('click', function(event) {
                                event.preventDefault(); // Prevent default action
                                console.log('test');

                                const mfcId = document.getElementById('mfc-id').textContent;
                                navigator.clipboard.writeText(mfcId).then(function() {
                                    alert('MFC ID copied to clipboard!');
                                }, function(err) {
                                    console.error('Could not copy text: ', err);
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-5">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Complete Your Profile</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" onclick="editProfile('firstnameInput');"
                                class="badge bg-light text-primary fs-12"><i class="ri-edit-box-line align-bottom me-1"></i>
                                Edit</a>
                        </div>
                    </div>
                    <div class="progress animated-progress custom-progress progress-label">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="label">30%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Other Infos</h5>
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-body text-body">
                                <i class="ri-map-pin-line"></i>
                            </span>
                        </div>
                        <input type="email" class="form-control" id="userAddress" placeholder="Address"
                            value="123 sample St., Quezon City">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-primary">
                                <i class="ri-facebook-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="websiteInput" placeholder="www.example.com"
                            value="@facebookUser">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-danger">
                                <i class="ri-instagram-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="dribbleName" placeholder="Username"
                            value="@instagramUser">
                    </div>
                    <div class="d-flex">
                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                            <span class="avatar-title rounded-circle fs-16 bg-dark">
                                <i class="ri-twitter-x-fill"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="pinterestName" placeholder="Username"
                            value="@sampleUser">
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#service" role="tab">
                                <i class="far fa-envelope"></i>
                                Service
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <!-- personalDetails -->
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="javascript:void(0);">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">First
                                                Name</label>
                                            <input type="text" class="form-control" id="firstnameInput"
                                                placeholder="Enter your firstname" value="Dave">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Last
                                                Name</label>
                                            <input type="text" class="form-control" id="lastnameInput"
                                                placeholder="Enter your lastname" value="Adame">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone
                                                Number</label>
                                            <input type="text" class="form-control" id="phonenumberInput"
                                                placeholder="Enter your phone number" value="+(1) 987 6543">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email
                                                Address</label>
                                            <input type="email" class="form-control" id="emailInput"
                                                placeholder="Enter your email" value="daveadame@velzon.com">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="JoiningdatInput" class="form-label">Joining
                                                Date</label>
                                            <input type="text" class="form-control" data-provider="flatpickr"
                                                data-altFormat="F j, Y" id="JoiningdatInput"
                                                value="<?php echo e(Auth::user()->created_at); ?>" placeholder="Select date" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="JoiningdatInput" class="form-label">MFC Section</label>
                                            <select name="section" id="mfc_section" data-choices
                                                data-choices-sorting-false data-choices-search-false>
                                                <option value="">Select Section</option>
                                                <option value="kids">Kids</option>
                                                <option value="youth">Youth</option>
                                                <option value="singles">Singles</option>
                                                <option value="handmaids">Handmaids</option>
                                                <option value="servants">Servants</option>
                                                <option value="couples">Couples</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="DOBInput" class="form-label">Birth
                                                Date</label>
                                            <input type="text" class="form-control" data-provider="flatpickr"
                                                id="DOBInput" data-altFormat="F j, Y" placeholder="Select date" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label for="JoiningdatInput" class="form-label">Area</label>
                                            <select name="section" id="mfc_section" data-choices
                                                data-choices-sorting-false>
                                                <option value="">Select Area</option>
                                                <option value="ncr">NCR</option>
                                                <option value="ncr_north">NCR - North</option>
                                                <option value="ncr_south">NCR - South</option>
                                                <option value="ncr_east">NCR - East</option>
                                                <option value="ncr_cental">NCR - Central</option>
                                                <option value="handmaids">South Luzon</option>
                                                <option value="servants">North & Central Luzon</option>
                                                <option value="visayas">Visayas</option>
                                                <option value="mindanao">Mindanao</option>
                                                <option value="international">International</option>
                                                <option value="baguio">Baguio</option>
                                                <option value="palawan">Palawan</option>
                                                <option value="batangas">Batangas</option>
                                                <option value="laguna">Laguna</option>
                                                <option value="pampanga">Pampanga</option>
                                                <option value="tarlac">Tarlac</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="skillsInput" class="form-label">God-given Skills</label>
                                            <select class="form-control" name="skillsInput" data-choices
                                                data-choices-removeItem multiple data-choices-sorting-false
                                                id="skillsInput">
                                                <option value="">Select a Skill</option>
                                                <optgroup label="Spiritual and Pastoral Skills">
                                                    <option class="ml-2" value="Prayer Leading">Prayer Leading</option>
                                                    <option value="Bible Study Facilitation">Bible Study Facilitation
                                                    </option>
                                                    <option value="Spiritual Counseling">Spiritual Counseling</option>
                                                    <option value="Worship Leading">Worship Leading</option>
                                                    <option value="Catechism Teaching">Catechism Teaching</option>
                                                </optgroup>

                                                <optgroup label="Community and Social Skills">
                                                    <option value="Event Planning and Coordination">Event Planning and
                                                        Coordination</option>
                                                    <option value="Community Outreach">Community Outreach</option>
                                                    <option value="Fundraising and Development">Fundraising and Development
                                                    </option>
                                                    <option value="Volunteer Management">Volunteer Management</option>
                                                    <option value="Conflict Resolution">Conflict Resolution</option>
                                                </optgroup>

                                                <optgroup label="Administrative and Technical Skills">
                                                    <option value="Administration and Office Management">
                                                        Administration and
                                                        Office Management</option>
                                                    <option value="Financial Management and Accounting">
                                                        Financial
                                                        Management and Accounting</option>
                                                    <option value="IT Support and Systems Management">IT
                                                        Support and
                                                        Systems Management</option>
                                                    <option value="Website Development and Maintenance">
                                                        Website Development
                                                        and Maintenance</option>
                                                    <option value="Graphic Design">Graphic Design</option>
                                                    <option value="Content Creation and Management">
                                                        Content Creation and
                                                        Management</option>
                                                </optgroup>

                                                <optgroup label="Educational and Training Skills">
                                                    <option value="Teaching and Instruction">Teaching and Instruction
                                                    </option>
                                                    <option value="Workshop Facilitation">Workshop Facilitation</option>
                                                    <option value="Youth Mentorship and Leadership">Youth Mentorship and
                                                        Leadership</option>
                                                    <option value="Life Skills Coaching">Life Skills Coaching</option>
                                                </optgroup>

                                                <optgroup label="Creative and Artistic Skills">
                                                    <option value="Music and Instrument Playing">Music and Instrument
                                                        Playing</option>
                                                    <option value="Singing and Vocal Training">Singing and Vocal Training
                                                    </option>
                                                    <option value="Drama and Theatrical Arts">Drama and Theatrical Arts
                                                    </option>
                                                    <option value="Visual Arts and Crafts">Visual Arts and Crafts</option>
                                                    <option value="Writing and Editing">Writing and Editing</option>
                                                </optgroup>

                                                <optgroup label="Health and Wellness Skills">
                                                    <option value="Counseling and Mental Health Support">Counseling and
                                                        Mental Health Support</option>
                                                    <option value="Health and Fitness Training">Health and Fitness Training
                                                    </option>
                                                    <option value="First Aid and Medical Support">First Aid and Medical
                                                        Support</option>
                                                    <option value="Nutrition and Wellness Coaching">Nutrition and Wellness
                                                        Coaching</option>
                                                </optgroup>

                                                <optgroup label="Logistics and Support Skills">
                                                    <option value="Transportation Coordination">Transportation Coordination
                                                    </option>
                                                    <option value="Food Preparation and Catering">Food Preparation and
                                                        Catering</option>
                                                    <option value="Setup and Teardown (Event Logistics)">Setup and Teardown
                                                        (Event Logistics)</option>
                                                    <option value="Audio/Visual Equipment Management">Audio/Visual
                                                        Equipment Management</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12 mt-3">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-soft-success">Cancel</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->

                        <!--changePassword-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <form action="javascript:void(0);">
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Old
                                                Password*</label>
                                            <input type="password" class="form-control" id="oldpasswordInput"
                                                placeholder="Enter current password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New
                                                Password*</label>
                                            <input type="password" class="form-control" id="newpasswordInput"
                                                placeholder="Enter new password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm
                                                Password*</label>
                                            <input type="password" class="form-control" id="confirmpasswordInput"
                                                placeholder="Confirm password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <a href="javascript:void(0);"
                                                class="link-primary text-decoration-underline">Forgot
                                                Password ?</a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Change
                                                Password</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <!--service-->
                        <div class="tab-pane" id="service" role="tabpanel">
                            <form>
                                <div id="newlink">
                                    <div id="1" class="containerElement">
                                        <div class="row">
                                            <span class="menu-title mb-1">Service</span>
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="service_category" class="form-label">MFC/LCSC</label>
                                                    <select name="service_category" id="service_category1" data-choices
                                                        data-choices-search-false data-choices-sorting-false>
                                                        <option value="">Select one</option>
                                                        <option value="mfc">MFC</option>
                                                        <option value="lcsc">LCSC</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3" id="mfc_service_type_container1">
                                                <div class="mb-3">
                                                    <label for="mfc_service_type" class="form-label">Service</label>
                                                    <select class="d-none" name="mfc_service_type" id="mfc_service_type1"
                                                        data-choices data-choices-search-false data-choices-sorting-false>
                                                        <option value="">Select one</option>
                                                        <option value="1">Servant Council</option>
                                                        <option value="2">National Coordinator</option>
                                                        <option value="3">Section Coordinator</option>
                                                        <option value="4">Provincial Coordinator</option>
                                                        <option value="5">Area Servant</option>
                                                        <option value="6">Chapter Servant</option>
                                                        <option value="7">Unit Servant</option>
                                                        <option value="8">Household Servant</option>
                                                        <option value="9">Mission Volunteer</option>
                                                        <option value="10">Full Time</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3 d-none" id="lcsc_service_type_container1">
                                                <div class="mb-3">
                                                    <label for="lcsc_service_type" class="form-label">Service</label>
                                                    <select name="lcsc_service_type" id="lcsc_service_type1" data-choices
                                                        data-choices-search-false data-choices-sorting-false>
                                                        <option value="">Select one</option>
                                                        <option value="11">LCSC Coordinator</option>
                                                        <option value="12">Pillar Head</option>
                                                        <option value="13">Area Coordinator</option>
                                                        <option value="14">Provincial Coordinator</option>
                                                        <option value="15">Full Time</option>
                                                        <option value="16">Mission Volunteer</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-3" id="mfc_section_pillar_container1">
                                                <div class="mb-3">
                                                    <label for="mfc_section_pillar"
                                                        class="form-label">Section/Pillar</label>
                                                    <select name="mfc_section_pillar" id="mfc_section_pillar1"
                                                        data-choices data-choices-search-false data-choices-sorting-false>
                                                        <option value="">Select one</option>
                                                        <option value="1">Kids</option>
                                                        <option value="2">Youth</option>
                                                        <option value="3">Singles</option>
                                                        <option value="4">Handmaids</option>
                                                        <option value="5">Servants</option>
                                                        <option value="6">Couples</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3 d-none" id="lcsc_section_pillar_container1">
                                                <div class="mb-3">
                                                    <label for="lcsc_section_pillar"
                                                        class="form-label">Section/Pillar</label>
                                                    <select name="lcsc_section_pillar" id="lcsc_section_pillar1"
                                                        data-choices data-choices-search-false data-choices-sorting-false>
                                                        <option value="">Select one</option>
                                                        <option value="7">LCSC</option>
                                                        <option value="8">Live Pure</option>
                                                        <option value="9">Live Life</option>
                                                        <option value="10">Live The Word</option>
                                                        <option value="11">Live Full</option>
                                                        <option value="12">Live The Faith</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="service_area" class="form-label">Area</label>
                                                    <select name="service_area" id="service_area1" data-choices
                                                        data-choices-sorting-false>
                                                        <option value="">Select Area</option>
                                                        <option value="1">NCR</option>
                                                        <option value="2">NCR - North</option>
                                                        <option value="3">NCR - South</option>
                                                        <option value="4">NCR - East</option>
                                                        <option value="5">NCR - Central</option>
                                                        <option value="6">South Luzon</option>
                                                        <option value="7">North & Central Luzon</option>
                                                        <option value="8">Visayas</option>
                                                        <option value="9">Mindanao</option>
                                                        <option value="10">International</option>
                                                        <option value="11">Baguio</option>
                                                        <option value="12">Palawan</option>
                                                        <option value="13">Batangas</option>
                                                        <option value="14">Laguna</option>
                                                        <option value="15">Pampanga</option>
                                                        <option value="16">Tarlac</option>
                                                        <option value="17">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a class="btn btn-success" href="javascript:deleteEl(1)">Delete</a>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                                <div id="newForm" style="display: none;">

                                </div>
                                <div class="col-lg-12">
                                    <div class="hstack gap-2">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a href="javascript:new_link()" class="btn btn-primary">Add
                                            New</a>
                                    </div>
                                </div>
                                <!--end col-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/js/pages/profile-setting.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\GoDesQ3\Downloads\MFC_Portal_V2\resources\views/pages/profile/index.blade.php ENDPATH**/ ?>