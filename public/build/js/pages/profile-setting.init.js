/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Profile-setting init js
*/

// Profile Foreground Img
if (document.querySelector("#profile-foreground-img-file-input")) {
    document
        .querySelector("#profile-foreground-img-file-input")
        .addEventListener("change", function () {
            var preview = document.querySelector(".profile-wid-img");
            var file = document.querySelector(
                ".profile-foreground-img-file-input"
            ).files[0];
            var reader = new FileReader();
            reader.addEventListener(
                "load",
                function () {
                    preview.src = reader.result;
                },
                false
            );
            if (file) {
                reader.readAsDataURL(file);
            }
        });
}

// Profile Foreground Img
if (document.querySelector("#profile-img-file-input")) {
    document
        .querySelector("#profile-img-file-input")
        .addEventListener("change", function () {
            var preview = document.querySelector(".user-profile-image");
            var file = document.querySelector(".profile-img-file-input")
                .files[0];
            var reader = new FileReader();
            reader.addEventListener(
                "load",
                function () {
                    preview.src = reader.result;
                },
                false
            );
            if (file) {
                reader.readAsDataURL(file);
            }
        });
}

var count = 1;

// var genericExamples = document.querySelectorAll("[data-trigger]");
// for (i = 0; i < genericExamples.length; ++i) {
//     var element = genericExamples[i];
//     new Choices(element, {
//         placeholderValue: "This is a placeholder set in the config",
//         searchPlaceholderValue: "This is a search placeholder",
//         searchEnabled: false,
//     });
// }

function new_link() {
    count++;
    var div1 = document.createElement("div");
    div1.id = count;
    div1.classList.add("containerElement");

    var containerElement = document.querySelectorAll(".containerElement");

    var delLink =
        `
                    <div class="row">
                        <span class="menu-title mb-1">Service</span>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="service_category${count}" class="form-label">MFC/LCSC</label>
                                <select name="service_category${count}" id="service_category${count}" data-trigger
                                    data-choices-search-false data-choices-sorting-false>
                                    <option value="">Select one</option>
                                    <option value="mfc">MFC</option>
                                    <option value="lcsc">LCSC</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3" id="mfc_service_type_container${count}">
                            <div class="mb-3">
                                <label for="mfc_service_type" class="form-label">Service</label>
                                <select class="d-none" name="mfc_service_type" id="mfc_service_type${count}" data-trigger
                                    data-choices-search-false data-choices-sorting-false>
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
                        <div class="col-3 d-none" id="lcsc_service_type_container${count}">
                            <div class="mb-3">
                                <label for="lcsc_service_type" class="form-label">Service</label>
                                <select name="lcsc_service_type" id="lcsc_service_type${count}" data-trigger
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

                        <div class="col-3" id="mfc_section_pillar_container${count}">
                            <div class="mb-3">
                                <label for="mfc_section_pillar" class="form-label">Section/Pillar</label>
                                <select name="mfc_section_pillar" id="mfc_section_pillar${count}" data-trigger
                                    data-choices-search-false data-choices-sorting-false>
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
                        <div class="col-3 d-none" id="lcsc_section_pillar_container${count}">
                            <div class="mb-3">
                                <label for="lcsc_section_pillar" class="form-label">Section/Pillar</label>
                                <select name="lcsc_section_pillar" id="lcsc_section_pillar${count}" data-trigger
                                    data-choices-search-false data-choices-sorting-false>
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
                                <select name="service_area" id="service_area${count}" data-trigger
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
                            <a class="btn btn-success" href="javascript:deleteEl(${count})">Delete</a>
                        </div>
                    </div>`;
    // '</div></div><div class="hstack gap-2 justify-content-end"><a class="btn btn-success" href="javascript:deleteEl(' + count + ')">Delete</a></div></div>';

    div1.innerHTML = document.getElementById("newForm").innerHTML + delLink;

    document.getElementById("newlink").appendChild(div1);

    var genericExamples = document.querySelectorAll("[data-trigger]");

    chooseServiceCategory(count);
    choicesInit(count);
}

function choicesInit(count) {
    var service_category = document.getElementById("service_category" + count);
    var mfc_service_type = document.getElementById("mfc_service_type" + count);
    var lcsc_service_type = document.getElementById(
        "lcsc_service_type" + count
    );
    var mfc_section_pillar = document.getElementById(
        "mfc_section_pillar" + count
    );
    var lcsc_section_pillar = document.getElementById(
        "lcsc_section_pillar" + count
    );

    var service_area = document.getElementById("service_area" + count);

    var choicesSetup = {
        searchEnabled: false,
        shouldSort: false,
    };

    var service_areaSetup = {
        shouldSort: false,
    }

    new Choices(service_category, choicesSetup);
    new Choices(mfc_service_type, choicesSetup);
    new Choices(lcsc_service_type, choicesSetup);
    new Choices(mfc_section_pillar, choicesSetup);
    new Choices(lcsc_section_pillar, choicesSetup);
    new Choices(service_area, service_areaSetup);
}

function deleteEl(eleId) {
    d = document;
    var ele = d.getElementById(eleId);
    var parentEle = d.getElementById("newlink");
    parentEle.removeChild(ele);
}

function chooseServiceCategory(count) {
    const service_category = document.getElementById(
        "service_category" + count
    );
    const mfc_service_type = document.getElementById(
        "mfc_service_type_container" + count
    );
    const lcsc_service_type = document.getElementById(
        "lcsc_service_type_container" + count
    );
    const mfc_section_pillar = document.getElementById(
        "mfc_section_pillar_container" + count
    );
    const lcsc_section_pillar = document.getElementById(
        "lcsc_section_pillar_container" + count
    );

    service_category.addEventListener("change", function () {
        const value = service_category.value;

        if (value == "mfc") {
            mfc_service_type.classList.remove("d-none");
            mfc_section_pillar.classList.remove("d-none");

            lcsc_service_type.classList.add("d-none");
            lcsc_section_pillar.classList.add("d-none");
        } else {
            lcsc_service_type.classList.remove("d-none");
            lcsc_section_pillar.classList.remove("d-none");

            mfc_service_type.classList.add("d-none");
            mfc_section_pillar.classList.add("d-none");
        }
    });
}
