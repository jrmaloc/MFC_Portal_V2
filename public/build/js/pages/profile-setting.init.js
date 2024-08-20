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
        `<div class="row service-container">
            <span class="menu-title mb-1">Service</span>
            <div class="col-3">
                <div class="mb-3">
                    <label for="service_category${count}" class="form-label">MFC/LCSC</label>
                    <select name="service_category" id="service_category${count}" data-choices
                        data-choices-search-false data-choices-sorting-false
                        class="service-category-select">
                        <option value="">Select one</option>
                        <option value="mfc">MFC</option>
                        <option value="lcsc">LCSC</option>
                    </select>
                </div>
            </div>
            <div class="col-3" id="service_type_container">
                <div class="mb-3">
                    <label for="service_type${count}" class="form-label">Service Type</label>
                    <select name="service_type[]" id="service_type${count}"
                        class="service-type-select form-select">
                    </select>
                </div>
            </div>

            <div class="col-3" id="section_container">
                <div class="mb-3">
                    <label for="section${count}" class="form-label">Section/Pillar</label>
                    <select name="section[]" id="section${count}"
                        class="section-select form-select">
                    </select>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="service_area${count}" class="form-label">Area</label>
                    <select name="service_area[]" id="service_area${count}" data-choices
                        data-choices-sorting-false class="sercive-area-select"> 
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
        </div>`;
    // '</div></div><div class="hstack gap-2 justify-content-end"><a class="btn btn-success" href="javascript:deleteEl(' + count + ')">Delete</a></div></div>';

    div1.innerHTML = document.getElementById("newForm").innerHTML + delLink;

    document.getElementById("newlink").appendChild(div1);

    var genericExamples = document.querySelectorAll("[data-trigger]");

    chooseServiceCategory(count);
    choicesInit(count);
}

function choicesInit(count) {
    console.log(count);
    var service_category = document.getElementById("service_category" + count);
    var service_area = document.getElementById("service_area" + count);

    var choicesSetup = {
        searchEnabled: false,
        shouldSort: false,
    };

    var service_areaSetup = {
        shouldSort: false,
    }

    new Choices(service_category, choicesSetup);
    // new Choices(mfc_service_type, choicesSetup);
    // new Choices(mfc_section_pillar, choicesSetup);
    new Choices(service_area, service_areaSetup);
}

function deleteEl(eleId) {
    d = document;
    var ele = d.getElementById(eleId);
    var parentEle = d.getElementById("newlink");
    parentEle.removeChild(ele);
}

let mfcTypes = ["Servant Council", "National Coordinator", "Section Coordinator", "Provincial Coordinator",
    "Area Servant", "Chapter Servant", "Unit Servant", "Household Servant", "Mission Volunteer", "Full Time"
];
let mfcSections = ["Kids", "Youth", "Singles", "Handmaids", "Servants", "Couples"];

let lcscTypes = ["LCSC Coordinator", "Pillar Head", "Area Coordinator", "Provincial Coordinator", "Full Time",
    "Mission Volunteer"
];
let lcscSections = ["LCSC", "Live Pure", "Live Life", "Live the Word", "Live Full", "Live the Faith"];

function chooseServiceCategory(count) {
    const service_category = document.getElementById("service_category" + count);
    const serviceTypeSelect = document.getElementById("service_type" + count);
    const sectionSelect = document.getElementById("section" + count);

    let typeChoiceInstance = null;
    let sectionChoiceInstance = null;

    if (!typeChoiceInstance) {
        typeChoiceInstance = new Choices(serviceTypeSelect);
    }

    if (!sectionChoiceInstance) {
        sectionChoiceInstance = new Choices(sectionSelect);
    }

    service_category.addEventListener("change", function (e) {
        setChoicesForServices(typeChoiceInstance, sectionChoiceInstance, e.target.value);
    });
}

// Declare variables to hold the Choices instances (moved outside the function to persist them)
let typeChoiceInstance = null;
let sectionChoiceInstance = null;
$('.service-category-select').on("change", (e) => {
    let container = $(e.target).closest(".containerElement");
    let serviceTypeSelect = container.find(".service-type-select");
    let sectionSelect = container.find(".section-select");

        if (!typeChoiceInstance) {
            typeChoiceInstance = new Choices(serviceTypeSelect[0]);
        }

        if (!sectionChoiceInstance) {
            sectionChoiceInstance = new Choices(sectionSelect[0]);
        }

    setChoicesForServices(typeChoiceInstance, sectionChoiceInstance, e.target.value);
});

function setChoicesForServices(typeChoiceInstance, sectionChoiceInstance, value) {

    // Clear previous choices before setting new ones
    typeChoiceInstance.clearChoices();
    sectionChoiceInstance.clearChoices();

    // Update choices based on selected category
    if (value === "mfc") {
        // Add new options for MFC
        typeChoiceInstance.setChoices(
            mfcTypes.map((type, index) => ({ value: type, label: type, id: index + 1 })),
            'value', 'label', true
        );

        sectionChoiceInstance.setChoices(
            mfcSections.map((section, index) => ({ value: section, label: section, id: index + 1 })),
            'value', 'label', true
        );

    } else if (value === "lcsc") {
        // Add new options for LCSC
        typeChoiceInstance.setChoices(
            lcscTypes.map((type, index) => ({ value: type, label: type, id: index + 1 })),
            'value', 'label', true
        );

        sectionChoiceInstance.setChoices(
            lcscSections.map((section, index) => ({ value: section, label: section, id: index + 1 })),
            'value', 'label', true
        );

    } else {
        // Clear the choices if no valid category is selected
        typeChoiceInstance.clearChoices();
        sectionChoiceInstance.clearChoices();
    }
}