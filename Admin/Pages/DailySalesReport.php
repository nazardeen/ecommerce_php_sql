<?php include '../Includes/header.php' ?>

<div class='section-1'>
  <style>
    .cardbox .card01 {
      position: relative;
      background: #00FF00;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      cursor: pointer;
      border-radius: 15px;
    }

    .cardbox .card02 {
      position: relative;
      background: #ADD8E6;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      cursor: pointer;
      border-radius: 15px;
    }

    .cardbox.card02.cardName {
      color: #FFFFFF;
    }
  </style>
  <div class="col-md-12">

    <h2> Daily Sales Reports </h2>
    <div class="row">
      <div class="col-md-6 mb-3">
        <!-- input group class start -->
        <div class="input-group">
          <span class="input-group-text">Select Date</span>
          <input type="date" aria-label="First name" placeholder="Date" class="form-control">
          <button type="button" id="Search" name="Search" class="btn btn-primary ml-3">Search</button>
        </div>
        <!-- input group class ENd -->
      </div>
      <div class="cardbox">
        <div class="card01">
          <div>
            <div class="cardName">DAILY TOTAL</div>
            <div class="numbers">Rs.50000</div>
          </div>
          <div class="iconBox">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          </div>
        </div>
        <div class="card02">
          <div>
            <div class="cardName">DAILY PROFIT</div>
            <div class="numbers">Rs.5000</div>
          </div>
          <div class="iconBox">
            <i class="fa fa-signal" aria-hidden="true"></i>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <table class="table table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Purchase ID</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Item Code</th>
              <th scope="col">Item Name</th>
              <th scope="col">Description</th>
              <th scope="col">Qty</th>
              <th scope="col">Discount</th>
              <th scope="col">Total</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <th scope="row">4821</th>
              <th scope="row">2021/08/07</th>
              <th scope="row">11.35AM</th>
              <th scope="row">P02</th>
              <th scope="row">Iphone 7 </th>
              <th scope="row">Iphone 7 Mobile Phone</th>
              <th scope="row">2</th>
              <th scope="row">0</th>
              <th scope="row">50,500</th>



            </tr>
            <tr>
              <th scope="row">2</th>

            </tr>
            <tr>
              <th scope="row">3</th>
            </tr>
            <tr>
              <th scope="row">4</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php include '../Includes/footer.php' ?>