/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// DataTables
$(document).ready(function () {
    $("#myTable").DataTable();
});

// Memilih jenis kegiatan berdasarkan koor lab yang dipilih
document
    .getElementById("coordinators_id")
    .addEventListener("change", function () {
        var coordinatorId = this.value;
        var activitiesSelect = document.getElementById("activities_id");
        activitiesSelect.innerHTML = '<option value="">Loading...</option>';

        if (coordinatorId) {
            fetch(
                `/get-activities-by-coordinator?coordinator_id=${coordinatorId}`
            )
                .then((response) => response.json())
                .then((data) => {
                    activitiesSelect.innerHTML =
                        '<option value="">Pilih Satu</option>';
                    data.forEach((activity) => {
                        activitiesSelect.innerHTML += `<option value="${activity.id}">${activity.activity_type}</option>`;
                    });
                });
        } else {
            activitiesSelect.innerHTML = '<option value="">Pilih Satu</option>';
        }
    });
