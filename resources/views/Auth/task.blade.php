@extends('navbar')


        <div class="task">
          <h2>New Job</h2>

        <form method="post" action="/api/task" class="task-form">
          {{ csrf_field() }}
            <div class="form-group">
              <label>Customer Name</label>
              <input type="text" class="form-control" id="customer" name="customer_name"></input>
            </div>

            <div class="form-group">
              <label>Contact Number</label>
              <input type="text" class="form-control" id="number" name="number"></input>
            </div>

            <div class="form-group">
              <label>Status</label>
              <button class="dropbtn">Choose From
              </button>
              <div class="dropdown-content" id="status">
                <a>Open</a>
                <a>Processing</a>
                <a>Closed</a>
              </div>
            </div>

            <div class="form-group">
              <label>Category</label>
              <input type="text" class="form-control" id="category" name="category"></input>
            </div>

            <div class="form-group">
              <label>Description</label>
              <input type="text" class="form-control" id="description" name="description"></input>
            </div>

            <button type="submit" class="btn btn-primary" id="registerSubmit">Submit</button>
      </form>
   </div>
