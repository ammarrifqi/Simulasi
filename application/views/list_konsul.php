<!DOCTYPE html>
<div class="content-wrapper">
<section class="content">
    <div class="row">
        <legend>Daftar Konsultasi</legend>
        <div class="col-md-8">
            <form action="<?php echo base_url('admin/searchuser')?>" method="post">
              <div class="input-group col-md-3 col-sm-3 col-xs-12">
                <input type="text" name="find" class="form-control" placeholder="Search..."   style="auto;">
                <span class="input-group-btn ">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </form>
        </div>
        <br><br><br>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body ">
                  <ul class="products-list product-list-in-box">
                  <?php foreach ($member as $m) :?>
                      
                    <li class="item">
                      <div class="product-img">
                        <img src="<?php echo base_url($m->getImg())?>" class="img-circle"/>
                      </div>
                      <div class="member-info">
                        <a href="<?php echo base_url('C_konsultasi/halamanKonsul/'.$m->getId())?>" class="product-title">
                            <font size="3"><?php echo $m->getNama()?></font>
                            <button type="submit" class="btn btn-primary pull-right" id="konsul-member">
                                <i class="fa fa-comments">&nbsp;&nbsp;Balas Konsul</i>
                            </button>
                            <span class="product-description">
                              Waktu: <?php echo $m->getTime()?>
                            </span>
                        </a>
                      </div>
                    </li>
                <?php endforeach;?>
                    
                  </ul>
                </div>
            </div>
        </div>
    
    </div>
</section>
</div>