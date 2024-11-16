<?php
include "../backend/conn.php";
$sc_id=$_REQUEST['sc_id'];
?>


    <form id="daysForm" class="form">
        <h5 class="mb-4">Select Days and Operating Times</h5>

        <!-- Select All Checkbox -->
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="selectAll" onclick="toggleAllDays(this)">
            <label class="form-check-label" for="selectAll">Select All</label>
        </div>

        <!-- Individual Days Checkboxes with Opening and Closing Time Inputs -->
        <div class="form-group mb-3">
            <label class="form-check-label">Monday</label>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="form-check-input me-2" name="days" value="Monday" onclick="toggleTimeInputs(this)">
                <input type="time" class="form-control time-input me-2" placeholder="Open Time" disabled>
                <input type="time" class="form-control time-input" placeholder="Close Time" disabled>
            </div>
        </div>
        <div class="form-group mb-3">
            <label class="form-check-label">Tuesday</label>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="form-check-input me-2" name="days" value="Tuesday" onclick="toggleTimeInputs(this)">
                <input type="time" class="form-control time-input me-2" placeholder="Open Time" disabled>
                <input type="time" class="form-control time-input" placeholder="Close Time" disabled>
            </div>
        </div>
        <!-- Repeat for the other days of the week -->
        <div class="form-group mb-3">
            <label class="form-check-label">Wednesday</label>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="form-check-input me-2" name="days" value="Wednesday" onclick="toggleTimeInputs(this)">
                <input type="time" class="form-control time-input me-2" placeholder="Open Time" disabled>
                <input type="time" class="form-control time-input" placeholder="Close Time" disabled>
            </div>
        </div>

        <div class="form-group mb-3">
            <label class="form-check-label">Thursday</label>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="form-check-input me-2" name="days" value="Thursday" onclick="toggleTimeInputs(this)">
                <input type="time" class="form-control time-input me-2" placeholder="Open Time" disabled>
                <input type="time" class="form-control time-input" placeholder="Close Time" disabled>
            </div>
        </div>

        <div class="form-group mb-3">
            <label class="form-check-label">Friday</label>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="form-check-input me-2" name="days" value="Friday" onclick="toggleTimeInputs(this)">
                <input type="time" class="form-control time-input me-2" placeholder="Open Time" disabled>
                <input type="time" class="form-control time-input" placeholder="Close Time" disabled>
            </div>
        </div>

        <div class="form-group mb-3">
            <label class="form-check-label">Saturday</label>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="form-check-input me-2" name="days" value="Saturday" onclick="toggleTimeInputs(this)">
                <input type="time" class="form-control time-input me-2" placeholder="Open Time" disabled>
                <input type="time" class="form-control time-input" placeholder="Close Time" disabled>
            </div>
        </div>

        <div class="form-group mb-3">
            <label class="form-check-label">Sunday</label>
            <div class="d-flex align-items-center">
                <input type="checkbox" class="form-check-input me-2" name="days" value="Sunday" onclick="toggleTimeInputs(this)">
                <input type="time" class="form-control time-input me-2" placeholder="Open Time" disabled>
                <input type="time" class="form-control time-input" placeholder="Close Time" disabled>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="button" class="btn btn-primary mt-4" onclick="submitForm(<?= $sc_id ?>)">Add</button>
    </form>
