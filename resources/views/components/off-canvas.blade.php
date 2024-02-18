<div class="offcanvas offcanvas-end show" id="add-new-record" aria-modal="true" role="dialog">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body flex-grow-1">
    <form class="add-new-record pt-0 row g-3 fv-plugins-bootstrap5 fv-plugins-framework" id="form-add-new-record"
      onsubmit="return false" novalidate="novalidate">
      <div class="col-sm-12 fv-plugins-icon-container">
        <div class="input-group input-group-merge">
          <span id="basicFullname2" class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
          <div class="form-floating form-floating-outline">
            <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname"
              placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2">
            <label for="basicFullname">Full Name</label>
          </div>
        </div>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>
      <div class="col-sm-12 fv-plugins-icon-container">
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class="mdi mdi-briefcase-outline"></i></span>
          <div class="form-floating form-floating-outline">
            <input type="text" id="basicPost" name="basicPost" class="form-control dt-post"
              placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2">
            <label for="basicPost">Post</label>
          </div>
        </div>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>
      <div class="col-sm-12 fv-plugins-icon-container">
        <div class="input-group input-group-merge">
          <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
          <div class="form-floating form-floating-outline">
            <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email"
              placeholder="john.doe@example.com" aria-label="john.doe@example.com">
            <label for="basicEmail">Email</label>
          </div>
        </div>
        <div class="form-text">
          You can use letters, numbers &amp; periods
        </div>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>
      <div class="col-sm-12 fv-plugins-icon-container">
        <div class="input-group input-group-merge">
          <span id="basicDate2" class="input-group-text"><i class="mdi mdi-calendar-month-outline"></i></span>
          <div class="form-floating form-floating-outline">
            <input type="text" class="form-control dt-date flatpickr-input" id="basicDate" name="basicDate"
              aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" readonly="readonly">
            <label for="basicDate">Joining Date</label>
          </div>
        </div>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>
      <div class="col-sm-12 fv-plugins-icon-container">
        <div class="input-group input-group-merge">
          <span id="basicSalary2" class="input-group-text"><i class="mdi mdi-currency-usd"></i></span>
          <div class="form-floating form-floating-outline">
            <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary" placeholder="12000"
              aria-label="12000" aria-describedby="basicSalary2">
            <label for="basicSalary">Salary</label>
          </div>
        </div>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 waves-effect waves-light">Submit</button>
        <button type="reset" class="btn btn-outline-secondary waves-effect"
          data-bs-dismiss="offcanvas">Cancel</button>
      </div>
      <input type="hidden">
    </form>

  </div>
</div>
