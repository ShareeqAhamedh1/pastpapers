<div class="container card-body">
    <h4>Add Services</h4>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pName">Services Name</label>
            <input type="text" name="serviceName" id="serviceName" class="form-control" placeholder="Enter service name" required>
        </div>
        <div class="form-group">
            <label for="pName">Service Price Range</label>
            <input type="text" name="servicePrice" id="servicePrice" class="form-control" placeholder="Enter service price" required>
        </div>
        <button type="button" class="btn btn-primary" onClick="addService()">Add</button>
    </form>
</div>
