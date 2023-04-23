<style>
  .boxicon {
    display: flex;
    align-items: center;
    flex-direction: row;
  }

  .boxicon i {
    font-size: 2rem;
    padding-left: 2.5rem;
  }
</style>

<div class="content">
  <nav class="sidebar">
    <ul class="side-nav">
      <li class="side-nav_item">
        <div class="boxicon">
          <i class='bx bxs-report'></i>
          <a href="OrderHistory" class="link">View orders</a>
        </div>
      </li>
      <li class="side-nav_item">
        <div class="boxicon">
          <i class='bx bxs-user-detail'></i>
          <a href="UserManage" class="link">Personal details</a>
        </div>
      </li>
      <li class="side-nav_item">
        <div class="boxicon">
          <i class='bx bx-log-out'></i>
          <a href="logout.php" class="link">Log out</a>
        </div>
      </li>
    </ul>
  </nav>