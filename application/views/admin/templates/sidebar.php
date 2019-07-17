<?php $userdata = $this->session->userdata(); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?= base_url('assets/images/users/'.$userdata['gambar']); ?>" class="img-circle" alt="<?= $userdata['gambar']; ?>">
    </div>
    <div class="pull-left info">
      <p><?= $userdata['nama']; ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- search form -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
      <a href="<?= base_url('admin'); ?>">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <li class="treeview">
      <a href="<?= base_url('admin/content'); ?>">
        <i class="fa fa-table"></i> <span>Content Management</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?= base_url('admin/add_content'); ?>"><i class="fa fa-circle-o"></i> Tambah Konten</a></li>
        <li><a href="<?= base_url(); ?>"><i class="fa fa-circle-o"></i> Content Preview</a></li>
      </ul>
    </li>
    <li>
      <a href="<?= base_url('menu/tbl_log_login'); ?>">
        <i class="fa fa-sort-amount-desc"></i> <span>Log Login</span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-edit"></i> <span>Berita</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?= base_url('berita/index'); ?>"><i class="fa fa-circle-o"></i> Tabel Berita</a></li>
        <li><a href="<?= base_url('berita/tambah'); ?>"><i class="fa fa-circle-o"></i> Tambah Berita</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i> <span>Users</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?= base_url('menu/tbl_users'); ?>"><i class="fa fa-circle-o"></i> User Admin</a></li>
        <li><a href="<?= base_url(''); ?>"><i class="fa fa-circle-o"></i> Donatur</a></li>
      </ul>
    </li>
    <li>
      <a href="<?= base_url('admin/calendar'); ?>">
        <i class="fa fa-calendar"></i> <span>Calendar</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-red">3</small>
          <small class="label pull-right bg-blue">17</small>
        </span>
      </a>
    </li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>